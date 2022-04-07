<?php

namespace Database\Seeders;

use App\Models\Updates;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Updates::factory()
            ->count(100)
            ->create();
    }
}
