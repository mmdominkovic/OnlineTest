<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Dobro došli u Online Testove';
        return view('auth.login')->with('title', $title);
        //return view('pages.index',compact('title'));
    }

    public function about(){
        $data = array(
            'title' => 'About us!',
            'madeby' =>'Ermin Srna i Marija Magdalena Dominković'
        );
        return view('pages.about')->with($data);
    }
}
