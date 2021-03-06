<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;
    
    public $page;

    public function setUp()
    {
        parent::setUp();
        $this->page = factory(\App\Models\Page::class)->create(['published_at' => now()->toDateTimeString()]);
    }

    /** @test */
    public function it_has_a_title()
    {
        $this->assertNotNull($this->page->title);
    }

    /** @test */
    public function it_has_a_slug()
    {
        $this->assertNotNull($this->page->slug);
    }

    /** @test */
    public function it_has_a_body()
    {
        $this->assertNotNull($this->page->body);
    }

    /** @test */
    public function it_has_a_status()
    {
        $this->assertNotNull($this->page->active);
    }

    /** @test */
    public function it_has_a_publish_date()
    {
        $this->assertNotNull($this->page->published_at);
    }

    /** @test */
    public function it_has_an_author()
    {
        $this->assertInstanceOf(\App\Models\User::class, $this->page->author);
    }

    /** @test */
    public function it_has_an_image()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->page->images);
    }

    /** @test */
    public function it_has_many_fields()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->page->fields);
    }
}
