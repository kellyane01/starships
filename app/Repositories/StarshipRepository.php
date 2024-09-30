<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class StarshipRepository
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://localhost:3000/spaceships';
    }

    public function getAll()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    public function create(array $data)
    {
        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function find($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function update($id, array $data)
    {
        $response = Http::put("{$this->baseUrl}/{$id}", $data);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function delete($id)
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return true;
        }

        return false;
    }
}
