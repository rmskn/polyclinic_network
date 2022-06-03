<?php

namespace Tests\Feature;

use App\DataAccess\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class APITokenControllerTest extends TestCase
{
    public function testCreateToken()
    {
        $response = $this->post(
            '/api/sanctum/token',
            ['email' => 'user1@mail.com', 'password' => 'password', 'device_name' => 'Iphone 12']
        )->assertStatus(200);

        $response1 = $this->post(
            '/api/sanctum/token',
            ['email' => 'user111@mail.com', 'password' => 'password', 'device_name' => 'Iphone 12']
        )->assertStatus(400);

        $userId = DB::table('users')->select('id')->where('email', 'user1@mail.com')->first();

        $user = User::query()->select('*')->where('email', 'user1@mail.com')->first();
        $token = $user->tokens()->first();

        $response->assertSeeText($userId->id . '|' . $token->token);

    }
}
