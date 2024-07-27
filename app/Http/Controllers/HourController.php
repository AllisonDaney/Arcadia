<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\HourRequestForm;

class HourController extends Controller
{
    private $days = [
        ['id' => 'Lundi', 'label' => 'Lundi'],
        ['id' => 'Mardi', 'label' => 'Mardi'],
        ['id' => 'Mercredi', 'label' => 'Mercredi'],
        ['id' => 'Jeudi', 'label' => 'Jeudi'],
        ['id' => 'Vendredi', 'label' => 'Vendredi'],
        ['id' => 'Samedi', 'label' => 'Samedi'],
        ['id' => 'Dimanche', 'label' => 'Dimanche']
    ];

    public function index_admin(): View {
        $hours = Hour::get();

        return view('admins/admin_hours', ["hours" => $hours, "days" => $this->days]);
    }

    public function create(HourRequestForm $request) {
        try {
            Hour::create($request->validated());
        } catch (\Throwable $th) {
            dd($th);
            return to_route('admin_hours')->with('error', "L'horaire n'a pas été créé");
        }

        return to_route('admin_hours')->with('success', "L'horaire a été créé");
    }

    public function update(Request $request, Int $hourId) {
        try {
            $hour = Hour::find($hourId);

            $hour->day = $request->input('day');
            $hour->opening_time = $request->input('opening_time');
            $hour->closing_time = $request->input('closing_time');

            $hour->save();
        } catch (\Throwable $th) {
            return to_route('admin_hours')->with('error', "L'horaire n'a pas été modifié");
        }
    
        return to_route('admin_hours')->with('success', "L'horaire a été modifié");
    }

    public function delete($hourId) {
        try {
            $hour = Hour::find($hourId);
            $hour->delete();
        } catch (\Throwable $th) {
            return to_route('admin_hours')->with('error', "L'horaire n'a pas été supprimé");
        }

        return to_route('admin_hours')->with('success', "L'horaire a été supprimé");
    }
}
