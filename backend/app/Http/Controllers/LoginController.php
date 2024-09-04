<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  /**
 * Login
 * @OA\Post (
 *     path="/api/login",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                      type="object",
 *                      @OA\Property(
 *                          property="email",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="password",
 *                          type="string"
 *                      )
 *                 ),
 *                 example={
 *                     "email":"user@test.com",
 *                     "password":"useruser1"
 *                }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Valid credentials",
 *          @OA\JsonContent(
 *              @OA\Property(property="meta", type="object",
 *                  @OA\Property(property="code", type="number", example=200),
 *                  @OA\Property(property="status", type="string", example="success"),
 *                  @OA\Property(property="message", type="string", example=null),
 *              ),
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="user", type="object",
 *                      @OA\Property(property="id", type="number", example=2),
 *                      @OA\Property(property="name", type="string", example="User"),
 *                      @OA\Property(property="email", type="string", example="user@test.com"),
 *                      @OA\Property(property="email_verified_at", type="string", example=null),
 *                      @OA\Property(property="updated_at", type="string", example="2022-06-28 06:06:17"),
 *                      @OA\Property(property="created_at", type="string", example="2022-06-28 06:06:17"),
 *                  ),
 *                  @OA\Property(property="access_token", type="object",
 *                      @OA\Property(property="token", type="string", example="randomtokenasfhajskfhajf398rureuuhfdshk"),
 *                      @OA\Property(property="type", type="string", example="Bearer"),
 *                      @OA\Property(property="expires_in", type="number", example=3600),
 *                  ),
 *              ),
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Invalid credentials",
 *          @OA\JsonContent(
 *              @OA\Property(property="meta", type="object",
 *                  @OA\Property(property="code", type="number", example=401),
 *                  @OA\Property(property="status", type="string", example="error"),
 *                  @OA\Property(property="message", type="string", example="Incorrect username or password!"),
 *              ),
 *              @OA\Property(property="data", type="object", example={}),
 *          )
 *      )
 * )
 */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'Validation failed',
                ],
                'data' => $validator->errors(),
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'meta' => [
                    'code' => 401,
                    'status' => 'error',
                    'message' => 'Invalid email or password',
                ],
                'data' => [],
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'Login successful',
            ],
            'data' => [
                'user' => $user,
                'access_token' => [
                    'token' => $token,
                    'type' => 'Bearer',
                    'expires_in' => 3600, 
                ],
            ],
        ], 200);
    }
}
