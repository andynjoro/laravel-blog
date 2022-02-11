<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_post_screen()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts/create');

        $response->assertStatus(200);
    }

    public function test_create_post()
    {
        $data = [
            'title' => "Test Title 1000",
            'description' => "Test Description",
        ];

        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->post('/posts', $data);

        $response->assertSessionHas('status', 'Post successfully created! Create another post or click on dashboard to view your posts.');

        $response->assertStatus(302);
    }

    public function test_import_posts()
    {
        $importURL = config('services.posts_import_url');

        Http::fake([
            $importURL => Http::response([
                'data' => 
                [
                    [
                        'title' => 'test title',
                        'description' => 'test description',
                        'publication_date' => '2022-02-10 14:08:18'
                    ]
                ],
            ], 200)
        ]);

        $user = User::factory()->create([
            'name' => 'admin',
        ]);

        $this->artisan('posts:import')
            ->assertExitCode(0);

    }
}
