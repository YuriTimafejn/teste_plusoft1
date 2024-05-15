<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlagBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flags = ['Lido', 'Lendo', 'Quero ler', 'Abandonado', 'Relendo'];

        // Loop through each flag and insert into the database
        foreach ($flags as $flag) {
            DB::table('flag_books')->insert([
                'flag' => $flag,
            ]);
        }
    }
}
