<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');

        $cohorts = $this->fetchDataFromApi($url . '/cohorts');

        return view('cohorts.index', compact('cohorts'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $cohorts = $this->fetchDataFromApi($url . '/cohorts/' . $id);

        return view('cohorts.show', [
            'cohorts' => $cohorts,
            'cohort'  => $cohorts,
        ]);
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $offer = $this->fetchDataFromApi($url . '/offers');

        return view('cohorts.create', [
            'offer'  => $offer,
            'offers' => $offer,
        ]);
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        $response = Http::acceptJson()->post($url . '/cohorts', $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        return redirect()->route('cohorts.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $cohorts = $this->fetchDataFromApi($url . '/cohorts/' . $id);
        $offer   = $this->fetchDataFromApi($url . '/offers');

        return view('cohorts.edit', [
            'cohorts' => $cohorts,
            'cohort'  => $cohorts,
            'offer'   => $offer,
            'offers'  => $offer,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        $response = Http::acceptJson()->put($url . '/cohorts/' . $id, $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        return redirect()->route('cohorts.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/cohorts/' . $id);

        return redirect()->route('cohorts.index');
    }
}
