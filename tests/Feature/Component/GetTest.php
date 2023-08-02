<?php

namespace Tests\Feature\Component;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GetTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->componentItem();
        $this->grade();
    }

    /**
     * Verify that Route exists
     * @test
     */
    public function route_exists()
    {
        $this->get('/api/components')->assertStatus(200);
    }

    /**
     * Check table exists
     * @test
     */
    public function table_exists()
    {
        $this->assertTrue(Schema::hasTable('components'));
    }

    /**
     * Get Collection
     * @test
     */
    public function get_collection()
    {
        $this->get('/api/components')
            ->assertJsonFragment($this->componentItem()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Resource
     * @test
     */
    public function get_resource()
    {
        $this->get(sprintf('/api/components/%s', $this->farm()->id))
            ->assertJsonFragment($this->componentItem()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_grades_collection()
    {
        $this->get(
            sprintf('/api/components/%s/grades', $this->componentItem()->id)
        )
            ->assertJsonFragment($this->grade()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_grade_resource()
    {
        $this->get(
            sprintf(
                '/api/components/%s/grades/%s',
                $this->componentItem()->id,
                $this->grade()->id
            )
        )
            ->assertJsonFragment($this->grade()->toArray())
            ->assertStatus(200);
    }
}
