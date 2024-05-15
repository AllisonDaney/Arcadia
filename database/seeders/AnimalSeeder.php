<?php

namespace Database\Seeders;

use App\Models\AnimalsPicture;
use App\Models\Animal;
use App\Models\Home;

class AnimalSeeder extends SeederProvider
{
    public function run(): void
    {
        foreach($this->animals as $homeLabel => $animals) {
            $home = Home::where("label", $homeLabel)->first();
           
            foreach($animals as $animal) {
                $newAnimal = new Animal();
                $newAnimal->home_id = $home["id"];
                $newAnimal->name = $animal["name"];
                $newAnimal->breed = $animal["breed"];
                $newAnimal->save();
    
                foreach($animal["animals_pictures"] as $picture) {
                    $newPicture = new AnimalsPicture();
                    $newPicture->animal_id = $newAnimal->id;
                    $newPicture->url = $picture["url"];
                    $newPicture->save();
                }
            }
        }
    }
}