<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ContentPage;
use Auth;
use File;

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

        $user_dir = public_path() . '/' . $username;

        if (!file_exists($user_dir)){
            File::makeDirectory($user_dir);
        }

        //dd($username);

        $contentpages = DB::table('content_pages')->where('user_id', $uid)->get();
        $sites = DB::table('content_pages')->pluck('id');
        //$sites_ids = $sites->value('id');

        //dd($sites);
        

        foreach($sites as $site){
            $max_id[]=substr($site, -1);
        }

        $next_site_id = (max($max_id)) + 1;
        
        // $next_site_id = max($site_ids->id)+1;
        // dd($next_site_id);

        //dd($contentpages[0]->id);

        return view('home', compact('uid', 'username', 'contentpages', 'next_site_id'));

    }
}
