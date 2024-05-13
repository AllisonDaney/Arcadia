<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Home;
use App\Models\HomesPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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

    public function create(Request $request) {
        $requestData = $request->all();

        $data = json_decode($requestData['data'], true);
        $file =  $request->file('file');

        $home = new Home();
        $home->label = $data['label'];
        $home->content = $data['content'];

        $home->save();

        if ($file) {
            $movedFile = Storage::disk('public_uploads')->put('/homes', $file);

            if (!$movedFile) {
                return ["error" => 'fichier'];
            }

            $homePicture = new HomesPicture();
            $homePicture->home_id = $home->id;
            $homePicture->url = 'img/uploads/' . $movedFile;
            $homePicture->save();
        }

        if (count($data['animalIds'])) {
            foreach($data['animalIds'] as $animalId) {
                $animal = Animal::find($animalId);
                $animal->home_id = $home->id;
                $animal->save();
            }
        }

        return ["data" => $home];
    }

    public function update(Request $request, Int $homeId) {
        $data = $request->all();

        $home = Home::find($homeId);
        $home->label = $data['label'];
        $home->content = $data['content'];
        $home->save();

        if (count($data['animalIds'])) {
            $animals = Animal::where('home_id', $homeId)->get();

            foreach($animals as $animal) {
                if (!in_array($animal['id'], $data['animalIds'])) {
                    $animal = Animal::find($animal['id']);
                    $animal->home_id = null;
                    $animal->save();
                }
            }
            foreach($data['animalIds'] as $animalId) {
                $animal = Animal::find($animalId);
                $animal->home_id = $home->id;
                $animal->save();
            }
        }

        return ["data" => $home];
    }

    public function update_image(Request $request, Int $homeId) {
        $file =  $request->file('file');

        $home = Home::find($homeId);

        if ($file) {
            $movedFile = Storage::disk('public_uploads')->put('/homes', $file);

            if (!$movedFile) {
                return ["error" => 'fichier'];
            }

            Storage::disk('public_uploads')->delete(str_replace('img/uploads/', '', $home->url));

            $homePicture = HomesPicture::first();
            $homePicture->url = 'img/uploads/' . $movedFile;
            $homePicture->save();
        }

        return ["data" => $home];
    }

    public function delete($homeId) {
        $home = Home::find($homeId);

        $home->delete();

        return [];
    }
}
