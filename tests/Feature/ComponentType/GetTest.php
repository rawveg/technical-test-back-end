<?php

namespace Tests\Feature\ComponentType;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GetTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->componentType();
    }

    /**
     * Verify that Route exists
     * @test
     */
    public function route_exists()
    {
        $this->get('/api/component-types')->assertStatus(200);
    }

    /**
     * Check table exists
     * @test
     */
    public function table_exists()
    {
        $this->assertTrue(Schema::hasTable('component_types'));
    }

    /**
     * Get Collection
     * @test
     */
    public function get_collection()
    {
        $this->get('/api/component-types')
            ->assertJsonFragment($this->componentType()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Resource
     * @test
     */
    public function get_resource()
    {
        $this->get(sprintf('/api/component-types/%s', $this->componentType()->id))
            ->assertJsonFragment($this->componentType()->toArray())
            ->assertStatus(200);
    }
}
