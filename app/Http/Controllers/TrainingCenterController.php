<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json();
    }

    public function index()   // http://admin-sena.test/api/training-centers
    {
        $url = env('URL_SERVER_API');

        $trainingcenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('trainingcenters.index', compact('trainingcenters'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $trainingcenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('trainingcenters.show', compact('trainingcenter'));
    }

    public function create()
    {
        return view('trainingcenters.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/training-centers', $request->all());

        return redirect()->route('trainingcenters.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $trainingcenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('trainingcenters.edit', compact('trainingcenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/training-centers/' . $id, $request->all());

        return redirect()->route('trainingcenters.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/training-centers/' . $id);

        return redirect()->route('trainingcenters.index');
    }
}