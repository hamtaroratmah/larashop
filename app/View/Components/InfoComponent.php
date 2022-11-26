<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoComponent extends Component
{
    public String $html;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($html)
    {
        $this->html = $html;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        dd(request()->cookie('githubUser'));
        return view('components.info-component');
    }
}
