<?php

namespace Tests\Feature\Dashboard;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_the_movies_index()
    {
        $this->withoutExceptionHandling();

        $this->get('/dashboard/movies')
            ->assertOk()
            ->assertSee('Movies list');
    }
}
