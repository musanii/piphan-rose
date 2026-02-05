<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Activity extends Model 
{
    use HasBlocks, HasSlug, HasMedias;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
    public $slugAttributes = [
        'title',
    ];
    
}
