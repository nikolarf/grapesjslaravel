<?php

namespace App\Http\Controllers;

use App\ContentPage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use File;

class TestController extends Controller
{
    

    public function showsiteedit($username, $site_id){

        $site_id = substr($site_id, -1);

        return view('index', compact('site_id'));

    }

    public function newsite($username, $next_site_id){

        $site_id = substr($next_site_id, -1);

        $new_site = public_path() . '/' . $username . '/gjs-' . $site_id;
        $new_site_css = public_path() . '/' . $username . '/gjs-' . $site_id . '/css';
        $index_file = public_path() . '/' . $username . '/gjs-' . $site_id . '/index.html';
        $css_file = public_path() . '/' . $username . '/gjs-' . $site_id . '/css' . '/style.css'; 

        if (!file_exists($new_site)){
            File::makeDirectory($new_site);
        }

        if(file_exists($new_site) && !file_exists($new_site_css)){
            File::makeDirectory($new_site_css);
        }

        $index_file_content = '';
        $css_file_content = '';

        file_put_contents($index_file, $index_file_content);
        file_put_contents($css_file, $css_file_content);

        //dd($site_id);

        return view('index', compact('site_id'));

    }

    public function showsite($username, $site_id){

        //dd($site_id);

        $site_html = DB::table('content_pages')->where('id', $site_id)->pluck('html');
        $site_css = DB::table('content_pages')->where('id', $site_id)->pluck('css');

        //dd($site_html);

        $index_file = public_path() . '/' . $username . '/' . $site_id . '/index.html';
        $css_file = public_path() . '/' . $username . '/' . $site_id . '/css' . '/style.css'; 

        $site_html = str_replace('"', '\'', $site_html);
        $site_html = str_replace('\\', '', $site_html);
        $site_html = str_replace('[\'', '', $site_html);
        $site_html = str_replace('\']', '', $site_html);

        $index_file_content = '<!doctype html><html lang="en"><head><meta charset="utf-8"><link rel="stylesheet" href="./css/style.css"></head>';
        $index_file_content .= $site_html;
        $index_file_content .= '</html>';

        $css_file_content = $site_css;

        //dd($css_file_content);

        $css_file_content = str_replace('["', '', $css_file_content);
        $css_file_content = str_replace('"]', '', $css_file_content);

        file_put_contents($index_file, $index_file_content);
        file_put_contents($css_file, $css_file_content);

        $site_url = env('APP_URL'). '/' . $username . '/' . $site_id . '/index.html';

        return Redirect::to($site_url);


    }

    public function deletesite($site_id){

        DB::table('content_pages')->where('id', '=', $site_id)->delete();
        return redirect('/home');

    }

}


