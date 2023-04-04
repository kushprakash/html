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
		 // Get default limit
    $normalTimeLimit = ini_get('max_execution_time');

    // Set new limit
    ini_set('max_execution_time', 1200); 

    //other code

    // Restore default limit
    ini_set('max_execution_time', $normalTimeLimit); 

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
}
