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
        $colors = ['success', 'primary', 'warning', 'danger', 'info'];

        // Loop through each flag and insert into the database
        for($i=0; $i<count($flags); $i++) {
            DB::table('flag_books')->insert([
                'flag' => $flags[$i],
                'color' =>$colors[$i],
            ]);
        }
    }
}
