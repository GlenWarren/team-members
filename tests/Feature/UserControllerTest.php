<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user1 = new User([
            'name' => 'Garfield',
            'email' => 'garfield@gmail.com',
            'image_url' => 'garfield_image_1.com'
        ]);
        $this->user1->save();
        $this->user2 = new User([
            'name' => 'Felix',
            'email' => 'felix@gmail.com',
            'image_url' => 'felix_image_1.com'
        ]);
        $this->user2->save();
    }

    public function test_index(): void
    {
        $response = $this->getJson('api/users');

        $response->assertStatus(200);

        $this->arrayHasKey('users', $response);
        $this->assertEquals([
            $this->user1->toArray(),
            $this->user2->toArray(),
        ], $response['users']);
    }

    public function test_show(): void
    {
        $response = $this->get('api/users/' . $this->user1->id);

        $response->assertStatus(200);

        $this->arrayHasKey('user', $response);
        $this->assertEquals($this->user1->toArray(), $response['user']);
    }

    public function test_store(): void
    {
        $data = [
            'name' => 'Henri',
            'email' => 'le_chat_noir@gmail.com',
            'image_url' => 'le_chat_noir_image_1.com'
        ];
        $response = $this->post('api/users', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', $data);
        $this->arrayHasKey('user', $response);
        $this->assertEquals($data['name'], $response['user']['name']);
        $this->assertEquals($data['email'], $response['user']['email']);
        $this->assertEquals($data['image_url'], $response['user']['image_url']);
    }

    public function test_update(): void
    {
        $data = [
            'name' => 'Cheshire',
            'email' => 'cheshire@gmail.com',
            'image_url' => 'cheshire_image_1.com'
        ];
        $response = $this->put('api/users/' . $this->user1->id, $data);

        $response->assertStatus(200);

        $this->user1->refresh();

        $this->assertDatabaseHas('users', $data);
        $this->arrayHasKey('user', $response);
        $this->assertEquals($this->user1->toArray(), $response['user']);
    }

    public function test_destroy(): void
    {
        $response = $this->delete('api/users/' . $this->user2->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', $this->user2->toArray());
        $this->arrayHasKey('user', $response);
        $this->assertEquals(null, $response['user']);
    }
}
