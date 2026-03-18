<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;
use App\Services\JokeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function loginForm():View
    {
        return view("login");
    }
    public function authenticate(AuthenticationService $authService,Request $request):RedirectResponse
    {
       
        $credentials = $request->validate([
            'password' => 'required'
        ]);
       $authenticate = $authService->authenticate($credentials, $request);
       if ($authenticate["success"]) {
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'password' => 'Invalid Password',
        ]);
    }
    public function logout(AuthenticationService $authService,Request $request):RedirectResponse
    {
        $authService->logout($request);
        return redirect('/login');
    }
}