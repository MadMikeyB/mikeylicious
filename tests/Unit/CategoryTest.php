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
        $this->category = factory(\App\Category::class)->create();
    }

    /** @test */
    public function it_can_tell_you_about_its_posts()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->category->posts);
    }
}
