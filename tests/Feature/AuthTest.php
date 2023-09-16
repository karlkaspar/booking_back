<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{

    public function testRegister()
    {
        $response = $this->post('/api/auth/register', [
            'name' => 'Mati',
            'email' => 'mati@mail.com',
            'password' => 'Limonaad123',
            'password_confirmation' => 'Limonaad123'
        ]);
        $response->assertStatus(201);
    }

    public function testLogin()
    {
        $response = $this->post('/api/auth/login', [
            'email' => 'mati@mail.com',
            'password' => 'Limonaad123',
        ]);
        $response->assertStatus(200);
    }
}
