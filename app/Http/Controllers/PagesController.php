<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        $var="This is content of about page sent dynamically";
        return view('pages.about')->with("content",$var);
    }
}
