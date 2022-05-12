<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewMovieTest extends TestCase
{
    /** @test */
    public function the_main_page_show_correct_info()
    {

        // Http::fake();

        $response = $this->get('/', [MoviesController::class, 'index']);
        $response->assertSuccessful();
        $response->assertSee('Popular Movie');
    }

}
