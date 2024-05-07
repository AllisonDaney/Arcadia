<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View {
        $homes = Home::with("homePictures")->get();

        return view('home', ["homes" => $homes]);
    }

    public function show($homeId): View {
        $home = Home::with([
                    "homePictures",
                    "animals",
                    "animals.animalsPictures",
                    "animals.veterinariansReports" => function ($query) {
                        $query->orderBy("created_at", "desc")
                            ->first();
                    }
                ])
                    ->find($homeId);

        return view('home_show', ["home" => $home]);
    }
}
