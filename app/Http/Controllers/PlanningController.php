<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlanningRequest;
use App\Models\TravelPlan;
use Illuminate\Support\Facades\Http;

class PlanningController extends Controller
{
    public function setLocale(PlanningRequest $request, TravelPlan $travelPlan) {

        $options = [];

        foreach ($request->interests as $interest) {

            $headers = [
                'Content-Type' => 'application/json',
                'X-Goog-Api-Key' => 'AIzaSyDB-JTCWp9RKG78YTYNJhIOGrdVddsW3P0',
                'X-Goog-FieldMask' => 'places.id,places.displayName,places.formattedAddress,places.priceLevel,places.currentOpeningHours,places.currentSecondaryOpeningHours,places.regularOpeningHours,places.regularSecondaryOpeningHours'
            ];
            
            $url = 'https://places.googleapis.com/v1/places:searchText';
            $query = 'interests in city/state';
            $response = Http::withHeaders($headers)->post($url, ['textQuery' => strtr($query, ['interest' => $interest,
                                                                                                'city' => $request->city,
                                                                                                'state' => $request->state])]);
            $option = [$response->body()][0];
            $option = json_decode($option, true)['places'][0];

            $options = array_merge($options, $option);
        };

        return $options;
    }
}