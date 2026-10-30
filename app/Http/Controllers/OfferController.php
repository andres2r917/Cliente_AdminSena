<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $url    = env('URL_SERVER_API');
        $offers = $this->fetchDataFromApi($url . '/offers');

        return view('offers.index', compact('offers'));
    }

    public function show($id)
    {
        $url    = env('URL_SERVER_API');
        $offers = $this->fetchDataFromApi($url . '/offers/' . $id);

        return view('offers.show', [
            'offers' => $offers,
            'offer'  => $offers,
        ]);
    }

    public function create()
    {
        $url      = env('URL_SERVER_API');
        $programs = $this->fetchDataFromApi($url . '/programs');

        return view('offers.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $url      = env('URL_SERVER_API');
        $response = Http::acceptJson()->post($url . '/offers', $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar la oferta: ' . $response->status()])->withInput();
        }

        return redirect()->route('offers.index');
    }

    public function edit($id)
    {
        $url      = env('URL_SERVER_API');
        $offers   = $this->fetchDataFromApi($url . '/offers/' . $id);
        $programs = $this->fetchDataFromApi($url . '/programs');

        return view('offers.edit', [
            'offers'    => $offers,
            'offer'     => $offers,
            'programs'  => $programs,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url      = env('URL_SERVER_API');
        $response = Http::acceptJson()->put($url . '/offers/' . $id, $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar la oferta: ' . $response->status()])->withInput();
        }

        return redirect()->route('offers.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::acceptJson()->delete($url . '/offers/' . $id);

        return redirect()->route('offers.index');
    }
}
