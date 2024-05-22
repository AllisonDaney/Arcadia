<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdministrationController extends Controller
{
    public function admin_administrator(): View
    {
        return view('admins/administrator');
    }

    public function admin_employee(): View
    {
        return view('admins/employee');
    }

    public function admin_veterinary(): View
    {
        return view('admins/veterinary');
    }
}
