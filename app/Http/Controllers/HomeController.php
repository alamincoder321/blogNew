<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("home");
    }




    //logout method
    public function logout()
    {
        Auth::guard("web")->logout();
        return redirect("/");
    }
}
