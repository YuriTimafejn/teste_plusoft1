<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'O Pequeno Príncipe',
                'author' => 'Antoine de Saint-Exupéry',
                'note' => 'Um clássico da literatura mundial.',
                'flag_id' => 1,
            ],
            [
                'title' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'note' => 'Uma obra-prima da literatura brasileira.',
                'flag_id' => 3,
            ],
            [
                'title' => 'A Metamorfose',
                'author' => 'Franz Kafka',
                'note' => 'Uma história surreal e intrigante.',
                'flag_id' => 2,
            ],
            [
                'title' => 'Memórias Póstumas de Brás Cubas',
                'author' => 'Machado de Assis',
                'note' => 'Um livro essencial para entender a literatura brasileira.',
                'flag_id' => 4,
            ],
            [
                'title' => 'Cem Anos de Solidão',
                'author' => 'Gabriel García Márquez',
                'note' => 'Um épico que marcou gerações.',
                'flag_id' => 5,
            ],
        ];

        // Insert sample book data into the database
        foreach ($books as $book) {
            DB::table('books')->insert($book);
        }
    }
}
