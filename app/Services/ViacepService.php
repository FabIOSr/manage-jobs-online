<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViacepService {
    public function __construct(private string $zipcode) {
    }

    public function getLocation(): Mixed
    {
        $response = Http::get("http://viacep.com.br/ws/{$this->zipcode}/json/");

        return $response->json();
    }
}