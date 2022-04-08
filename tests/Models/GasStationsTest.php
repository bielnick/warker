<?php

namespace Tests\Models;
//factory
use App\Models\Cities;
use App\Models\GasStations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GasStationsTest extends TestCase
{
    public function testCreateGasStation()
    {
        $cities = Cities::factory()->create();
        $gasStations = GasStations::factory()->create(['cidade_id' => $cities->id]);
        $this->assertEquals($gasStations->cidade_id, $cities->id);
    }

    public function testUpdateGasStation()
    {
        $cities = Cities::factory()->create();
        $gasStations = GasStations::factory()->create(['cidade_id' => $cities->id]);
        $gasStations->reservatorio = 50.00;
        $gasStations->update();
        $this->assertEquals($gasStations->reservatorio, 50.00);
    }

    public function testDeleteGasStation()
    {
        $cities = Cities::factory()->create();
        $gasStations = GasStations::factory()->create(['cidade_id' => $cities->id]);
        $gasStations->delete();
        $this->assertNull(GasStations::find($gasStations->id));
    }
}
