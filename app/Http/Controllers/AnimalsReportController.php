<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalsReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AnimalsReportController extends Controller
{
    public function index_admin(): View {
        $animalsReports = AnimalsReport::with(["animal", "user"])->get();
        $animals = Animal::get();

        return view('admins/admin_animals_reports', ["animalsReports" => $animalsReports, 'animals' => $animals]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $animalsReport = new AnimalsReport();
        $animalsReport->user_id = Auth::user()->id;
        $animalsReport->animal_id = $data['animal_id'];
        $animalsReport->food = $data['food'];
        $animalsReport->food_quantity = $data['food_quantity'];
        $animalsReport->food_at = Carbon::createFromFormat('Y-m-d H:i:s', $data['food_at_date'] . ' ' . $data['food_at_time'] . ':00')->format('Y-m-d H:i:s');

        $animalsReport->save();

        return ["data" => $animalsReport];
    }
}
