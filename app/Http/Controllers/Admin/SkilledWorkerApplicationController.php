<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillerWorkerApplication;
use Illuminate\Http\Request;

class SkilledWorkerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.skilled-worker-applications.index',[
            'title' => 'Skilled Worker Applications',
            'breadcrumbs' => [
                ['label' => 'Skilled Worker Applications', 'route_name' => 'admin.skilled-worker-applications.index']
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skilled-worker-applications.create',[
            'title' => 'Create Skilled Worker Application',
            'breadcrumbs' => [
                ['label' => 'Skilled Worker Applications', 'route_name' => 'admin.skilled-worker-applications.index'],
                ['label' => 'Create', 'route_name' => 'admin.skilled-worker-applications.create']
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkillerWorkerApplication  $skillerWorkerApplication
     * @return \Illuminate\Http\Response
     */
    public function show(SkillerWorkerApplication $skillerWorkerApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkillerWorkerApplication  $skillerWorkerApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillerWorkerApplication $skillerWorkerApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkillerWorkerApplication  $skillerWorkerApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillerWorkerApplication $skillerWorkerApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkillerWorkerApplication  $skillerWorkerApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillerWorkerApplication $skillerWorkerApplication)
    {
        //
    }
}
