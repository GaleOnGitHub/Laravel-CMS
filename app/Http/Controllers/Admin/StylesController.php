<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StyleRequest;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StylesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $styles = Style::all();
        return view('admin.styles.index')->with('styles',$styles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.styles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StyleRequest $request)
    {
        $request['created_by'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->id;
        Style::create($request->all());

        return redirect('admin/styles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Style $style)
    {
        return view('admin.styles.show')->with('style',$style);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Style $style)
    {
        return view('admin.styles.edit')->with('style',$style);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Style $style, StyleRequest $request)
    {


        $request['updated_by'] = Auth::user()->id;
        $style->update($request->all());
        return redirect('admin/styles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Style $style)
    {
        $style->delete();
        return redirect('admin/styles');
    }

}
