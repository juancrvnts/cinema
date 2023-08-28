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
    public function can_see_specified_benefit()
    {
        $benefit = factory(Benefit::class)->create();
        $related = factory(Benefit::class)->times(4)->create()->first();

        $this->get('/beneficios/'.$benefit->category->slug.'/'.$benefit->slug)
             ->assertViewIs('benefits.show')
             ->assertViewHas('related', function ($related) {
                 $this->assertCount(4, $related);

                 return true;
             })
             ->assertSee($benefit->title)
             ->assertSee($benefit->present()->excerpt)
             ->assertSee($benefit->present()->valid_to)
             ->assertSee($related->title)
             ->assertSee($related->present()->excerpt);
    }

    /** @test */
    public function only_published_benefits_are_displayed()
    {
        $published = factory(Benefit::class)->create();

        $unpublished = factory(Benefit::class)->create([
            'published_at' => Carbon::now()->addWeek(),
        ]);

        $this->get('/beneficios')
             ->assertSee($published->title)
             ->assertDontSee($unpublished->title);
    }

    /** @test */
    public function only_not_expired_benefits_are_displayed()
    {
        $benefit = factory(Benefit::class)->states('expired')->create();

        $this->get('/beneficios')
             ->assertDontSee($benefit->title);
    }
}
