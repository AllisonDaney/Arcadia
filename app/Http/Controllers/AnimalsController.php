<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalsPicture;
use App\Models\Home;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnimalsController extends Controller
{
    public function index(): View {
        $animals = Animal::with('home')->get();

        return view('animals', ["animals" => $animals]);
    }

    public function index_admin(): View {
        $animals = Animal::with(['home', 'animalsPictures'])->get();
        $homes = Home::get();

        return view('admins/admin_animals', ["animals" => $animals, "homes" => $homes]);
    }

    public function show(Int $animalId) {
        $animal = Animal::with([
                'animalsReports' => function ($query) {
                    $query->orderBy("created_at", "desc")
                        ->first();
                }
            ])
            ->find($animalId);

        return $animal;
    }

    public function create(Request $request) {
        $requestData = $request->all();

        $data = json_decode($requestData['data'], true);
        $file =  $request->file('file');

        $animal = new Animal();
        $animal->name = $data['name'];
        $animal->home_id = $data['home_id'];
        $animal->breed = $data['breed'];
        $animal->food = $data['food'];
        $animal->food_quantity = $data['food_quantity'];
        $animal->food_at = Carbon::createFromFormat('Y-m-d H:i:s', $data['food_at_date'] . ' ' . $data['food_at_time'] . ':00')->format('Y-m-d H:i:s');

        $animal->save();

        if ($file) {
            $movedFile = Storage::disk('public_uploads')->put('/animals', $file);

            if (!$movedFile) {
                return ["error" => 'fichier'];
            }

            $animalPicture = new AnimalsPicture();
            $animalPicture->animal_id = $animal->id;
            $animalPicture->url = 'img/uploads/' . $movedFile;
            $animalPicture->save();
        }

        return ["data" => $animal];
    }

    public function update(Request $request, Int $animalId) {
        $data = $request->all();

        $animal = Animal::find($animalId);
        $animal->name = $data['name'];
        $animal->home_id = $data['home_id'];
        $animal->breed = $data['breed'];
        $animal->food = $data['food'];
        $animal->food_quantity = $data['food_quantity'];
        $animal->food_at = Carbon::createFromFormat('Y-m-d H:i:s', $data['food_at_date'] . ' ' . $data['food_at_time'] . ':00')->format('Y-m-d H:i:s');

        $animal->save();

        return ["data" => $animal];
    }

    public function update_image(Request $request, Int $animalId) {
        $file = $request->file('file');

        $animal = Animal::find($animalId);

        if ($file) {
            $movedFile = Storage::disk('public_uploads')->put('/animals', $file);

            if (!$movedFile) {
                return ["error" => 'fichier'];
            }

            Storage::disk('public_uploads')->delete(str_replace('img/uploads/', '', $animal->url));

            $animalPicture = AnimalsPicture::where('animal_id', $animal->id)->first();
            $animalPicture->animal_id = $animal->id;
            $animalPicture->url = 'img/uploads/' . $movedFile;
            $animalPicture->save();
        }

        return ["data" => $animal];
    }

    public function delete($animalId) {
        $animal = Animal::find($animalId);

        $animal->delete();

        return [];
    }
}
