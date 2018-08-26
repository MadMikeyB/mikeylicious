<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public $post;

    public function setUp()
    {
        parent::setUp();
        $this->post = factory(\App\Post::class)->create();
    }

    /** @test */
    public function it_has_a_title()
    {
        $this->assertNotNull($this->post->title);
    }

    /** @test */
    public function it_has_a_slug()
    {
        $this->assertNotNull($this->post->slug);
    }

    /** @test */
    public function it_has_a_body()
    {
        $this->assertNotNull($this->post->body);
    }

    /** @test */
    public function it_has_a_status()
    {
        $this->assertNotNull($this->post->status);
    }

    /** @test */
    public function it_has_a_publish_date()
    {
        $this->assertNotNull($this->post->published_at);
    }


    /** @test */
    public function it_has_an_author()
    {
        $this->assertInstanceOf(\App\User::class, $this->post->author);
    }

    /** @test */
    public function it_has_an_associated_image_collection()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->post->images);
    }

    /** @test */
    public function it_has_an_associated_category()
    {
        $this->assertInstanceOf(\App\Category::class, $this->post->category);
    }
}
