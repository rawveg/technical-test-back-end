<?php

namespace Tests\Feature\Turbines;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GetTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->componentItem();
        $this->inspection();
    }

    /**
     * Verify that Route exists
     * @test
     */
    public function route_exists()
    {
        $this->get('/api/turbines')->assertStatus(200);
    }

    /**
     * Check table exists
     * @test
     */
    public function table_exists()
    {
        $this->assertTrue(Schema::hasTable('turbines'));
    }

    /**
     * Get Collection
     * @test
     */
    public function get_collection()
    {
        $this->get('/api/turbines')
            ->assertJsonFragment($this->turbine()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Resource
     * @test
     */
    public function get_resource()
    {
        $this->get(sprintf('/api/turbines/%s', $this->turbine()->id))
            ->assertJsonFragment($this->turbine()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Turbine Collection for Farm
     * @test
     */
    public function get_components_collection()
    {
        $this->get(
            sprintf('/api/turbines/%s/components', $this->turbine()->id)
        )
            ->assertJsonFragment($this->componentItem()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_turbine_resource()
    {
        $this->get(
            sprintf(
                '/api/turbines/%s/components/%s',
                $this->turbine()->id,
                $this->componentItem()->id
            )
        )
            ->assertJsonFragment($this->componentItem()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_inspections_collection()
    {
        $this->get(
            sprintf('/api/turbines/%s/inspections', $this->turbine()->id)
        )
            ->assertJsonFragment($this->inspection()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_inspection_resource()
    {
        $this->get(
            sprintf(
                '/api/turbines/%s/inspections/%s',
                $this->turbine()->id,
                $this->inspection()->id
            )
        )
            ->assertJsonFragment($this->inspection()->toArray())
            ->assertStatus(200);
    }
}
