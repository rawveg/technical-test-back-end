<?php

namespace Tests\Feature\Turbines;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GetTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->turbine();
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
        $this->get(sprintf('/api/turbines/%s', $this->farm()->id))
            ->assertJsonFragment($this->turbine()->toArray())
            ->assertStatus(200);
    }

}
