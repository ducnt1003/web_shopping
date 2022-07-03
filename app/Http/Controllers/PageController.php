<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
        return view('contact',[
            'title'=>'Contact'
        ]);
    }

    public function about(){
        return view('about',[
            'title'=>'About Us'
        ]);
    }
}
