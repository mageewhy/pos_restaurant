<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages');
    }

 /*
     * Kitchen Pages Routs
     */

    //  public function index(Request $request)
    //  {
    //      $assets = ['chart', 'animation'];
    //      return view('pages', compact('assets'));
    //  }
    //
    // public function pages(){
    //     return view('pages');
    // }
}
