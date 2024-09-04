<?php

namespace App\Http\Controllers;
/**
 * @OA\Info(
 *     title="Real Estate Management API",
 *     version="1.0.0",
 *     description="API for managing properties in the Real Estate Management System"
 * )
 * @OA\Schema(
 *     schema="Property",
 *     type="object",
 *     description="Property Model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="agent_id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Beautiful Villa"),
 *     @OA\Property(property="description", type="string", example="A beautiful villa with 5 bedrooms and a pool."),
 *     @OA\Property(property="city_id", type="integer", example=1),
 *     @OA\Property(property="location", type="string", example="Downtown"),
 *     @OA\Property(property="size", type="integer", example=2500),
 *     @OA\Property(property="buildingType", type="string", example="Residential"),
 *     @OA\Property(property="propertyType", type="string", example="Villa"),
 *     @OA\Property(property="price", type="number", format="float", example=500000.00),
 * )
 */

abstract class Controller
{

}
