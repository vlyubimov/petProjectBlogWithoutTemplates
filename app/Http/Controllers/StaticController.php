<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class StaticController extends Controller {
    public function index() {
        $articles = Article::orderBy('id', 'desc')->limit(3)->get();
        return view('static/index')->with('articles', $articles);
    }

}
