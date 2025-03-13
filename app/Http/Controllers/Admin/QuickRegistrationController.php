<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use App\Models\QuickRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class QuickRegistrationController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $model = QuickRegistration::orderBy('id','DESC');
        if($search) {
            $model->where('name','like','%'.$search.'%')
                ->orWhere('tel','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('country','like','%'.$search.'%');
        }
        $data = $model->paginate('30');

        $columns = [
            ['label' => 'ID', 'field' => 'id', 'align' => 'left', 'sortable' => true],
            ['label' => 'Name', 'field' => 'name', 'align' => 'left', 'sortable' => true],
            ['label' => 'Email', 'field' => 'email', 'align' => 'left', 'sortable' => true],
            ['label' => 'Tel', 'field' => 'tel', 'align' => 'left', 'sortable' => true],
            ['label' => 'Country', 'field' => 'country', 'align' => 'left', 'sortable' => true],
        ];
        return view('admin.quick-registrations.index',[
            'title' => 'Quick Registrations',
            'breadcrumbs' => [
                ['label' => 'Quick Registrations', 'route_name' => 'admin.quick-registrations.index']
            ],
            'data' => $data,
            'columns' => $columns,
            'search' => $search,
        ]);
    }
    public function destroy($id): RedirectResponse
    {
        $model = QuickRegistration::find($id);
        if($model) {
            $model->delete();
        }
        return Response::redirectToRoute('admin.quick-registrations.index')->with('info','Data Deleted Successfully');
    }
}
