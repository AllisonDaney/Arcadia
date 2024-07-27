<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ServiceFormRequest;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::get();

        return view('services', ["services" => $services]);
    }

    public function index_admin(): View {
        $services = Service::get();

        return view('admins/admin_services', ["services" => $services]);
    }

    public function create(ServiceFormRequest $request) {
        try {
            $newService = $request->validated();
            $file = $request->file('file');

            if ($file) {
                $movedFile = Storage::disk('public_uploads')->put('/services', $file);

                if (!$movedFile) {
                    return to_route('admin_services')->with('error', "Le fichier n'a pas été uploadé");
                }

                $newService['url'] = 'img/uploads/' . $movedFile;
            }

            if (isset($newService['options'])) {
                $options = [];

                foreach($newService['options'] as $option) {
                    if ($option['title'] && $option['content']) {
                        $options[$option['title']] = $option['content'];
                    }
                }

                $newService['options'] = json_encode($options);
            } else {
                $newService['options'] = json_encode([]);
            }

            Service::create($newService);
        } catch (\Throwable $th) {
            return to_route('admin_services')->with('error', "Le service n'a pas été créé");
        }
    
        return to_route('admin_services')->with('success', "Le service a été créé");

        // $requestData = $request->all();

        // $data = json_decode($requestData['data'], true);
        // $file =  $request->file('file');

        // $options = [];

        // foreach($data['options'] as $option) {
        //     if ($option['title'] && $option['content']) {
        //         $options[$option['title']] = $option['content'];
        //     }
        // }

        // $service = new Service();
        // $service->label = $data['label'];
        // $service->content = $data['content'];
        // $service->options = json_encode($options);


        // if ($file) {
        //     $movedFile = Storage::disk('public_uploads')->put('/services', $file);

        //     if (!$movedFile) {
        //         return ["error" => 'fichier'];
        //     }

        //     $service->url = 'img/uploads/' . $movedFile;
        // }

        // $service->save();

        // return ["data" => $service];
    }

    public function update(Request $request, Int $serviceId) {
        $data = $request->all();

        $options = [];

        foreach($data['options'] as $option) {
            if ($option['title'] && $option['content']) {
                $options[$option['title']] = $option['content'];
            }
        }

        $service = Service::find($serviceId);
        $service->label = $data['label'];
        $service->content = $data['content'];
        $service->options = json_encode($options);
        $service->save();

        return ["data" => $service];
    }

    public function update_image(Request $request, Int $serviceId) {
        $file =  $request->file('file');

        $service = Service::find($serviceId);

        if ($file) {
            $movedFile = Storage::disk('public_uploads')->put('/services', $file);

            if (!$movedFile) {
                return ["error" => 'fichier'];
            }

            Storage::disk('public_uploads')->delete(str_replace('img/uploads/', '', $service->url));

            $service->url = 'img/uploads/' . $movedFile;
            $service->save();
        }

        return ["data" => $service];
    }

    public function delete($serviceId) {
        try {
            $service = Service::find($serviceId);
            $service->delete();
        } catch (\Throwable $th) {
            return to_route('admin_services')->with('error', "Le service n'a pas été supprimé");
        }

        return to_route('admin_services')->with('success', "Le service a été supprimé");
    }
}
