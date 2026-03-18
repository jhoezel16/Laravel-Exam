<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\AuthenticationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Stubs\AuthenticationServiceStub;
use Tests\Stubs\FailedAutheServiceStub;
use Tests\Stubs\JokeServiceStub;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_success_login():void
    {
        $this->instance(\App\Services\AuthenticationService::class, new AuthenticationServiceStub());
        $response = $this->withSession(['_token' => csrf_token()])
                     ->post('/login', [
                         'email' => 'test@example.com',
                         'password' => 'password123',
                         '_token' => csrf_token(),
                     ]);
        $response->assertRedirect('/');
    }

    public function test_failed_login():void
    {
       $this->instance(\App\Services\AuthenticationService::class, new FailedAutheServiceStub());
        $response = $this->withSession(['_token' => csrf_token()])
                     ->post('/login', [
                         'email' => 'test@example.com',
                         'password' => 'password123',
                         '_token' => csrf_token(),
                     ]);

        $response->assertSessionHasErrors('password');
    }
    public function test_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('logout');

        $response->assertRedirect('login');
        $this->assertGuest();
    }
    
    public function test_api_with_token(): void
    {
         $this->instance(\App\Services\JokeService::class, new JokeServiceStub());
        $user = User::factory()->create();

        $token = $user->createToken('test-token')->plainTextToken;
        $this->withoutExceptionHandling();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get('api/joke');

        $response->assertStatus(200);
        $response->assertJsonStructure([]);
    }

}
