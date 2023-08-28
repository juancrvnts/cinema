<?php

namespace Tests\Unit\Models;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function movies_has_fillable_attributes()
    {
        $movie = new Movie();

        $this->assertEquals([
            'title',
            'director',
            'duration',
            'clasification',
            'exhibited_from',
            'exhibited_until',
        ], $movie->getFillable());
    }
}
