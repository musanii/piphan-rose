<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Activity;

class ActivityRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias;

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }
}
