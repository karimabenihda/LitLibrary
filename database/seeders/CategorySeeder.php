<?php

namespace Database\Seeders;

use App\Models\Livre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
Livre::factory()->count(10)->create();
    }
}
