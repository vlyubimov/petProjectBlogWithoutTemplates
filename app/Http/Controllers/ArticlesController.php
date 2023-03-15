<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles/all_articles')->with('articles', $articles);
    }


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:2000'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);
            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext.'_'.time().'.'.$ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        } else
            $image_name = 'noImg.png';

        $article = new Article();
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->save();
        return redirect('/')->with('success', 'Статья долблена');
    }


    public function show($id)
    {
        $article = Article::find($id);

        $comments = Comment::where('article_id', $id)->get();
        if (isset($comments)){
            $data = ['article' => $article, 'comments' => $comments];
        } else {
            $data = ['article' => $article];
        }

        return view('articles.show')->with('data', $data);



    }


    public function edit($id)
    {
        $article = Article::find($id);
        if(auth()->user()->id != $article->user_id)
            return redirect('/');
        return view('articles.edit')->with('article', $article);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:2000'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);
            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext.'_'.time().'.'.$ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        } else
            $image_name = 'noImg.jfif';

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');

        if($request->hasFile('main_image')){
            if($article->image != 'noImg.jfif')
                Storage::delete('public/img/articles/'.$article->image);
            $article->image = $image_name;
        }

        $article->save();
        return redirect('/')->with('success', 'Статья была обновлена');
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        if(auth()->user()->id != $article->user_id)
            return redirect('/');
        if($article->image != 'noImg.jfif')
            Storage::delete('public/img/articles/'.$article->image);
        $article->delete();
        return redirect('/')->with('error', 'Статья была Удалена');
    }
}
