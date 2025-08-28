<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Repository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 
     */
    public function test_home(): void
    {
        $repository = Repository::factory()->create();
        $this->get('/')
            ->assertStatus(200)
            ->assertSee($repository->url)
            ->assertSee($repository->name);
    }
}
