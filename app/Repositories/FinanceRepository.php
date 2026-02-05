<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Finance;

class FinanceRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias;

    public function __construct(Finance $model)
    {
        $this->model = $model;
    }
}
