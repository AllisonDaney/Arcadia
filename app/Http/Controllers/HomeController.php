<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Home;
use App\Models\HomesPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Http\Requests\HomeFormRequest;

class HomeController extends Controller
{
    public function index(): View {
        $homes = Home::with("homePictures")->get();

        return view('home', ["homes" => $homes]);
    }

    public function show($homeId): View {
        $home = Home::with([
                    "homePictures",
                    "animals",
                    "animals.animalsPictures",
                    "animals.veterinariansReports" => function ($query) {
                        $query->orderBy("created_at", "desc")
                            ->first();
                    }
                ])
                    ->find($homeId);

        return view('home_show', ["home" => $home]);
    }

    public function index_admin(): View {
        $homes = Home::with("homePictures")->get();
        $animals = Animal::with('home')->get();

        return view('admins/admin_homes', ["homes" => $homes, "animals" => $animals]);
    }

    public function create(HomeFormRequest $request) {
        try {
            $home = Home::create($request->validated());

            $file = $request->file('file');
            if ($file) {
                $movedFile = Storage::disk('public_uploads')->put('/homes', $file);

                if (!$movedFile) {
                    return to_route('admin_homes')->with('error', "Le fichier n'a pas été uploadé");
                }

                $homePicture = new HomesPicture();
                $homePicture->home_id = $home->id;
                $homePicture->url = 'img/uploads/' . $movedFile;
                $homePicture->save();
            }

            if (count($request->input('animals'))) {
                foreach($request->input('animals') as $animalId) {
                    $animal = Animal::find($animalId);
                    $animal->home_id = $home->id;
                    $animal->save();
                }
            }
        } catch (\Throwable $th) {
            return to_route('admin_homes')->with('error', "L'habitat n'a pas été créé");
        }

        return to_route('admin_homes')->with('success', "L'habitat a été créé");
    }

    public function update(HomeFormRequest $request, Int $homeId) {
        try {
            $home = Home::find($homeId);

            $home->label = $request->input('label');
            $home->content = $request->input('content');
            
            $file = $request->file('file');
            if ($file) {
                $movedFile = Storage::disk('public_uploads')->put('/homes', $file);

                if (!$movedFile) {
                    return ["error" => 'fichier'];
                }
    
                Storage::disk('public_uploads')->delete(str_replace('img/uploads/', '', $home->url));
    
                $homePicture = HomesPicture::where('home_id', $home->id)->first();
                $homePicture->home_id = $home->id;
                $homePicture->url = 'img/uploads/' . $movedFile;
                $homePicture->save();
            }

            if (count($request->input('animals'))) {
                $animals = Animal::where('home_id', $homeId)->get();

                foreach($animals as $animal) {
                    if (!in_array($animal['id'], $request->input('animals'))) {
                        $animal = Animal::find($animal['id']);
                        $animal->home_id = null;
                        $animal->save();
                    }
                }
                foreach($request->input('animals') as $animalId) {
                    $animal = Animal::find($animalId);
                    $animal->home_id = $home->id;
                    $animal->save();
                }
            }

            $home->save();
        } catch (\Throwable $th) {
            return to_route('admin_homes')->with('error', "L'habitat n'a pas été modifié");
        }
        return to_route('admin_homes')->with('success', "L'habitat a été modifié");
        // $data = $request->all();

        // $home = Home::find($homeId);
        // $home->label = $data['label'];
        // $home->content = $data['content'];
        // $home->save();

        // if (count($data['animalIds'])) {
        //     $animals = Animal::where('home_id', $homeId)->get();

        //     foreach($animals as $animal) {
        //         if (!in_array($animal['id'], $data['animalIds'])) {
        //             $animal = Animal::find($animal['id']);
        //             $animal->home_id = null;
        //             $animal->save();
        //         }
        //     }
        //     foreach($data['animalIds'] as $animalId) {
        //         $animal = Animal::find($animalId);
        //         $animal->home_id = $home->id;
        //         $animal->save();
        //     }
        // }

        // return ["data" => $home];
    }

    public function delete($homeId) {
        try {
            $home = Home::find($homeId);
            $home->delete();
        } catch (\Throwable $th) {
            return to_route('admin_homes')->with('error', "L'habitat n'a pas été supprimé");
        }

        return to_route('admin_homes')->with('success', "L'habitat a été supprimé");
    }
}
