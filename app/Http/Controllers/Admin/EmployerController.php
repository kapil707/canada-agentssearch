<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\FormSubmission;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EmployerController extends Controller
{
    public function index(Request $request): View
    {
        $data = FormSubmission::select('id','client_id','form_data->name as name','form_data->email as email','assessed_as')
            ->where('form_type_id',4)->orderBy('created_at','DESC');
        $search = $request->input('search');
        if($search)
        {
            $data->whereRaw("LOWER(JSON_EXTRACT(form_data, '$.name')) LIKE '%".strtolower($search)."%'")
                ->orWhereRaw("LOWER(JSON_EXTRACT(form_data, '$.email')) LIKE '%".strtolower($search)."%'")
                ->orWhere('client_id','like','%'.$search.'%');
        }
        $assessed_as = $request->input('assessed_as','clear');
        if($assessed_as != 'clear') {
            $data->where('assessed_as',$assessed_as);
        }
        $data = $data->paginate(30);
        $columns = [
            ['label' => 'ID', 'field' => 'id', 'align' => 'left', 'sortable' => true],
            ['label' => 'Client ID', 'field' => 'client_id', 'align' => 'left', 'sortable' => true,'link' => true],
            ['label' => 'Name', 'field' => 'name', 'align' => 'left', 'sortable' => true],
            ['label' => 'Email', 'field' => 'email', 'align' => 'left', 'sortable' => true],
            ['label' => 'Assessed As', 'field' => 'assessed_as', 'align' => 'left', 'sortable' => false],
        ];
        return view('admin.employers.index',[
            'title' => 'Employer Document Information',
            'breadcrumbs' => [
                ['label' => 'Employer Document Information', 'route_name' => 'admin.employers.index']
            ],
            'data' => $data,
            'columns' => $columns,
            'search' => $search,
            'assessed_as' => $assessed_as,
            'assessment_options' => FormSubmission::select('assessed_as')
                ->where('form_type_id',4)
                ->distinct()->get()->pluck('assessed_as')
        ]);
    }

    public function show($id) {
        $model = FormSubmission::with('remarks')->find($id);
        $optionsModel = Setting::where('key','assessment_options')->first();
        $options = [];
        if($optionsModel) {
            $options = $optionsModel->value;
        }
        return view('admin.employers.view',[
            'data' => $model,
            'title' => 'Employer Document Information: '.$model->client_id,
            'breadcrumbs' => [
                ['label' => 'Employer Document Information', 'route_name' => 'admin.employers.index'],
                ['label' => $model->client_id, 'route_name' => 'admin.employers.index']
            ],
            'assessment_options' => $options
        ]);
    }

    public function update(Request $request,$id)
    {
        $formSubmission = FormSubmission::find($id);
        if($request->input('assessed_as')){
            $formSubmission->assessed_as = $request->input('assessed_as');
            $formSubmission->save();
        }
        return Response::redirectToRoute('admin.employers.index')->with('success','Form Updated Successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $model = FormSubmission::find($id);
        $employer = Employer::where('form_submission_id',$id)->first();
        if($employer) {
            $employer->form_submission_id = NULL;
            $employer->save();
        }
        $model->delete();
        return Response::redirectToRoute('admin.employers.index')->with('info','Form Deleted Successfully');
    }
}
