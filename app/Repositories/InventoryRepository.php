<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Inventory;

class InventoryRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias;

    public function __construct(Inventory $model)
    {
        $this->model = $model;
    }
}
