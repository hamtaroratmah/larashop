<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GithubController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('guest')->group(function () {

  Route::get('/auth/login', [AuthController::class, 'login'])->name('login');

  Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
  Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
  })->name("registerGithub");

  Route::get('/auth/github/callback', function () {
    $controller = new GithubController();
    if (!isset($_COOKIE['username'])) $controller->registerGitHub(Socialite::driver('github')->stateless()->user());
    return redirect()->to('dashboard');
  })->name("callBackGitHub");
});
