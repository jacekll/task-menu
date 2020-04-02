<?php
declare(strict_types=1);

namespace App\Repository;

use App\Menu;

class MenuRepository implements MenuRepositoryInterface
{
    public function store(Menu $menu): void
    {
        $menu->save();
    }

}
