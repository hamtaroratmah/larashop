<?php

    namespace App\View\Components;

    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class HomeComponent extends Component
    {
        public String $html;


        /**
         * Create a new component instance.
         *
         * @return void
         */
        public function __construct(string $html = "default value")
        {
            $this->html = $html;
        }

        /**
         * Get the view / contents that represent the component.
         *
         * @return View|\Closure|string
         */
        public function render()
        {
//            dd($this->html);
            return view('components.home-component');
        }
    }
