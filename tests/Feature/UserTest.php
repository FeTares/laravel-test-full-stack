<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test User List for Admin
     *
     * @return void
     */
    public function testUserList()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->getJson('/api/user');

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => true,
            ]);
    }

    /**
     * Store user
     *
     * @return void
     */
    public function testStoreUser()
    {
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt(123456), // password
        ];

        $response = $this->actingAs($user, 'api')
            ->postJson('/api/user', $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }

    /**
     * Store user validation errors
     *
     * @return void
     */
    public function testStoreUserValidationError()
    {
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->actingAs($user, 'api')
            ->postJson('/api/user', $data);

        $response->assertStatus(422);
    }

    /**
     * Update user
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'phone' => $this->faker->e164PhoneNumber,
        ];

        $response = $this->actingAs($user, 'api')
            ->putJson('/api/user/' . $user->id, $data);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }

    /**
     * Store user validation errors
     *
     * @return void
     */
    public function testUpdateUserValidationError()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->putJson('/api/user/' . $user->id, ['email' => 'Invalid@email com']);

        $response->assertStatus(422);
    }


    /**
     * Delete User
     *
     * @return void
     */
    public function testDeleteUser()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->deleteJson('/api/user/' . $user->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }
}
