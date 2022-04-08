<?php

namespace App\Http\Controllers;

use App\Http\Controllers\dtos\responseDtoController;
use App\Models\GasStations;
use Illuminate\Http\Request;

class gasStationsController extends Controller
{
    public function editGasStation(Request $request)
    {
        if (!empty($request->id)) {
            $gasStation = GasStations::find($request->id);
            !empty($request->gasStation['latitude']) ? $gasStation->latitude = $request->gasStation['latitude'] : '';
            !empty($request->gasStation['longitude']) ? $gasStation->longitude = $request->gasStation['longitude'] : '';
            !empty($request->gasStation['reservatorio']) ? $gasStation->reservatorio = $request->gasStation['reservatorio'] : '';
            $gasStation->save();

            return response()->json(['message' => 'Gas Station updated']);
        }else{
            return response()->json(['message' => 'Gas Station not found']);
        }
    }

    public function getGasStationById(Request $request)
    {
        if (!empty($request->id)) {
            $gasStation = GasStations::where('id', $request->id)->first();

            if (!$gasStation) {
                return response()->json(['message' => 'Gas Station not found']);
            }

            $respondeDto = responseDtoController::gasStationResponseDTO($gasStation);
            return response()->json($respondeDto);
        } else {
            return response()->json(['message' => 'Gas Station not found']);
        }
    }
    public function deleteGasStation(Request $request)
    {
        if (!empty($request->id)) {
            $gasStation = GasStations::where('id', $request->id)->first();
            $gasStation->delete();
            return response()->json(['message' => 'Gas Station deleted']);
        } else {
            return response()->json(['message' => 'Gas Station not found']);
        }
    }
}
