<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
           $table->string('title', 200)->nullable(); // Activity Name
            $table->string('category')->nullable(); // Sports, Club, Arts
            $table->text('schedule_info')->nullable(); // "Every Friday at 4 PM"
                });

        Schema::create('activity_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'activity');
        });

        
    }

    public function down()
    {
        
        Schema::dropIfExists('activity_slugs');
        Schema::dropIfExists('activities');
    }
};
