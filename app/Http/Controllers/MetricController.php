<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetricController extends Controller
{
    public function create(Request $request)
    {
        $collection = DB::connection('mongodb')
            ->collection('metrics')
            ->where('model', $request->input('model'))
            ->where('table_id', $request->input('tableId'));

        if ($collection->first()) {
            $collection = $collection->increment('count', 1);
        } else {
            $collection = $collection->update(
                [
                    'count' => 1,
                ],
                ['upsert' => true],
            );
        }

        return ['data' => $collection];
    }
}
