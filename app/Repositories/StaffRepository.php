<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Staff;

class StaffRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias;

    public function __construct(Staff $model)
    {
        $this->model = $model;
    }
}
