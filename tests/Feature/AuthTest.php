<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     *Test Auth Login
     * @return void
     */
    public function testAuthLogin()
    {
        $response = $this->post('/api/auth/login',
            [
                'email' => 'test@user.com',
                'password' => 'password'
            ]
        );
        $response->assertStatus(200);
    }
     /**
     * feature auth me
     * @return void
     */
    public function testApiAuthMe()
    {
        $token = auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => 'bearer '.$token,
        ])->post('/api/auth/me');
        $response->assertStatus(200);
    }

    /**
     * feature refresh token
     * @return void
     */
    public function testApiAuthRefresh()
    {
        $token = auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => 'bearer '.$token,
        ])->post('/api/auth/refresh');
        $response->assertStatus(200);
    }

    /**
     * feature auth logout
     * @return void
     */
    public function testApiAuthLogout()
    {
        $token = auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => 'bearer '.$token,
        ])->post('/api/auth/logout');
        $response->assertStatus(200);
    }
}
