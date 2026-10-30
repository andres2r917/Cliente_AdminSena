<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $url      = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $url      = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teacher.show', [
            'teachers' => $teachers,
            'teacher'  => $teachers,
        ]);
    }

    public function create()
    {
        $url              = env('URL_SERVER_API');
        $areas            = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training-centers');

        return view('teacher.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $url      = env('URL_SERVER_API');
        $response = Http::acceptJson()->post($url . '/teachers', $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar el instructor: ' . $response->status()])->withInput();
        }

        return redirect()->route('teacher.index');
    }

    public function edit($id)
    {
        $url              = env('URL_SERVER_API');
        $teachers         = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $areas            = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training-centers');

        return view('teacher.edit', [
            'teachers'         => $teachers,
            'teacher'          => $teachers,
            'areas'            => $areas,
            'training_centers' => $training_centers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $url      = env('URL_SERVER_API');
        $response = Http::acceptJson()->put($url . '/teachers/' . $id, $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar el instructor: ' . $response->status()])->withInput();
        }

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::acceptJson()->delete($url . '/teachers/' . $id);

        return redirect()->route('teacher.index');
    }
}
