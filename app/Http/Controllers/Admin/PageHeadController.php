<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageHead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class PageHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = PageHead::select('id','title','url_key')->paginate(20);
        $columns = [
            ['label' => 'ID', 'field' => 'id', 'align' => 'left', 'sortable' => true],
            ['label' => 'Page Title', 'field' => 'title', 'align' => 'left', 'sortable' => true],
            ['label' => 'Path', 'field' => 'url_key', 'align' => 'left', 'sortable' => true],
        ];
        return view('admin.pageheads.index',[
            'title' => 'Pageheads',
            'breadcrumbs' => [
                ['label' => 'Pageheads', 'route_name' => 'admin.pageheads.index']
            ],
            'data' => $data,
            'columns' => $columns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.pageheads.create',[
            'title' => 'Create Pagehead',
            'breadcrumbs' => [
                ['label' => 'Pageheads', 'route_name' => 'admin.pageheads.index'],
                ['label' => 'Create', 'route_name' => 'admin.pageheads.create']
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:pageheads',
            'url_key' => 'nullable|unique:pageheads'
        ]);
        $page = new PageHead();
        $page->title = $request->input('title');
        $page->url_key = $request->input('url_key') ?? Str::slug($request->input('title'));
        $page->content = $request->input('content');
        $page->active = $request->has('active');
        $page->show_in_main_menu = $request->has('show_in_main_menu');
        $page->meta_title = $request->input('meta_title',$request->input('title'));
        $page->fill($request->only(['meta_keywords','meta_description']));
        $page->save();

        return Response::redirectToRoute('admin.pageheads.index')->with('success','Page Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     */
    public function show(PageHead $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PageHead $page
     */
    public function edit(PageHead $page)
    {
        return view('admin.pageheads.edit',[
            'title' => 'Edit Page: '.$page->title,
            'breadcrumbs' => [
                ['label' => 'Pageheads', 'route_name' => 'admin.pageheads.index'],
                ['label' => 'Edit', 'route_name' => 'admin.pageheads.index']
            ],
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(Request $request, PageHead $page): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:pageheads,title,'.$page->id,
            'url_key' => 'nullable|unique:pageheads,url_key,'.$page->id
        ]);
        $page->title = $request->input('title');
        $page->url_key = $request->input('url_key') ?? Str::slug($request->input('title'));
        $page->content = $request->input('content');
        $page->active = $request->has('active');
        $page->show_in_main_menu = $request->has('show_in_main_menu');
        $page->meta_title = $request->input('meta_title',$request->input('title'));
        $page->fill($request->only(['meta_keywords','meta_description']));
        $page->save();

        return Response::redirectToRoute('admin.pageheads.index')->with('success','Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(PageHead $page): RedirectResponse
    {
        $page->delete();
        return Response::redirectToRoute('admin.pageheads.index')->with('info','Page Deleted Successfully');
    }
}
