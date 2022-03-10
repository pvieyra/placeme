<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(){
      $demo = [
        [
          'title' => "Titulo a usar 1",
          'content' => "Contenido del post 1"
        ],
        [
          'title' => "Titulo a usar 2",
          'content' => "Contenido del post 2"
        ],
      ];

        return view('home')->with('demo',$demo);
    }
}
