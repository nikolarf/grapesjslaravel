<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $uid = auth()->id();
        $username = Auth::user()->name;

        //dd($username);

        $contentpages = DB::table('content_pages')->where('user_id', $uid)->get();

        //dd($contentpages[0]->id);

        return view('home', compact('uid', 'username', 'contentpages'));

    }
}
