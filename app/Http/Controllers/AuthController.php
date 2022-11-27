<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
  public function login()
  {
    (Http::post('localhost:3000/api/login', ['email' => 'uaser@gmail.com',
      'password' => 'password'])->body());
    setcookie('username', 'user', time() + 3600, '/');
    return redirect()->route('dashboard');
  }

  public function register()
  {
    $user = Http::post('localhost:3000/api/register', ['name' => 'aa', 'email' => 'uaser@gmail.com',
      'password' => 'password', 'confirm_password' => 'password'])->body();
    setcookie('username', 'user', time() + 3600, '/');
    return redirect()->route('dashboard');
  }

  public function logout()
  {
    setcookie('username', '', time() - 1, '/');
    return redirect()->route('home');
  }
}
