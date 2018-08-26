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
        $this->page = factory(\App\Page::class)->create();
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
    public function it_has_an_author()
    {
        $this->assertInstanceOf(\App\User::class, $this->page->author);
    }

    /** @test */
    public function it_has_an_image()
    {
        $this->assertInstanceOf(\App\PageImage::class, $this->page->image);
    }
}
