<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testRequireEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                             'email'    => ['The email filed is required.'],
                             'password' => ['The password field is required.']
                         ]
            );
    }

    public function testUserLoginSuccessfunlly()
    {
        $user = factory(User::class)->create([
                                                 'email'    => 'test@laravelacademy.org',
                                                 'password' => bcrypt('test123'),
                                             ]
        );
        $payload = ['email' => 'test@laravelacademy.org', 'password' => 'test123'];
        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                                      'data' => [
                                          'id',
                                          'name',
                                          'email',
                                          'created_at',
                                          'updated_at',
                                          'api_token'
                                      ]
                                  ]
            );
    }
}
