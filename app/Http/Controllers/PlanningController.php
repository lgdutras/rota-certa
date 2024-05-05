<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlanningRequest;
use App\Models\TravelPlan;

class PlanningController extends Controller
{
    public function setLocale(PlanningRequest $request, TravelPlan $travelPlan) {

    /*
        TO-DO Save planning data on session using cookies
        I need to set the project to use cookies instead database and to initiate session on API route

        $request->session()->put('city', $request->city);
        $request->session()->put('state', $request->state);
    */
        return response()->json(['message' => 'Travel Planning initiated to ' . $request->city . ' at ' . $request->state, 200]);
    }
}