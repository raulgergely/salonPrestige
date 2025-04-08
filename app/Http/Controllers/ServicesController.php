<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function services()
    {
        $locale = app()->getLocale();
        $jsonServices = json_decode(file_get_contents(resource_path('data/services.json')), true);
        $services = [];
        foreach ($jsonServices as $service_key => $service_data) {
            $services[$service_key] = [
                'name' => $service_data['name'][$locale] ?? $service_data['name']['ro'],
                'desc' => $service_data['desc'][$locale] ?? $service_data['desc']['ro'],
                'detailed_desc' => $service_data['detailed_desc'][$locale] ?? $service_data['detailed_desc']['ro'],
                'long_desc' => $service_data['long_desc'][$locale] ?? $service_data['long_desc']['ro'],
                'price' => $service_data['price'],
                'image' => $service_data['image'],
                'link' => $service_data['link']
            ];
        }

        return view('services', compact('services'));
    }
}
