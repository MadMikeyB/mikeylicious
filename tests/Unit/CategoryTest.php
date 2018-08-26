<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    
    public $category;

    public function setUp()
    {
        parent::setUp();
        $this->category = factory(\App\Models\Category::class)->create();
    }

    /** @test */
    public function it_has_a_title()
    {
        $this->assertNotNull($this->category->title);
    }

    /** @test */
    public function it_has_a_slug()
    {
        $this->assertNotNull($this->category->slug);
    }

    /** @test */
    public function it_has_a_description()
    {
        $this->assertNotNull($this->category->description);
    }

    /** @test */
    public function it_can_tell_you_about_its_posts()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->category->posts);
    }
}
