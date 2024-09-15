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
        $dataHomes = [];
        $mongodbConnection = DB::connection('mongodb');

        foreach($homes as $home) {
            $animals = $home->animals->map(function($animal) use ($mongodbConnection) {
                try {
                    $metric = $mongodbConnection
                        ->collection('metrics')
                        ->where('model', 'Animal')
                        ->where('table_id', strval($animal['id']))
                        ->first();
                } catch (\Throwable $th) {
                    $metric = null;
                }

                return [
                    'id' => $animal['id'],
                    'name' => $animal['name'],
                    'count' => isset($metric['count']) ? $metric['count'] : 0
                ];
            });

            $dataHomes[] = [
                'id' => $home['id'],
                'label' => $home['label'],
                'animals' => $animals
            ];
        }

        return view('admins/administrator', ['dataHomes' => $dataHomes]);
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
