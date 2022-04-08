<?php

namespace Tests\Models;
//factory
use App\Models\Cities;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitiesTest extends TestCase
{
    //use RefreshDatabase;
    public function testCreateCity()
    {
        $cities = Cities::factory()->create();
          $this->assertDatabaseHas('cities', [
            'nome_da_cidade' => $cities->nome_da_cidade,
            'latitude' => $cities->latitude,
            'longitude' => $cities->longitude,
        ]);
    }

    public function testUpdateCity()
    {
        $cities = Cities::factory()->create();
        $cities->nome_da_cidade = 'Cidade de Teste';
        $cities->latitude = '-23.564';
        $cities->longitude = '-46.664';
        $cities->save();
        $this->assertDatabaseHas('cities', [
            'nome_da_cidade' => $cities->nome_da_cidade,
            'latitude' => $cities->latitude,
            'longitude' => $cities->longitude,
        ]);
    }

    public function testDeleteCity()
    {
        $cities = Cities::factory()->create();
        $cities->delete();
        $this->assertDatabaseMissing('cities', [
            'nome_da_cidade' => $cities->nome_da_cidade,
            'latitude' => $cities->latitude,
            'longitude' => $cities->longitude,
        ]);
    }
}
