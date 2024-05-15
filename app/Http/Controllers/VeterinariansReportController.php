<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\VeterinariansReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VeterinariansReportController extends Controller
{
    public function index_admin(): View {
        $veterinariansReports = VeterinariansReport::get();
        $animals = Animal::get();

        return view('admins/admin_veterinarians_reports', [
            "veterinariansReports" => $veterinariansReports,
            "animals" => $animals
        ]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $veterinariansReport = new VeterinariansReport();
        $veterinariansReport->user_id = Auth::user()->id;
        $veterinariansReport->animal_id = $data['animal_id'];
        $veterinariansReport->animal_condition = $data['animal_condition'];
        $veterinariansReport->food = $data['food'];
        $veterinariansReport->food_quantity = +$data['food_quantity'];
        $veterinariansReport->details = $data['details'];
        $veterinariansReport->visit_at = Carbon::createFromFormat('Y-m-d H:i:s', $data['visit_at_date'] . ' ' . $data['visit_at_time'] . ':00')->format('Y-m-d H:i:s');

        $veterinariansReport->save();

        return ["data" => $veterinariansReport];
    }
}
