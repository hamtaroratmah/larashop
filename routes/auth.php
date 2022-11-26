<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GithubController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('guest')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

  Route::post('register', [RegisteredUserController::class, 'store']);

  Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

  Route::post('login', [AuthenticatedSessionController::class, 'store']);

  Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

  Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

  Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

  Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');

  Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
  })->name("registerGithub");

  Route::get('/auth/github/callback', function () {
//    dd(Socialite::driver('github')->user());
    $controller = new GithubController();
    $controller->registerGitHub(Socialite::driver('github')->stateless()->user());
  })->name("callBackGitHub");
});
