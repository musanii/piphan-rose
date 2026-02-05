<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Student extends Model 
{
    use HasBlocks, HasSlug, HasMedias;

    protected $fillable = [
        'published',
        'title',
        'registration_type',
        'grade_level',
        'performance_summary'
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

public function finances()
    {
        return $this->hasMany(Finance::class);
    }
    
}
