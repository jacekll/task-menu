<?php
declare(strict_types=1);

namespace App\Repository;

use App\Menu;

interface MenuRepositoryInterface
{
    public function store(Menu $menu): void;
}
