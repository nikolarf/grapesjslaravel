<?php

namespace App\Http\Controllers;

use App\ContentPage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    

    public function showsite($username, $site_id){

        $site_id = substr($site_id, -1);

        //dd($site_id);

        return view('index', compact('site_id'));

    }

    public function deletesite($site_id){

        DB::table('content_pages')->where('id', '=', $site_id)->delete();
        return redirect('/home');

    }

}


