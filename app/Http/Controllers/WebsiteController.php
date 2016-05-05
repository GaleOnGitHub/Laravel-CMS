<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Page;
use App\Models\Section;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller {

	public function show($slug='home'){
        $page = Page::where('slug', $slug)->firstOrFail();
        $pages = Page::all();
        $style = Style::where('active',true)->firstOrFail();
        $sections = Section::all()->sortBy('order');
//        dd('test');
        return view('website.index', compact('page','pages','style','sections'));
    }

    public function create()
    {
        $sections = Section::lists('name','id');
        return view('website.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $request['created_by'] = Auth::id();
        $request['updated_by'] = Auth::id();
        $article = Article::create($request->all());

        $sectionList = $request->input('section_list',[]);
        $article->sections()->sync($sectionList);
        return redirect('/');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $sections = Section::lists('name','id');
        return view('website.edit', compact('sections','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $request['updated_by'] = Auth::id();
        $article->update($request->all());

        $sectionList = $request->input('section_list',[]);
        $article->sections()->sync($sectionList);
        return redirect('/');
    }

}
