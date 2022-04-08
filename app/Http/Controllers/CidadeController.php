<?php

namespace App\Http\Controllers;

use App\Http\Controllers\dtos\responseDtoController;
use App\Models\Cities;
use App\Models\GasStations;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function getCities(Request $request)
    {
        $cidades = (new \App\Models\Cities)->getCities();
        $respondeDto = responseDtoController::citiesResponseDTO($cidades);
        return response()->json($respondeDto);
    }

    public function getAllGasStations(Request $request)
    {
        $city = new Cities();
        $data = $city->find($request->id);
        $respondeDto = responseDtoController::gasStationsResponseDTO($data);
        return response()->json($respondeDto);
    }

    public function setGasStation(Request $request)
    {
        $city = new Cities();
        $cityFound = $city->find($request->id);;
        if (!empty($request->gasStation)
            && !empty($request->gasStation['latitude'])
            && !empty($request->gasStation['longitude'])
            && !empty($request->gasStation['reservatorio']))
        {
            $gasStation = new GasStations();
            $gasStation->latitude = $request->gasStation['latitude'];
            $gasStation->longitude = $request->gasStation['longitude'];
            $gasStation->reservatorio = $request->gasStation['reservatorio'];
            $cityFound->gasStations()->save($gasStation);
            return response()->json(['message' => 'Gas Station added']);
        }else{
            return response()->json(['message' => 'Gas Station not added']);
        }
    }
    public function deleteGasStation(Request $request)
    {
        $gasStation = new GasStations();
        $gasStation->find($request->id)->delete();
        return response()->json(['message' => 'Gas Station deleted']);
    }

}
