<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdministrationController extends Controller
{
    public function admin_administrator(): View
    {
        $homes = Home::with(['animals'])->get();
        $dataSets = [];

        foreach($homes as $home) {
            $dataSets[] = $home->animals->map(function($animal) {
                /* $metrics = DB::connection('mongodb')
                    ->collection('metrics')
                    ->where('model', 'Animal')
                    ->where('table_id', strval($animal['id']))
                    ->get(); */

                return [
                    'id' => $animal['id'],
                    'name' => $animal['name'],
                    'data' => []//$metrics->map(function($metric) { return $metric['count']; })
                ];
            });
        }

        return view('admins/administrator', ['dataSets' => $dataSets]);
    }

    public function admin_employee(): View
    {
        return view('admins/employee');
    }

    public function admin_veterinary(): View
    {
        return view('admins/veterinary');
    }
}
