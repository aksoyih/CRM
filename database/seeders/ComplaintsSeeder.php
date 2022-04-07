<?php

namespace Database\Seeders;

use App\Models\Complaints;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complaints::factory()
        ->count(50)
        ->create();
    }
}
