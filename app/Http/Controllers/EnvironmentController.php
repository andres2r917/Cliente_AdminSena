<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');

        $environments = $this->fetchDataFromApi($url . '/environments');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('environments.index', compact('environments', 'trainingCenters'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $environment     = $this->fetchDataFromApi($url . '/environments/' . $id);
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('environments.show', [
            'environment'     => $environment,
            'environments'    => $environment,
            'trainingCenters' => $trainingCenters,
        ]);
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('environments.create', compact('trainingCenters'));
    }

    public function store(Request $request)
    {
        $url    = env('URL_SERVER_API');
        $fields = $request->except('urlFoto');
        $files  = $request->hasFile('urlFoto') ? ['urlFoto' => $request->file('urlFoto')] : [];

        $response = $this->multipartRequest('POST', $url . '/environments', $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar el ambiente (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('environments.index')->with('success', 'Ambiente registrado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $environment     = $this->fetchDataFromApi($url . '/environments/' . $id);
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('environments.edit', [
            'environment'     => $environment,
            'environments'    => $environment,
            'trainingCenters' => $trainingCenters,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url    = env('URL_SERVER_API');
        $fields = array_merge($request->except('urlFoto'), ['_method' => 'PUT']);
        $files  = $request->hasFile('urlFoto') ? ['urlFoto' => $request->file('urlFoto')] : [];

        // Siempre POST con _method=PUT (multipart no soporta PUT nativo en muchos servidores)
        $response = $this->multipartRequest('POST', $url . '/environments/' . $id, $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar el ambiente (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('environments.index')->with('success', 'Ambiente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/environments/' . $id);

        return redirect()->route('environments.index')->with('success', 'Ambiente eliminado.');
    }
}
