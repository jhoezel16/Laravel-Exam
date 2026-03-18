<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class JokeController extends Controller
{
    public function index():View
    {
        $token = auth()->user()->createToken('web-token')->plainTextToken;
        return view("index", ["token"=>$token]);
        
    }
}