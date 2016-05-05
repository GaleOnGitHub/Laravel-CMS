<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::all();
        return view('admin.articles.index')->with('articles',$articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $sections = Section::lists('name','id');
		return view('admin.articles.create', compact('pages','sections'));
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
        return redirect('admin/articles');
	}

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
	public function show(Article $article)
	{
		return view('admin.articles.show')->with('article',$article);
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
        return view('admin.articles.edit', compact('pages','sections','article'));
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
        return redirect('admin/articles');
	}
}
