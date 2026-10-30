<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $url     = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/courses');

        return view('course.index', compact('courses'));
    }

    public function show($id)
    {
        $url    = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('course.show', [
            'course'  => $course,
            'courses' => $course,
        ]);
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $areas            = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training-centers');

        return view('course.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $url      = env('URL_SERVER_API');
        $response = Http::acceptJson()->post($url . '/courses', $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al guardar el curso: ' . $response->status()])->withInput();
        }

        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $course           = $this->fetchDataFromApi($url . '/courses/' . $id);
        $areas            = $this->fetchDataFromApi($url . '/areas');
        $training_centers = $this->fetchDataFromApi($url . '/training-centers');

        return view('course.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url      = env('URL_SERVER_API');
        $response = Http::acceptJson()->put($url . '/courses/' . $id, $request->all());

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }

        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Error al actualizar el curso: ' . $response->status()])->withInput();
        }

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/courses/' . $id);

        return redirect()->route('course.index');
    }
}
