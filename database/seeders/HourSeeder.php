<?php

namespace Database\Seeders;

use App\Models\Hour;
use Illuminate\Database\Seeder;


class HourSeeder extends SeederProvider
{
    public function run(): void
    {
        foreach($this->hours as $hour) {
            $newhours = new Hour();
            $newhours->day = $hour["day"];
            $newhours->opening_time = $hour["opening_time"];
            $newhours->closing_time = $hour["closing_time"];
            $newhours->save();
         }
    }
}