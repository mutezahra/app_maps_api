<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RouteController extends Controller
{
    public function calculateRoute(Request $request)
    {
        $logM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User getRoute'
        ]);
       

    
        $start = $request->input('start');
        $end = $request->input('end');
        $mode = $request->input('mode');

        $apiKey = '5b3ce3597851110001cf6248ae040d9a3dc84d2282928488cd554d93'; //api

        $startCoords = $this->getCoordinates($start);
        $endCoords = $this->getCoordinates($end);

        if ($startCoords && $endCoords) { //calculate
            $response = Http::get("https://api.openrouteservice.org/v2/directions/{$mode}", [
                'api_key' => $apiKey,
                'start' => "{$startCoords[1]},{$startCoords[0]}",
                'end' => "{$endCoords[1]},{$endCoords[0]}",
            ]);

            $data = $response->json();

            return view('home', [
                'start' => $start,
                'end' => $end,
                'mode' => $mode,
                'route' => $data,
                'startCoords' => $startCoords,
                'endCoords' => $endCoords
            ]);
        }


        

        return redirect()->back()->with('error', 'Unable to get coordinates for the provided addresses.');
    }

    private function getCoordinates($address)
    {
        $logM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User getCoordinates'
        ]);

        $response = Http::get('https://nominatim.openstreetmap.org/search', [ //accsess get cordinataes
            'format' => 'json',
            'q' => $address,
            'viewbox' => '107.5,-6.4,107.9,-6.8', // Bounding box for Subang region
            'bounded' => 1,
            'limit' => 1
        ]);

        $data = $response->json();
        if (!empty($data)) {
            return [floatval($data[0]['lat']), floatval($data[0]['lon'])];
        }

        return null;
    }

    public function getLocationSuggestions(Request $request)
    {
        $logM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User getLocation'
        ]);

        $query = $request->input('query'); //get input 

        $response = Http::get('https://nominatim.openstreetmap.org/search', [ //location
            'format' => 'json',
            'q' => $query,
            'viewbox' => '107.5,-6.4,107.9,-6.8', // Bounding box for Subang region
            'bounded' => 1,
            'limit' => 5
        ]);

        return response()->json($response->json()); //menu
    }
}
