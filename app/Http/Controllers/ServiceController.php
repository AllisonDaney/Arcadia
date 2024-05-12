<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create(Request $request) {
        $requestData = $request->all();

        $data = json_decode($requestData['data'], true);
        $file =  $request->file('file');

        $options = [];

        foreach($data['options'] as $option) {
            if ($option['title'] && $option['content']) {
                $options[$option['title']] = $option['content'];
            }
        }

        $service = new Service();
        $service->label = $data['label'];
        $service->content = $data['content'];
        $service->options = json_encode($options);

        if ($file) {
            $movedFile = Storage::disk('public_uploads')->put('/services', $file);

            if (!$movedFile) {
                return ["error" => 'fichier'];
            }

            $service->url = 'img/uploads/' . $movedFile;
        }

        $service->save();

        return ["data" => $service];
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

    public function delete($serviceId) {
        $service = Service::find($serviceId);

        $service->delete();

        return [];
    }
}
