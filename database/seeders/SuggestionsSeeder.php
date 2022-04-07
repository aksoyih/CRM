<?php

namespace Database\Seeders;

use App\Models\Suggestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuggestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suggestions::factory()
            ->count(50)
            ->create();
    }
}
