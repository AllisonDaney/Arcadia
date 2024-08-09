<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MentionsLegalesController extends Controller
{
    //
    public function index () {
        

        return view('mentions_legales');
    }
}
