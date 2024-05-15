<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdministrationController extends Controller
{
    public function admin_administrator(): View
    {
        return view('admins/administrator');
    }
}
