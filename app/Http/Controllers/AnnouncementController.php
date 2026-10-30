<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $url           = env('URL_SERVER_API');
        $announcements = $this->fetchDataFromApi($url . '/announcements');

        return view('announcements.index', compact('announcements'));
    }

    public function show($id)
    {
        $url           = env('URL_SERVER_API');
        $announcements = $this->fetchDataFromApi($url . '/announcements/' . $id);

        return view('announcements.show', [
            'announcements' => $announcements,
            'announcement'  => $announcements,
        ]);
    }

    public function create()
    {
        $url              = env('URL_SERVER_API');
        $training_centers = $this->fetchDataFromApi($url . '/training-centers');

        return view('announcements.create', [
            'training_centers' => $training_centers,
            'trainingCenters'  => $training_centers,
        ]);
    }

    public function store(Request $request)
    {
        $url     = env('URL_SERVER_API');
        $fileKey = $request->hasFile('imagen') ? 'imagen' : 'urlFoto';
        $fields  = $request->except($fileKey);
        $files   = $request->hasFile($fileKey) ? [$fileKey => $request->file($fileKey)] : [];

        $response = $this->multipartRequest('POST', $url . '/announcements', $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar el anuncio (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('announcements.index')->with('success', 'Anuncio registrado correctamente.');
    }

    public function edit($id)
    {
        $url              = env('URL_SERVER_API');
        $announcements    = $this->fetchDataFromApi($url . '/announcements/' . $id);
        $training_centers = $this->fetchDataFromApi($url . '/training-centers');

        return view('announcements.edit', [
            'announcements'    => $announcements,
            'announcement'     => $announcements,
            'training_centers' => $training_centers,
            'trainingCenters'  => $training_centers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url     = env('URL_SERVER_API');
        $fileKey = $request->hasFile('imagen') ? 'imagen' : 'urlFoto';
        $fields  = array_merge($request->except($fileKey), ['_method' => 'PUT']);
        $files   = $request->hasFile($fileKey) ? [$fileKey => $request->file($fileKey)] : [];

        $response = $this->multipartRequest('POST', $url . '/announcements/' . $id, $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar el anuncio (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('announcements.index')->with('success', 'Anuncio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/announcements/' . $id);

        return redirect()->route('announcements.index');
    }
}
