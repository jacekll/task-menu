<?php
declare(strict_types=1);

namespace Tests;

use Illuminate\Support\Facades\Artisan;

trait UsesMigrations
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
