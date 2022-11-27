<?php

namespace App\Http\Controllers;

use App\Models\UserDTO;
use Laravel\Socialite\Contracts\User;

class GithubController extends Controller
{
  public function registerGitHub(User $githubUser)
  {
//    dd($username);
    $user = (new UserDTO)->setFillable([
      'id' => $githubUser->id,
      'name' => $githubUser->name,
      'email' => $githubUser->email,
      'password' => $githubUser->token,
      'avatar' => $githubUser->getAvatar(),
      'nickname' => $githubUser->getNickname(),
    ]);
    setcookie("userID", $user->getFillable()['id'], time() + 3600, '/');
    setcookie("username", $user->getFillable()['name'], time() + 3600, '/');
  }
}
