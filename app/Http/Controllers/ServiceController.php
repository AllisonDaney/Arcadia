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
            DB::transaction(function () {
                $newService = $request->validated();
                $file = $request->file('file');

                if ($file) {
                    $movedFile = Storage::disk('public_uploads')->put('/services', $file);

                    if (!$movedFile) {
                        return to_route('admin_services')->with('error', "Le fichier n'a pas été uploadé");
                    }

                    $newService['url'] = 'img/uploads/' . $movedFile;
                }

                if (isset($newService['options']) && is_array($newService['options']) && count($newService['options']) > 0) {
                    $options = [];

                    foreach($newService['options'] as $option) {
                        if (isset($option['title']) && $option['title'] && isset($option['content']) && $option['content']) {
                            $options[$option['title']] = $option['content'];
                        }
                    }

                    $newService['options'] = json_encode($options);
                } else {
                    $newService['options'] = json_encode([]);
                }

                Service::create($newService);
            });
        } catch (\Throwable $th) {
            return to_route('admin_services')->with('error', "Le service n'a pas été créé");
        }
    
        return to_route('admin_services')->with('success', "Le service a été créé");
    }

    public function update(ServiceFormRequest $request, Int $serviceId) {
        try {
            DB::transaction(function () {
                $service = Service::find($serviceId);

                $service->label = $request->input('label');
                $service->content = $request->input('content');

                $file = $request->file('file');
                if ($file) {
                    $movedFile = Storage::disk('public_uploads')->put('/services', $file);

                    if (!$movedFile) {
                        return to_route('admin_services')->with('error', "Le fichier n'a pas été uploadé");
                    }

                    $service->url = 'img/uploads/' . $movedFile;
                }
                
                if ($request->input('options') !== null && is_array($request->input('options')) && count($request->input('options')) > 0) {
                    $options = [];

                    foreach($request->input('options') as $option) {
                        if (isset($option['title']) && $option['title'] && isset($option['content']) && $option['content']) {
                            $options[$option['title']] = $option['content'];
                        }
                    }

                    $service->options = json_encode($options);
                } else {
                    $service->options = json_encode([]);
                }

                $service->save();   
            });
        } catch (\Throwable $th) {
            return to_route('admin_services')->with('error', "Le service n'a pas été modifié");
        }
    
        return to_route('admin_services')->with('success', "Le service a été modifié");
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
