<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Finance extends Model 
{
    use HasSlug, HasMedias;

    protected $fillable = [
        'published',
        'title',
        'student_id',
        'amount',
        'type',
        'total_due',
        'amount_paid'
    ];
    
    public $slugAttributes = [
        'title',
    ];

    public function student() {
    return $this->belongsTo(Student::class);
}
    
}
