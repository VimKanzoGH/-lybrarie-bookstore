<?php

use App\Entities\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'Fath ePareto'
            ],
            [
                'name' => 'Albert Ninyeh'
            ]
        ];

        foreach ($authors as $author) {
            Author::create([
                'name' => $author['name']
            ]);
        }
    }
}
