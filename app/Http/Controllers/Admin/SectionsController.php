<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;
use App\Http\Requests\SectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index')->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pages = Page::lists('name', 'id');
        return view('admin.sections.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SectionRequest $request
     * @return Response
     */
    public function store(SectionRequest $request)
    {
        $request['created_by'] = Auth::id();
        $request['updated_by'] = Auth::id();
        $section = Section::create($request->all());

        $pageList = $request->input('page_list',[]);
        $section->pages()->sync($pageList);
        return redirect('admin/sections');
    }

    /**
     * Display the specified resource.
     *
     * @param Section $section
     * @return Response
     */
    public function show(Section $section)
    {
        return view('admin.sections.show')->with('section', $section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Section $section
     * @return Response
     */
    public function edit(Section $section)
    {
        $pages = Page::lists('name', 'id');
        return view('admin.sections.edit', compact('section', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Section $section
     * @param SectionRequest $request
     * @return Response
     */
    public function update(Section $section, SectionRequest $request)
    {
        $request['updated_by'] = Auth::id();
        $section->update($request->all());

        $pageList = $request->input('page_list',[]);
        $section->pages()->sync($pageList);
        return redirect('admin/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Section $section
     * @return Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect('admin/sections');
    }

}
