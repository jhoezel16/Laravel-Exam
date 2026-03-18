<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\JokeService;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\JsonResponse;

class JokeController extends Controller
{
    public function index(JokeService $jService):JsonResponse
    {
        $jokes = $jService->getRandomJokes();
        return response()->json($jokes, $jokes["status"]);
    } 
}