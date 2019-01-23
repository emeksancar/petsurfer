<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Savas ve Baris',
            'author' => 1,
            'category' => 1,
            'isbn' => "978020137962"
        ]);

        Book::create([
            'name' => 'Kumarbaz',
            'author' => 2,
            'category' => 1,
            'isbn' => "2902151001203"
        ]);

        Book::create([
            'name' => 'Iyinin ve Kotunun Otesinde',
            'author' => 3,
            'category' => 2,
            'isbn' => "9786055201241"
        ]);
    }
}
