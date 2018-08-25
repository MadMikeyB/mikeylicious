<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostImagesTest extends TestCase
{
    use RefreshDatabase;
    
    public $postImage;

    public function setUp()
    {
        parent::setUp();
        $this->postImage = factory(\App\PostImage::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertNotNull($this->postImage->path);
    }

    /** @test */
    public function it_has_an_author()
    {
        $this->assertInstanceOf(\App\User::class, $this->postImage->author);
    }

    /** @test */
    public function it_has_a_post()
    {
        $this->assertInstanceOf(\App\Post::class, $this->postImage->post);
    }
}
