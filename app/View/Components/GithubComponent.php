<?php

namespace App\View\Components;

use App\Models\UserDTO;
use Illuminate\View\Component;

class GithubComponent extends Component
{
  public $user;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(UserDTO $user)
  {
    $this->user = $user;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.github-component');
  }
}
