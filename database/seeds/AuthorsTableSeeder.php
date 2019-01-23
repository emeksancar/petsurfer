<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'first_name' => 'Lev',
            'last_name' => 'Tolstoy',
            'country' => 'Rusya'
        ]);

        Author::create([
            'first_name' => 'Fyodor',
            'last_name' => 'Dostoyevski',
            'country' => 'Rusya'
        ]);

        Author::create([
            'first_name' => 'Friedrich',
            'last_name' => 'Nietzsche',
            'country' => 'Almanya'
        ]);
    }
}
