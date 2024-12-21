<?php

namespace App\Http\Controllers;
// Author: Riham Muneer 

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/cities",
     *     summary="Get all cities",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     )
     * )
     */
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    /**
     * @OA\Post(
     *     path="/api/cities",
     *     summary="Create a new city",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Ramallah"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="City created successfully!",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The name has already been taken.")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:cities,name',
        ]);
        $city = City::create([
            'name' => $request->input('name'),
        ]);
        return response()->json([
            'message' => 'City created successfully!',
            'city' => $city,
        ], 201);
    }

    public function show(string $id)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/cities/{id}",
     *     summary="Update an existing city",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Nablus")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="City updated successfully!",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="City not found",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The name has already been taken.")
     *         )
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $city = City::find($id);
        if(!$city)
            return response()->json(['message' => 'City not found'], 404);

        $request->validate([
            'name' => 'required|string|max:255|unique:cities,name,'.$city->id,
        ]);
        $city->update([
            'name' => $request->input('name'),
        ]);
        return response()->json([
            'message' => 'City updated successfully!',
            'city' => $city,
        ], 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/cities/{id}",
     *     summary="Delete a city",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="City deleted successfully!",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="City not found",
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        if (!$city) 
            return response()->json(['message' => 'City not found'], 404);

        $city->delete();
        return response()->json([
            'message' => 'City deleted successfully!',
        ], 200);
    }
}
