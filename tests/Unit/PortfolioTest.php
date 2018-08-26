<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;
    
    public $portfolio;

    public function setUp()
    {
        parent::setUp();
        $this->portfolio = factory(\App\Portfolio::class)->create();
    }

    /** @test */
    public function it_has_a_title()
    {
        $this->assertNotNull($this->portfolio->title);
    }

    /** @test */
    public function it_has_a_slug()
    {
        $this->assertNotNull($this->portfolio->slug);
    }

    /** @test */
    public function it_has_a_body()
    {
        $this->assertNotNull($this->portfolio->body);
    }

    /** @test */
    public function it_has_a_status()
    {
        $this->assertNotNull($this->portfolio->status);
    }

    /** @test */
    public function it_has_a_publish_date()
    {
        $this->assertNotNull($this->portfolio->published_at);
    }

    /** @test */
    public function it_has_an_author()
    {
        $this->assertInstanceOf(\App\User::class, $this->portfolio->author);
    }

    /** @test */
    public function it_has_an_image()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->portfolio->images);
    }
}
