<?php
namespace Tests\Stubs;

use App\Services\AuthenticationService;

class FailedAutheServiceStub extends AuthenticationService
{
    public function authenticate($credentials,$request):array
    {
        return [
            'success' => false,
        ];
    }
}