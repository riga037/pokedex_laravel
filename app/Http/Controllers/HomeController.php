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

    //Aplicaa totes les pàgines afectades pel controlador.
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
        return view('home');
    }

    public function prova() {
        if (auth()->check()) {
            //Accedir a l'usuari autentificat
            $user = auth()->user();
        }
    }
}
