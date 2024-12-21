<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register a new user
     * @OA\Post (
     *     path="/api/register",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password_confirmation",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="role",
     *                          type="string",
     *                          enum={"agent", "client"}
     *                      ),
     *                 ),
     *                 example={
     *                     "name": "User Name",
     *                     "email": "user@example.com",
     *                     "password": "password123",
     *                     "password_confirmation": "password123",
     *                     "role": "client"
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="User registered successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="success"),
     *              @OA\Property(property="message", type="string", example="User registered successfully"),
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="id", type="number", example=1),
     *                  @OA\Property(property="name", type="string", example="User Name"),
     *                  @OA\Property(property="email", type="string", example="user@example.com"),
     *                  @OA\Property(property="role", type="string", example="client"),
     *                  @OA\Property(property="created_at", type="string", example="2024-08-19 10:00:00"),
     *                  @OA\Property(property="updated_at", type="string", example="2024-08-19 10:00:00")
     *              ),
     *          )
     *     ),
     *     @OA\Response(
     *          response=400,
     *          description="Validation errors",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="error"),
     *              @OA\Property(property="errors", type="object",
     *                  @OA\Property(property="name", type="array", @OA\Items(type="string", example="The name field is required.")),
     *                  @OA\Property(property="email", type="array", @OA\Items(type="string", example="The email field is required.")),
     *                  @OA\Property(property="password", type="array", @OA\Items(type="string", example="The password field is required.")),
     *                  @OA\Property(property="role", type="array", @OA\Items(type="string", example="The role field is required."))
     *              ),
     *          )
     *     )
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:agent,client',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'data' => $user,
        ], 201);
    }
}
