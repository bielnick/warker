<?php

namespace App\Http\Controllers\dtos;

class responseDtoController
{
    static function citiesResponseDTO($data)
    {

        $response = [];
        for($i = 0; $i < count($data); $i++)
        {
            $response[$i] = [
                'Cidade' => $data[$i]->nome_da_cidade,
                'Latitude' => $data[$i]->latitude,
                'Longitude' => $data[$i]->longitude,
            ];
        }
        return $response;
    }

    public static function gasStationsResponseDTO($data)
    {
        $cidade = [];
        $cidade['ID'] = $data->id;
        $cidade['Cidade'] = $data->nome_da_cidade;
        $cidade['Latitude'] = $data->latitude;
        $cidade['Longitude'] = $data->longitude;

        $gasStations = $data->gasStations;
        for($i = 0; $i < count($gasStations); $i++)
        {
            $cidade['postos'][$i] = [
                'ID' => $gasStations[$i]->id,
                'Reservatorio' => $gasStations[$i]->reservatorio."%",
                'Cordenadas' => [
                    'Latitude' => $gasStations[$i]->latitude,
                    'Longitude' => $gasStations[$i]->longitude,
                ],
            ];
        }
        return $cidade;
    }
    public static function gasStationResponseDTO($data)
    {
        $gasStation = [];
        $gasStation['ID'] = $data->id;
        $gasStation['Reservatorio'] = $data->reservatorio."%";
        $gasStation['Cordenadas'] = [
            'Latitude' => $data->latitude,
            'Longitude' => $data->longitude,
        ];
        return $gasStation;
    }
}

