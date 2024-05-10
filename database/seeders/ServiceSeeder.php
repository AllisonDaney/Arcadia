<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;


class ServiceSeeder extends SeederProvider
{
    public function run(): void
    {
        foreach($this->services as $service) {
            $newservices = new Service();
            $newservices->label = $service["label"];
            $newservices->content = $service["content"];
            $newservices->url = $service["url"];
            $newservices->options = json_encode($service["options"]);
            $newservices->save();
        }
    }
}