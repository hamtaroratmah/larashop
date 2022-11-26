<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
  public function registerGitHub(Request $user)
  {
    dd($user);
    setcookie("user", serialize($user));
  }
}
