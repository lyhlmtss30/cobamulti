<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        return view('home');
    }


    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardAdmin()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard_component.admin');
        // } else if (Auth::user()->role == 2){
        //     return view('404error');
        // }
        }
    }
    public function dashboardUser()
    {
        if (Auth::user()->role == 'user') {
            return view('dashboard_component.user');
        // } else if (Auth::user()->role == 1){
        //     return view('404error');
        // }
    }
}


}
