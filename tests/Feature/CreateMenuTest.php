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
        $createMenuResponse = $this->getCreateMenuResponse();
        $createMenuResponse
            ->assertStatus(201)
            ->assertJson(
                [
                    'field' => 'value',
                ]
            );
    }

    public function testGetMenu()
    {
        $createMenuResponse = $this->getCreateMenuResponse();

        $menuId = $createMenuResponse->json('id');
        $getMenuResponse = $this->json('GET', "/api/menus/{$menuId}");

        $getMenuResponse
            ->assertStatus(200)
            ->assertJson(
            [
                'id'    => $menuId,
                'field' => 'value',
            ]
        );
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    private function getCreateMenuResponse(): \Illuminate\Foundation\Testing\TestResponse
    {
        return $this->json('POST', '/api/menus', ['field' => 'value']);
    }
}
