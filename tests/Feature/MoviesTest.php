<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_general_movies_index()
    {
        $movie = Movie::factory()->create();

        $this->get('/')
            ->assertOk()
            ->assertViewIs('movies.index')
            ->assertSee($movie->title);
    }

    /** @test */
    public function can_see_specified_movie()
    {
        $movie = Movie::factory()->create();
        $anotherMovie = Movie::factory()->create();

        $this->get('/{$movie->title}')
            ->assertOk()
            ->assertViewIs('movies.show')
            ->assertSee($movie->title)
            ->assertSee($movie->director)
            ->assertSee($movie->duration)
            ->assertSee($movie->exhibited_until);
    }
}
