<?php

namespace App\Http\Controllers;

use App\Models\FormRemark;
use App\Models\FormSubmission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class FormRemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'remark' => 'required',
            'file_1' => 'nullable|file|max:5000',
            'file_2' => 'nullable|file|max:5000',
            'file_3' => 'nullable|file|max:5000',
            'file_4' => 'nullable|file|max:5000',
            'link_1' => 'nullable|max:2048|url',
            'link_2' => 'nullable|url|max:2048',
            'link_3' => 'nullable|url|max:2048',
            'link_4' => 'nullable|url|max:2048',
        ]);
        $model = FormRemark::create($request->only([
            'remark',
            'next_follow',
            'quoted_fee',
            'form_submission_id',
            'link_1','link_2','link_3','link_4',
            'total_fee',
            'services',
            'first_installment',
            'first_payable_on',
            'second_installment',
            'second_payable_on',
            'third_installment',
            'third_payable_on'
        ]));
        // dd($request->toArray());
        if($request->file('file_1')) {
            $path = $request->file('file_1')->store('files','public');
            $model->file_1 = $path;
        }
        if($request->file('file_2')) {
            $path = $request->file('file_2')->store('files','public');
            $model->file_2 = $path;
        }
        if($request->file('file_3')) {
            $path = $request->file('file_3')->store('files','public');
            $model->file_3 = $path;
        }
        if($request->file('file_4')) {
            $path = $request->file('file_4')->store('files','public');
            $model->file_4 = $path;
        }
        $model->save();
        return redirect(route('admin.business-applications.show',$request->input('form_submission_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param FormRemark $formRemark
     * @return \Illuminate\Http\Response
     */
    public function show(FormRemark $formRemark)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FormRemark $formRemark
     * @return Application|Factory|View
     */
    public function edit(FormRemark $formRemark)
    {
        $form = FormSubmission::find($formRemark->form_submission_id);
        return view('admin.form_remarks.edit',[
            'data' => $formRemark,
            'title' => 'Edit Remark',
            'breadcrumbs' => [
                [
                    'label' => 'Business Applications',
                    'route_name' => 'admin.business-applications.index'
                ],
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FormRemark $formRemark
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, FormRemark $formRemark)
    {
        $request->validate([
            'remark' => 'required',
            'file_1' => 'nullable|file|max:5000',
            'file_2' => 'nullable|file|max:5000',
            'file_3' => 'nullable|file|max:5000',
            'file_4' => 'nullable|file|max:5000',
            'link_1' => 'nullable|max:2048|url',
            'link_2' => 'nullable|url|max:2048',
            'link_3' => 'nullable|url|max:2048',
            'link_4' => 'nullable|url|max:2048',
        ]);
        $formRemark->fill($request->only([
            'remark',
            'next_follow',
            'quoted_fee',
            'form_submission_id',
            'link_1','link_2','link_3','link_4',
            'total_fee',
            'services',
            'first_installment',
            'first_payable_on',
            'second_installment',
            'second_payable_on',
            'third_installment',
            'third_payable_on'
        ]));
        // dd($request->toArray());
        if($request->file('file_1')) {
            $path = $request->file('file_1')->store('files','public');
            $formRemark->file_1 = $path;
        }
        if($request->file('file_2')) {
            $path = $request->file('file_2')->store('files','public');
            $formRemark->file_2 = $path;
        }
        if($request->file('file_3')) {
            $path = $request->file('file_3')->store('files','public');
            $formRemark->file_3 = $path;
        }
        if($request->file('file_4')) {
            $path = $request->file('file_4')->store('files','public');
            $formRemark->file_4 = $path;
        }
        $formRemark->save();
        return redirect(route('admin.business-applications.show',$formRemark->form_submission_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FormRemark $formRemark
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormRemark $formRemark)
    {
        //
    }
}
