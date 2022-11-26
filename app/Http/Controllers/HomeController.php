<?php

namespace App\Http\Controllers;

use App\View\Components\HomeComponent;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public HomeComponent $component;
    public String $html;


    public function updateView($html = "default value"){
        $this->component = new HomeComponent($html);
    }
}
