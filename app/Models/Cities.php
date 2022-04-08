<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['nome_da_cidade', 'latitude', 'longitude'];
    private $nome_da_cidade;
    private $latitude;
    private $longitude;

    public function gasStations()
    {
        return $this->hasMany('App\Models\GasStations', 'cidade_id', 'id');
    }

    public function create($data)
    {
        $cities = new Cities();
        $cities->nome_da_cidade = $data['nome_da_cidade'];
        $cities->latitude = $data['latitude'];
        $cities->longitude = $data['longitude'];
        $cities->save();
    }

    public function getCities()
    {
        return Cities::all();
    }

    public function update(array $attributes = [], array $options = [])
    {
        $cities = Cities::find($attributes['id']);
        $cities->nome_da_cidade = $attributes['nome_da_cidade'];
        $cities->latitude = $attributes['latitude'];
        $cities->longitude = $attributes['longitude'];
        $cities->save();
    }

    public function deleteCities($id)
    {
        $cities = Cities::find($id);
        $cities->delete();
    }

    public function saveGasStation($data)
    {
        $city = Cities::find($data['id']);
        $city->gasStations()->create($data);
    }
}
