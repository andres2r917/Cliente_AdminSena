<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');

        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('computers.index', compact('computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('computers.show', [
            'computer'  => $computer,
            'computers' => $computer,
        ]);
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $environments = $this->fetchDataFromApi($url . '/environments');

        return view('computers.create', compact('environments'));
    }

    public function store(Request $request)
    {
        $url    = env('URL_SERVER_API');
        $fields = $request->except('imagen');
        $files  = $request->hasFile('imagen') ? ['imagen' => $request->file('imagen')] : [];

        $response = $this->multipartRequest('POST', $url . '/computers', $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar el computador (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('computers.index')->with('success', 'Computador registrado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $computer     = $this->fetchDataFromApi($url . '/computers/' . $id);
        $environments = $this->fetchDataFromApi($url . '/environments');

        return view('computers.edit', [
            'computer'     => $computer,
            'computers'    => $computer,
            'environments' => $environments,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url    = env('URL_SERVER_API');
        $fields = array_merge($request->except('imagen'), ['_method' => 'PUT']);
        $files  = $request->hasFile('imagen') ? ['imagen' => $request->file('imagen')] : [];

        $response = $this->multipartRequest('POST', $url . '/computers/' . $id, $fields, $files);

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors') ?? ['error' => $response->body()])->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar el computador (' . $response->status() . '): ' . $response->body()])->withInput();
        }

        return redirect()->route('computers.index')->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/computers/' . $id);

        return redirect()->route('computers.index');
    }
}
