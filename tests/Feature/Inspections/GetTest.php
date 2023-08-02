<?php

namespace Tests\Feature\Inspections;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GetTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->inspection();
        $this->grade();
    }

    /**
     * Verify that Route exists
     * @test
     */
    public function route_exists()
    {
        $this->get('/api/inspections')->assertStatus(200);
    }

    /**
     * Check table exists
     * @test
     */
    public function table_exists()
    {
        $this->assertTrue(Schema::hasTable('inspections'));
    }

    /**
     * Get Collection
     * @test
     */
    public function get_collection()
    {
        $this->get('/api/inspections')
            ->assertJsonFragment($this->inspection()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Resource
     * @test
     */
    public function get_resource()
    {
        $this->get(sprintf('/api/inspections/%s', $this->inspection()->id))
            ->assertJsonFragment($this->inspection()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_grades_collection()
    {
        $this->get(
            sprintf('/api/inspections/%s/grades', $this->inspection()->id)
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
                '/api/inspections/%s/grades/%s',
                $this->inspection()->id,
                $this->grade()->id
            )
        )
            ->assertJsonFragment($this->grade()->toArray())
            ->assertStatus(200);
    }
}
