<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Staff extends Model 
{
    use HasSlug, HasMedias;

    protected $fillable = [
        'published',
        'title',
        'position',
        'email',
        'department'
    ];
    
    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [
        'profile_image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 1, // Forces a perfect square for profile pics
                ],
            ],
        ],
    ];
    
}
