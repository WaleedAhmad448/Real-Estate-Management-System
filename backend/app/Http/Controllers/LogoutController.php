<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
 /**
 * Logout
 * @OA\Post (
 *     path="/api/logout",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *
 *                 ),
 *                 example={}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *              @OA\Property(property="meta", type="object",
 *                  @OA\Property(property="code", type="number", example=200),
 *                  @OA\Property(property="status", type="string", example="success"),
 *                  @OA\Property(property="message", type="string", example="Successfully logged out"),
 *              ),
 *              @OA\Property(property="data", type="object", example={}),
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Invalid token",
 *          @OA\JsonContent(
 *              @OA\Property(property="meta", type="object",
 *                  @OA\Property(property="code", type="number", example=422),
 *                  @OA\Property(property="status", type="string", example="error"),
 *                  @OA\Property(property="message", type="string", example="Unauthenticated."),
 *              ),
 *              @OA\Property(property="data", type="object", example={}),
 *          )
 *      ),
 *      security={
 *         {"token": {}}
 *     }
 * )
 */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'Logout successful',
            ],
            'data' => [],
        ], 200);
    }
}
