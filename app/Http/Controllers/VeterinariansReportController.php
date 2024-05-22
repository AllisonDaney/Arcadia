<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\VeterinariansReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class VeterinariansReportController extends Controller
{
    public function index_admin(): View {
        $filterAnimalId = FacadesRequest::query('animalId');
        $filterStartDate = FacadesRequest::query('startDate');
        $filterEndDate = FacadesRequest::query('endDate');
        $filterDate = '';

        $veterinariansReports = VeterinariansReport::select();
        $animals = Animal::get();

        if($filterAnimalId) {
            $veterinariansReports = $veterinariansReports->where('animal_id', $filterAnimalId);
        }

        if($filterStartDate && $filterEndDate) {
            $filterDate = $filterStartDate . ' - ' . $filterEndDate;
            $veterinariansReports = $veterinariansReports->whereBetween('visit_at', [$filterStartDate, $filterEndDate]);
        }

        $veterinariansReports = $veterinariansReports->get();

        return view('admins/admin_veterinarians_reports', [
            "veterinariansReports" => $veterinariansReports,
            "animals" => $animals,
            "filterAnimalId" => +$filterAnimalId,
            "filterDate" => $filterDate
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
