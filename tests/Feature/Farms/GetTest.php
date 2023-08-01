<?php

namespace Tests\Feature\Farms;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GetTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->farm();
        $this->turbine();
    }

    /**
     * Verify that Route exists
     * @test
     */
    public function route_exists()
    {
        $this->get('/api/farms')->assertStatus(200);
    }

    /**
     * Check table exists
     * @test
     */
    public function table_exists()
    {
        $this->assertTrue(Schema::hasTable('farms'));
    }

    /**
     * Get Collection
     * @test
     */
    public function get_collection()
    {
        $this->get('/api/farms')
            ->assertJsonFragment($this->farm()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Resource
     * @test
     */
    public function get_resource()
    {
        $this->get(sprintf('/api/farms/%s', $this->farm()->id))
            ->assertJsonFragment($this->farm()->toArray())
            ->assertStatus(200);
    }

    /**
     * Get Turbine Collection for Farm
     * @test
     */
    public function get_turbine_collection()
    {
        $this->get(
            sprintf('/api/farms/%s/turbines', $this->farm()->id)
        )
            ->assertJsonFragment($this->turbine()->toArray())
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_turbine_resource()
    {
        $this->get(
            sprintf('/api/farms/%s/turbines/%s', $this->farm()->id, $this->turbine()->id)
        )
            ->assertJsonFragment($this->turbine()->toArray())
            ->assertStatus(200);
    }

}
