<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\HomepageRepository;
use App\Models\Homepage;

class HomepageSeeder extends Seeder
{
    /**
     * Create the database record for this singleton module.
     *
     * @return void
     */
    public function run()
    {
        if (Homepage::count() > 0) {
            return;
        }

        app(HomepageRepository::class)->create([
            'title' => [
                'en' => 'Homepage',
                // add other languages here
            ],
            'description' => [
                'en' => '',
                // add other languages here
            ],
            'published' => false,
        ]);
    }
}
