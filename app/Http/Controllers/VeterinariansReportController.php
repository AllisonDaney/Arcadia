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
use App\Http\Requests\VeterinarianReportFormRequest;

class VeterinariansReportController extends Controller
{
    public function index_admin(): View {
        $filterAnimalId = FacadesRequest::query('animal_id');
        $filterStartDate = FacadesRequest::query('start_date');
        $filterEndDate = FacadesRequest::query('end_date');

        $veterinariansReports = VeterinariansReport::select();
        $animals = Animal::get();

        if($filterAnimalId) {
            $veterinariansReports = $veterinariansReports->where('animal_id', $filterAnimalId);
        }

        if($filterStartDate && !$filterEndDate) {
            $veterinariansReports = $veterinariansReports->where('visit_at', '>=', $filterStartDate);
        } else if(!$filterStartDate && $filterEndDate) {
            $veterinariansReports = $veterinariansReports->where('visit_at', '<=', $filterEndDate);
        } else if($filterStartDate && $filterEndDate) {
            $veterinariansReports = $veterinariansReports->whereBetween('visit_at', [$filterStartDate, $filterEndDate]);
        }

        $veterinariansReports = $veterinariansReports->get();

        return view('admins/admin_veterinarians_reports', [
            "veterinariansReports" => $veterinariansReports,
            "animals" => $animals,
            "filterAnimalId" => $filterAnimalId,
            "filterStartDate" => $filterStartDate,
            "filterEndDate" => $filterEndDate
        ]);
    }

    public function create(VeterinarianReportFormRequest $request) {
        try {
            $newVeterinariansReport = $request->validated();
            $newVeterinariansReport['user_id'] = Auth::user()->id;
            $newVeterinariansReport['visit_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $newVeterinariansReport['visit_at_date'] . ' ' . $newVeterinariansReport['visit_at_time'] . ':00')->format('Y-m-d H:i:s');

            VeterinariansReport::create($newVeterinariansReport);
        } catch (\Throwable $th) {
            return to_route('admin_veterinarians_reports')->with('error', "Le rapport n'a pas été créé");
        }

        return to_route('admin_veterinarians_reports')->with('success', "Le rapport a été créé");
    }
}
