<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViacepService
{
    public $cep;
    public function __construct(string $cep)
    {
        $this->cep = $cep;
    }

    public function getLocation(): mixed
    {
        $response = Http::get("http://viacep.com.br/ws/{$this->cep}/json/");
     
        return $response->json();
    }
}