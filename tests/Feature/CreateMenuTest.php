<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMenuTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateMenu()
    {
        $response = $this->json('POST', '/api/menus', ['field' => 'value']);

        $response
            ->assertStatus(201)
            ->assertJson(
                [
                    'field' => 'value',
                ]
            );
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
