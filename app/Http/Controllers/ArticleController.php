<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
	protected $articles;
    public function __construct(ArticleRepository $articles)
    {
        $this->middleware('auth');

        $this->articles = $articles;
    }

    public function index(Request $request)
    {
    	$articles = $request->user()->articles()->get();

    	return view('articles.index', [
    		'articles' => $articles,
    	]);
    }

    public function destroy(Request $request, Article $article)
	{
	    $this->authorize('destroy', $article);
	    $article->delete();

	    return redirect('/articles');
	}

    public function store(Request $request)
	{
	    $this->validate($request, [
	        'title' => 'required|max:300',
	    ]);

	    $request->user()->articles()->create([
	        'title' => $request->title,
	    ]);

	    return redirect('/articles');
	}
}
