<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasStations extends Model
{
    use HasFactory;
    protected $table = 'gas_station';
    protected $fillable = ['cidade_id', 'latitude', 'longitude', 'reservatorio'];
    public function cities()
    {
        return $this->belongsTo('App\Models\Cities');
    }

}
