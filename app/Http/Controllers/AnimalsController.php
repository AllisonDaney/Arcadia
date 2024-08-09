<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalsPicture;
use App\Models\Home;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Http\Requests\AnimalFormRequest;
use Illuminate\Support\Facades\DB;

class AnimalsController extends Controller
{
    public function index(): View {
        $animals = Animal::with('home')->whereNotNull('home_id')->get();

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

    public function create(AnimalFormRequest $request) {
        try {
            DB::transaction(function () use ($request) {
                $animal = Animal::create($request->validated());

                $file = $request->file('file');
                if ($file) {
                    $movedFile = Storage::disk('public_uploads')->put('/animals', $file);

                    if (!$movedFile) {
                        return to_route('admin_animals')->with('error', "Le fichier n'a pas été uploadé");
                    }

                    $animalPicture = new AnimalsPicture();
                    $animalPicture->animal_id = $animal->id;
                    $animalPicture->url = 'img/uploads/' . $movedFile;
                    $animalPicture->save();
                }
            });
        } catch (\Throwable $th) {
            return to_route('admin_animals')->with('error', "L'animal n'a pas été créé");
        }

        return to_route('admin_animals')->with('success', "L'animal a été créé");
    }

    public function update(Request $request, Int $animalId) {
        try {
            DB::transaction(function () use ($request, $animalId) {
                $animal = Animal::find($animalId);

                $animal->name = $request->input('name');
                $animal->home_id = $request->input('home_id');
                $animal->breed = $request->input('breed');

                $file = $request->file('file');
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

                $animal->save();
            });
        } catch (\Throwable $th) {
            return to_route('admin_animals')->with('error', "L'animal n'a pas été modifié");
        }

        return to_route('admin_animals')->with('success', "L'animal a été modifié");
    }

    public function delete($animalId) {
        try {
            Animal::find($animalId)->delete();
        } catch (\Throwable $th) {
            return to_route('admin_animals')->with('error', "L'animal n'a pas été supprimé");
        }

        return to_route('admin_animals')->with('success', "L'animal a été supprimé");
    }
}
