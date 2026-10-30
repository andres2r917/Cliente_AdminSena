<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $apprentices = $this->fetchDataFromApi($url . '/apprentices');

        return view('Aprendice.index', compact('apprentices'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $apprentices = $this->fetchDataFromApi($url . '/apprentices/' . $id);

        return view('Aprendice.show', [
            'apprentices' => $apprentices,
            'apprentice'  => $apprentices,
        ]);
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $courses   = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('Aprendice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        $response = Http::acceptJson()->post($url . '/apprentices', $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        return redirect()->route('apprentice.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $courses     = $this->fetchDataFromApi($url . '/courses');
        $computers   = $this->fetchDataFromApi($url . '/computers');
        $apprentices = $this->fetchDataFromApi($url . '/apprentices/' . $id);

        return view('Aprendice.edit', [
            'apprentices' => $apprentices,
            'apprentice'  => $apprentices,
            'courses'     => $courses,
            'computers'   => $computers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        $response = Http::acceptJson()->put($url . '/apprentices/' . $id, $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        return redirect()->route('apprentice.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/apprentices/' . $id);

        return redirect()->route('apprentice.index');
    }
}
