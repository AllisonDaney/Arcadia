<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::get();

        return view('services', ["services" => $services]);
    }
}
