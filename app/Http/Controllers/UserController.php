<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function register(Request $request)
{
    user::create([
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'userEmail' => $request->userEmail,
        'userPassword' => Hash::make($request->userPassword),
    ]);

    return redirect('/login');
}
}
