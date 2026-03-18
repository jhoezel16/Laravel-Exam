<?php
namespace Tests\Stubs;

use App\Services\AuthenticationService;

class AuthenticationServiceStub extends AuthenticationService
{
    public function authenticate($credentials,$request):array
    {
        return [
            'success' => true,
            'user' => (object) ['id' => 1, 'email' => 'test@example.com'],
        ];
    }
}