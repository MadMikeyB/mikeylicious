<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImagesTest extends TestCase
{
    use RefreshDatabase;
    
    public $image;

    public function setUp()
    {
        parent::setUp();
        $this->image = factory(\App\Image::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertNotNull($this->image->path);
    }

    /** @test */
    public function it_has_an_author()
    {
        $this->assertInstanceOf(\App\User::class, $this->image->author);
    }

    /** @test */
    // public function it_has_a_post()
    // {
    //     $this->assertInstanceOf(\App\Post::class, $this->image->post);
    // }
}
