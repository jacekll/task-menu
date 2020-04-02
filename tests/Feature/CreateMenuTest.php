<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\UsesMigrations;

class CreateMenuTest extends TestCase
{
    use UsesMigrations;

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

    /**
     * @depends testCreateMenu
     */
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

    private function getCreateMenuResponse(): \Illuminate\Foundation\Testing\TestResponse
    {
        return $this->json('POST', '/api/menus', ['field' => 'value']);
    }
}
