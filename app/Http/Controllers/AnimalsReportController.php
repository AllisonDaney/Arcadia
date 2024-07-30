<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalsReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\AnimalReportFormRequest;

class AnimalsReportController extends Controller
{
    public function index_admin(): View {
        $animalsReports = AnimalsReport::with(["animal", "user"])->get();
        $animals = Animal::get();

        return view('admins/admin_animals_reports', ["animalsReports" => $animalsReports, 'animals' => $animals]);
    }

    public function create(AnimalReportFormRequest $request) {
        try {
            $newAnimalReport = $request->validated();
            $newAnimalReport['user_id'] = Auth::user()->id;
            $newAnimalReport['food_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $newAnimalReport['food_at_date'] . ' ' . $newAnimalReport['food_at_time'] . ':00')->format('Y-m-d H:i:s');

            AnimalsReport::create($newAnimalReport);
        } catch (\Throwable $th) {
            return to_route('admin_animals_reports')->with('error', "Le rapport n'a pas été créé");
        }

        return to_route('admin_animals_reports')->with('success', "Le rapport a été créé");
    }
}
