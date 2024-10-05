<?php

namespace Database\Seeders;

use App\Models\Practica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PracticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Practica::factory()->count(2)->create();
    }
}
