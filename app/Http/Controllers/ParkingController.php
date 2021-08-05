<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
//        Parking::paginate(10);
        $parkingSpots = Parking::paginate(4);//;Parking::all(['id','price']);
        return response()->json($parkingSpots);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
        ]);


        $parkingSpot = Parking::create($request->post());

        return response()->json([
            'message'=>'Parking Spot Created Successfully!!',
            'parkingSpot'=> $parkingSpot
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Parking $parking)
    {
        return response()->json($parking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Parking $parking
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Parking $parking)
    {
        $parking->fill($request->post())->save();
        return response()->json([
            'message' => 'Parking Spot Updated Successfully!!',
            'category' => $parking
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Parking $parking
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Parking $parking)
    {
        $parking->delete();
        return response()->json([
            'message'=>'Category Deleted Successfully!!'
        ]);
    }
}
