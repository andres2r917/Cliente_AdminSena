<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json();
    }

    public function index()   // http://admin-sena.test/api/computers
    {
        $url = env('URL_SERVER_API');

        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('computers.index', compact('computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('computers.show', compact('computer'));
    }

    public function create()
    {
        return view('computers.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/computers', $request->all());

        return redirect()->route('computers.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('computers.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/computers/' . $id, $request->all());

        return redirect()->route('computers.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/computers/' . $id);

        return redirect()->route('computers.index');
    }
}