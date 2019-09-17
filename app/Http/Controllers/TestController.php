<?php

namespace App\Http\Controllers;

use App\ContentPage;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    

    public function showsite($username, $site_id){

        $site_id = substr($site_id, -1);

        //dd($site_id);

        return view('index', compact('site_id'));

    }
}


