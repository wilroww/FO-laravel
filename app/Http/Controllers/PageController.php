<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('shop.home');
    }

    public function about()
    {
        return view('shop.about');
    }

    public function showLogin()
    {
        return view('shop.login');
    }

    public function showSignup()
    {
        // Points to shop/signup.blade.php
        return view('shop.signup'); 
    }
}