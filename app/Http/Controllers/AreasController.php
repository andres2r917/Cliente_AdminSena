<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json();
    }

    public function index()   // http://admin-sena.test/api/areas
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('areas.index', compact('areas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('areas.show', compact('area'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/areas', $request->all());

        return redirect()->route('areas.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/areas/' . $id, $request->all());

        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/areas/' . $id);

        return redirect()->route('areas.index');
    }
}