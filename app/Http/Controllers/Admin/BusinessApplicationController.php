<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BussinessApplication;
use App\Models\Country;
use App\Models\FormSubmission;
use App\Models\Setting;
use App\Models\SignedContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class BusinessApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $data = FormSubmission::select('id','client_id','form_data->name as name','form_data->email as email','form_data->country as country','assessed_as')
            ->where('form_type_id',2)->orderBy('created_at','DESC');
        $search = $request->input('search');
        if($search)
        {
            $data->whereRaw("LOWER(JSON_EXTRACT(form_data, '$.name')) LIKE '%".strtolower($search)."%'")
                ->orWhereRaw("LOWER(JSON_EXTRACT(form_data, '$.email')) LIKE '%".strtolower($search)."%'")
                ->orWhereRaw("LOWER(JSON_EXTRACT(form_data, '$.country')) LIKE '%".strtolower($search)."%'")
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
            ['label' => 'Country', 'field' => 'country', 'align' => 'left', 'sortable' => true],
            ['label' => 'Assessed As', 'field' => 'assessed_as', 'align' => 'left', 'sortable' => false],
        ];
        return view('admin.business-applications.index',[
            'title' => 'Business Applications',
            'breadcrumbs' => [
                ['label' => 'Business Applications', 'route_name' => 'admin.business-applications.index']
            ],
            'data' => $data,
            'columns' => $columns,
            'search' => $search,
            'assessed_as' => $assessed_as,
            'assessment_options' => FormSubmission::select('assessed_as')
                ->where('form_type_id',2)
                ->distinct()->get()->pluck('assessed_as')
        ]);
    }

    public function show($id) {
        /**
         * @var $model FormSubmission
         */
        $model = FormSubmission::with(['remarks','signedContracts'])->find($id);
        $optionsModel = Setting::where('key','assessment_options')->first();
        $options = [];
        if($optionsModel) {
            $options = $optionsModel->value;
        }
        $formData = $model->form_data;
        $formData['experience'] = isset($formData['experience']) ? (!is_array($formData['experience']) ? [$formData['experience']] :$formData['experience']):[];
        $model->form_data = $formData;
        $model->save();
        return view('admin.business-applications.view',[
            'data' => $model,
            'title' => 'Business Application: '.$model->client_id,
            'breadcrumbs' => [
                ['label' => 'Business Applications', 'route_name' => 'admin.business-applications.index'],
                ['label' => $model->client_id, 'route_name' => 'admin.business-applications.index']
            ],
            'assessment_options' => $options,
        ]);
    }

    public function edit($id)
    {
        $model = FormSubmission::find($id);
        $formData = $model->form_data;
        $formData['experience'] = isset($formData['experience']) ? (!is_array($formData['experience']) ? [$formData['experience']] :$formData['experience']):[];
        $model->form_data = $formData;
        $model->save();
        return view('admin.business-applications.edit',[
            'data' => $model,
            'title' => 'Business Application: '.$model->client_id,
            'breadcrumbs' => [
                ['label' => 'Business Applications', 'route_name' => 'admin.business-applications.index'],
                ['label' => $model->client_id, 'route_name' => 'admin.business-applications.index']
            ],
            'countries' => Country::select('name')->get()
        ]);
    }

    public function update(Request $request,$id)
    {
        $formSubmission = FormSubmission::find($id);
        if($request->input('assessed_as')){
            $formSubmission->assessed_as = $request->input('assessed_as');
            $formSubmission->save();
            return Response::redirectToRoute('admin.business-applications.index')->with('success','Form Updated Successfully');
        }
        $oldData = $formSubmission->form_data;
        $newData = $request->except(['_method','_token']);
        $newData['interests'] = $oldData['interests'] ?? [];
        $newData['agree'] = $oldData['agree'] ?? '';
        $formSubmission->form_data = $newData;
        $formSubmission->save();
        return Response::redirectToRoute('admin.business-applications.show',$id)->with('success','Form Updated Successfully');
    }


    public function destroy($id)
    {
        $formSubmission = FormSubmission::find($id);
        $formSubmission->delete();
        return Response::redirectToRoute('admin.business-applications.index')->with('info','Form Deleted Successfully');
    }

    public function agreementDownload(Request $request, $id)
    {
        $form = FormSubmission::find($id);
        if($request->input('agreement') != '0') {
            $pdf = Pdf::loadView('pdfs.'.strtolower($request->input('agreement')).'-agreement',['data' => $form]);
            return $pdf->download($form->client_id . '-'.strtolower($request->input('agreement')).'-agreement.pdf');
        }
        return redirect()->back()->with('danger','Please specify agreement type');
    }

    public function uploadSignedContract(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $form = FormSubmission::find($id);
        $request->validate([
            'category' => 'required',
            'contract_file' => 'required'
        ]);

        $path = $request->file('contract_file')->store('signed_contracts','public');

        $model = new SignedContract([
            'path' => $path,
            'category' => $request->input('category')
        ]);

        $model->formSubmission()->associate($form);
        $model->save();

        return Response::redirectToRoute('admin.business-applications.show',$id);
    }
}
