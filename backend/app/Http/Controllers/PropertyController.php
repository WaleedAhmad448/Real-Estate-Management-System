<?php
// Author: Riham Muneer 
// Author: Saleh Sawalha 

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/properties",
     *     summary="Get a list of properties with pagination",
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             default=20,
     *             example=20,
     *             description="Number of items per page"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             example=1,
     *             description="The page number"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Property")
     *             ),
     *             @OA\Property(
     *                 property="page",
     *                 type="integer",
     *                 example=2
     *             ),
     *             @OA\Property(
     *                 property="per_page",
     *                 type="integer",
     *                 example=2
     *             ),
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 20);
        $properties = Property::with('photos')->paginate($perPage);
        return response()->json($properties);
    }

    /**
     * @OA\Post(
     *     path="/api/properties",
     *     summary="Create a new property",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="agent_id", type="integer"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="price", type="number"),
     *                 @OA\Property(property="location", type="string"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="type", type="string"),
     *                 @OA\Property(property="size", type="number"),
     *                 @OA\Property(property="date", type="string", format="date"),
     *                 @OA\Property(
     *                     property="photos[]",
     *                     type="array",
     *                     @OA\Items(type="string", format="binary")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Property created",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'agent_id' => 'required|exists:users,user_id',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'title' => 'required|string',
            'type' => 'required|string',
            'size' => 'required|numeric',
            'date' => 'required|date',
            'photos' => 'array',
            'photos.*' => 'nullable|mimes:jpg,jpeg,png|max:2048' 
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        //   Create propety
        $property = Property::create($request->all());
    
        // Handle file uploades
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property_photos', 'public');
                PropertyPhoto::create([
                    'property_id' => $property->property_id,
                    'photo_url' => $path,
                    'date' => now(),
                ]);
            }
        }
    
        return response()->json($property, 201);
    }
    

    /**
     * @OA\Get(
     *     path="/api/properties/{id}",
     *     summary="view property by id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Property not found",
     *     ),
     * )
     */
    public function show(string $id)
    {
        $property = Property::with('photos', 'agent')->find($id);
        if (!$property)
            return response()->json(['message' => 'Property not found'], 404);
        return response()->json($property);
    }


    /**
     * @OA\Put(
     *     path="/api/properties/{id}",
     *     summary="Update a property",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="agent_id", type="integer"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="price", type="number"),
     *                 @OA\Property(property="location", type="string"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="type", type="string"),
     *                 @OA\Property(property="size", type="number"),
     *                 @OA\Property(
     *                     property="photos[]",
     *                     type="array",
     *                     @OA\Items(type="string", format="binary")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Property updated",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Property not found",
     *     ),
     * )
     */
    public function update(Request $request, $id)
    {
        $property = Property::find($id);
        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }
    
        // Validation
        $validator = Validator::make($request->all(), [
            'agent_id' => 'exists:users,user_id',
            'description' => 'string',
            'price' => 'numeric',
            'location' => 'string',
            'title' => 'string',
            'type' => 'string',
            'size' => 'numeric',
            'photos' => 'array',
            'photos.*' => 'nullable|mimes:jpg,jpeg,png|max:2048'     ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        // Update property
        $property->update($request->all());
    
        // Handle file uploads
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property_photos', 'public');
                PropertyPhoto::create([
                    'property_id' => $property->property_id,
                    'photo_url' => $path,
                    'date' => now(),
                ]);
            }
        }
    
        return response()->json($property);
    }
 

    /**
     * @OA\Delete(
     *     path="/api/properties/{id}",
     *     summary="Delete a property",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Property deleted",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Property not found",
     *     ),
     * )
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }
    
    // to search and filter properties
    /**
     * @OA\Get(
     *     path="/api/properties/search",
     *     summary="Search and filter properties with pagination",
     *     @OA\Parameter(
     *         name="city_id",
     *         in="query",
     *         description="Filter by city ID",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="agent_id",
     *         in="query",
     *         description="Filter by agent ID",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="buildingType",
     *         in="query",
     *         description="Filter by building type",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="propertyType",
     *         in="query",
     *         description="Filter by property type",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="min_price",
     *         in="query",
     *         description="Minimum price filter",
     *         required=false,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *         name="max_price",
     *         in="query",
     *         description="Maximum price filter",
     *         required=false,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *         name="sort_by",
     *         in="query",
     *         description="Sort by field",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="sort_direction",
     *         in="query",
     *         description="Sort direction (asc or desc)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             default=20,
     *             example=2,
     *             description="Number of items per page"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             example=1,
     *             description="The page number"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Property")
     *             ),
     *             @OA\Property(
     *                 property="page",
     *                 type="integer",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="per_page",
     *                 type="integer",
     *                 example=20
     *             ),
     *         )
     *     )
     * )
     */
    public function searchAndFilter(Request $request)
    {
        $query = Property::query();

        if ($request->has('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->has('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }

        if ($request->has('buildingType')) {
            $query->where('buildingType', $request->buildingType);
        }

        if ($request->has('propertyType')) {
            $query->where('propertyType', $request->propertyType);
        }

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('sort_by') && $request->has('sort_direction')) {
            $query->orderBy($request->sort_by, $request->sort_direction);
        }

        $perPage = $request->query('per_page', 20);
        $properties = $query->paginate($perPage);
        return response()->json($properties);
    }
}

