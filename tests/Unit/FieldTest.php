<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FieldTest extends TestCase
{
use RefreshDatabase;
    
    public $field;

    public function setUp()
    {
        parent::setUp();
        $this->field = factory(\App\Field::class)->create();
    }

    /** @test */
    public function it_has_a_title()
    {
        $this->assertNotNull($this->field->title);
    }

    /** @test */
    public function it_has_a_description()
    {
        $this->assertNotNull($this->field->body);
    }

    /** @test */
    public function it_is_associated_with_a_page()
    {
        $this->assertInstanceOf(\App\Page::class, $this->field->page);
    }
}
