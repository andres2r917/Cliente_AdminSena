<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    public function index()   
    {
        $url = env('URL_SERVER_API');
        $trainingcenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('trainingcenters.index', [
            'trainingcenters'  => $trainingcenters,
            'Training_centers' => $trainingcenters,
        ]);
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $trainingcenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('trainingcenters.show', [
            'trainingcenter'   => $trainingcenter,
            'Training_centers' => $trainingcenter,
            'trainingCenter'   => $trainingcenter,
        ]);
    }

    public function create()
    {
        return view('trainingcenters.create');
    }

    public function store(Request $request)
    {
        // Validar los campos y la imagen obligatoria
        $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen'   => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');
        $file = $request->file('imagen');

        // Enviar datos e imagen adjunta a la API
        $response = Http::acceptJson()->attach(
            'imagen',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post($url . '/training-centers', [
            'name'     => $request->name,
            'location' => $request->location,
        ]);

        // Si la API devuelve un error de validación (422), regresamos con los errores
        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        return redirect()->route('trainingcenters.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $trainingcenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('trainingcenters.edit', [
            'trainingcenter'   => $trainingcenter,
            'Training_centers' => $trainingcenter,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validar los campos y la imagen opcional (nullable)
        $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');
        $endpoint = $url . '/training-centers/' . $id;

        // PHP no lee archivos en peticiones PUT directas, por lo que usamos POST simulando _method => PUT
        $data = [
            '_method'  => 'PUT',
            'name'     => $request->name,
            'location' => $request->location,
        ];

        $http = Http::acceptJson()->asMultipart();

        // Si el usuario seleccionó una nueva imagen, la adjuntamos
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $http->attach(
                'imagen',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            );
        }

        $response = $http->post($endpoint, $data);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        return redirect()->route('trainingcenters.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/training-centers/' . $id);

        return redirect()->route('trainingcenters.index');
    }
}