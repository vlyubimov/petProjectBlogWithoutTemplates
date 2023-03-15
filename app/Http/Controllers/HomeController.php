<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('home')->with('articles', $user->articles);
    }
}
