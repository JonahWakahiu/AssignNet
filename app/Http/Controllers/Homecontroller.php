<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Homecontroller extends Controller
{
    public function index(): View
    {
        return view('home', );
    }
}
