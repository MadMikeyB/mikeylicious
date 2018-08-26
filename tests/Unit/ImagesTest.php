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
    public function it_has_a_type()
    {
        $this->assertNotNull($this->image->model_type);
    }

    /** @test */
    public function it_has_an_author()
    {
        $this->assertNotNull($this->image->user_id);
        $this->assertInstanceOf(\App\User::class, $this->image->author);
    }

    /** @test */
    public function it_has_a_post()
    {
        $this->assertNotNull($this->image->model_id);
        $this->assertInstanceOf(\App\Post::class, $this->image->model);
    }
}
