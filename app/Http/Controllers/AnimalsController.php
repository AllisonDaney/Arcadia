<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\View\View;

class AnimalsController extends Controller

{
    public function index(): View {
        $animals = Animal::with('home')->get();

        return view('animals', ["animals" => $animals]);
    }
}
