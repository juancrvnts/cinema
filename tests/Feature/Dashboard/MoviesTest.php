<?php

namespace Tests\Feature\Dashboard;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_the_movies_index()
    {
        $this->get('/dashboard/movies')
            ->assertOk()
            ->assertSee('Movies list');
    }

    /** @test */
    public function it_can_store_a_movie()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        $this->actingAs($user)
            ->post('/dashboard/movies/', $movie->getAttributes())
            ->assertOk();

        $this->assertDatabaseHas('movies', ['title' => $movie->title]);
    }
}
