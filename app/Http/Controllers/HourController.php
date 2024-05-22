<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HourController extends Controller
{
    public function index_admin(): View {
        $hours = Hour::get();

        return view('admins/admin_hours', ["hours" => $hours]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $hour = new Hour();
        $hour->day = $data['day'];
        $hour->opening_time = $data['opening_time'];
        $hour->closing_time = $data['closing_time'];

        $hour->save();

        return ["data" => $hour];
    }

    public function update(Request $request, Int $hourId) {
        $data = $request->all();

        $hour = Hour::find($hourId);
        $hour->day = $data['day'];
        $hour->opening_time = $data['opening_time'];
        $hour->closing_time = $data['closing_time'];
        $hour->save();

        return ["data" => $hour];
    }

    public function delete($hourId) {
        $hour = Hour::find($hourId);

        $hour->delete();

        return [];
    }
}
