<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            array(
                [
                    'title' => 'Politics',
                    'alias' => 'politics',
                ],
                [
                    'title' => 'Analytics',
                    'alias' => 'analytics',
                ],
                [
                    'title' => 'Economics',
                    'alias' => 'economics',
                ],
                [
                    'title' => 'Games',
                    'alias' => 'games',
                ],
                [
                    'title' => 'IT',
                    'alias' => 'it',
                ],
                [
                    'title' => 'Rumours',
                    'alias' => 'rumours',
                ],
                [
                    'title' => 'Sports',
                    'alias' => 'sports',
                ],
            )
        );
    }
}
