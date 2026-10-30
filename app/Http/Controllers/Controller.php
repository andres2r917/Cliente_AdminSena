<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use App\Support\ApiRecord;

abstract class Controller
{
    /**
     * Consume an API endpoint and wrap JSON data into ApiRecord objects
     * accessible as both object properties ($item->name) and array keys ($item['name']).
     */
    protected function fetchDataFromApi($url)
    {
        try {
            $response = Http::acceptJson()->timeout(10)->get($url);
            if ($response->successful()) {
                return ApiRecord::wrap($response->json());
            }

            Log::warning("API Request to {$url} returned status: " . $response->status());
            return ApiRecord::wrap($response->json() ?? []);
        } catch (\Throwable $e) {
            Log::error("API Error at {$url}: " . $e->getMessage());
            return ApiRecord::wrap([]);
        }
    }

    /**
     * Envía una petición multipart/form-data a la API.
     * Adjunta correctamente tanto los campos de texto como los archivos.
     *
     * @param  string        $method      'POST' o 'PUT'
     * @param  string        $url         URL completa del endpoint
     * @param  array         $fields      Campos de texto (key => value)
     * @param  array         $files       Archivos (key => UploadedFile)
     * @return \Illuminate\Http\Client\Response
     */
    protected function multipartRequest(string $method, string $url, array $fields, array $files = [])
    {
        $http = Http::timeout(30)->asMultipart();

        // Adjuntar cada campo de texto como parte multipart individual
        foreach ($fields as $key => $value) {
            if ($value === null || $value === '') {
                continue;
            }
            $http = $http->attach($key, (string) $value);
        }

        // Adjuntar cada archivo
        foreach ($files as $key => $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                $http = $http->attach(
                    $key,
                    file_get_contents($file->getRealPath()),
                    $file->getClientOriginalName()
                );
            }
        }

        return $method === 'PUT'
            ? $http->put($url)
            : $http->post($url);
    }
}
