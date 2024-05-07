<?php

namespace Database\Seeders;

use App\Models\Home;
use App\Models\HomesPicture;
use Illuminate\Database\Seeder;

class HomeSeeder extends SeederProvider
{
    public function run(): void
    {
        foreach($this->homes as $home) {
            $newHome = new Home();
            $newHome->label = $home["label"];
            $newHome->content = $home["content"];
            $newHome->save();

            foreach($home["homes_pictures"] as $picture) {
                $newPicture = new HomesPicture();
                $newPicture->home_id = $newHome->id;
                $newPicture->url = $picture["url"];
                $newPicture->save();
            }
        }
    }
}



