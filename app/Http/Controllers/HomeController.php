<?php

namespace CodeFin\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     /* NÃO É NECESSÁRIO USAR ESTE CONSTRUTOR, POIS ESTAMOS DEFININDO NO GATE 
     EM Providers\AuthServiceProvider.php E CHAMANDO NO MIDDLEWARE can:access-admin
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
