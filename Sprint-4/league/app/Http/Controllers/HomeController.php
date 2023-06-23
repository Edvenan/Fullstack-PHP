<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        //return "Welcome to the League!";
        
        // call the view 'home.php'
        return view('home');
    }
}

