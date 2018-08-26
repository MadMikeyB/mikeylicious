<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanViewPostsTest extends TestCase
{
    use RefreshDatabase;
    
    public $post;

    public function setUp()
    {
        parent::setUp();
        $this->post = factory(\App\Models\Post::class)->create();
    }

    /** @test */
    public function a_user_can_view_a_post()
    {
        $this->withoutExceptionHandling();
        $this->get(route('posts.show', $this->post))
                    ->assertSee($this->post->title)
                    ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_listing_of_posts()
    {
        $this->withoutExceptionHandling();
        $this->get(route('posts.index'))
                    // ->assertSee($this->post->title)
                    ->assertStatus(200);
    }
}
