<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $url      = env('URL_SERVER_API');
        $programs = $this->fetchDataFromApi($url . '/programs');

        return view('programs.index', compact('programs'));
    }

    public function show($id)
    {
        $url     = env('URL_SERVER_API');
        $program = $this->fetchDataFromApi($url . '/programs/' . $id);

        return view('programs.show', [
            'program'  => $program,
            'programs' => $program,
        ]);
    }

    public function create()
    {
        $url   = env('URL_SERVER_API');
        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('programs.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $url     = env('URL_SERVER_API');
        $fileKey = $request->hasFile('imagen') ? 'imagen' : 'urlFoto';
        $fields  = $request->except($fileKey);
        $files   = $request->hasFile($fileKey) ? [$fileKey => $request->file($fileKey)] : [];

        $response = $this->multipartRequest('POST', $url . '/programs', $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar el programa (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('programs.index')->with('success', 'Programa registrado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $program = $this->fetchDataFromApi($url . '/programs/' . $id);
        $areas   = $this->fetchDataFromApi($url . '/areas');

        return view('programs.edit', compact('program', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $url     = env('URL_SERVER_API');
        $fileKey = $request->hasFile('imagen') ? 'imagen' : 'urlFoto';
        $fields  = array_merge($request->except($fileKey), ['_method' => 'PUT']);
        $files   = $request->hasFile($fileKey) ? [$fileKey => $request->file($fileKey)] : [];

        $response = $this->multipartRequest('POST', $url . '/programs/' . $id, $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar el programa (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('programs.index')->with('success', 'Programa actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/programs/' . $id);

        return redirect()->route('programs.index');
    }
}
