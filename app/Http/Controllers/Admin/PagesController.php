<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

/**
 * Class PagesController
 * @package App\Http\Controllers\Admin
 */
class PagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $request['created_by'] = Auth::id();
        $request['updated_by'] = Auth::id();
        Page::create($request->all());

        session()->flash('flash_message','Your page has been created');
        return redirect('admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     * @return Response
     */
    public function show(Page $page)
    {
        return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page $page
     * @return Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Page $page
     * @param  PageRequest $request
     * @return Response
     */
    public function update(Page $page, PageRequest $request)
    {
        $request['updated_by'] = Auth::id();
        $page->update($request->all());
        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page $page
     * @return Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect('admin/pages');
    }

}

