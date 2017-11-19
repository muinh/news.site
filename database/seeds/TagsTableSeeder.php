<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            array(
                [
                    'title' => 'tag1',
                    'alias' => 'tag1',
                ],
                [
                    'title' => 'tag2',
                    'alias' => 'tag2',
                ],
                [
                    'title' => 'tag3',
                    'alias' => 'tag3',
                ],
                [
                    'title' => 'tag4',
                    'alias' => 'tag4',
                ],
                [
                    'title' => 'tag5',
                    'alias' => 'tag5',
                ],
                [
                    'title' => 'tag6',
                    'alias' => 'tag6',
                ],
                [
                    'title' => 'tag7',
                    'alias' => 'tag7',
                ],
                [
                    'title' => 'tag8',
                    'alias' => 'tag8',
                ],
                [
                    'title' => 'tag9',
                    'alias' => 'tag9',
                ],
                [
                    'title' => 'tag10',
                    'alias' => 'tag10',
                ],
                [
                    'title' => 'tag11',
                    'alias' => 'tag11',
                ],
                [
                    'title' => 'tag12',
                    'alias' => 'tag12',
                ],
                [
                    'title' => 'tag13',
                    'alias' => 'tag13',
                ],
                [
                    'title' => 'tag14',
                    'alias' => 'tag14',
                ],
                [
                    'title' => 'tag15',
                    'alias' => 'tag15',
                ],
                [
                    'title' => 'tag16',
                    'alias' => 'tag16',
                ],
                [
                    'title' => 'tag17',
                    'alias' => 'tag17',
                ],
                [
                    'title' => 'tag18',
                    'alias' => 'tag18',
                ],
                [
                    'title' => 'tag19',
                    'alias' => 'tag19',
                ],
                [
                    'title' => 'tag20',
                    'alias' => 'tag20',
                ],
            )
        );
    }
}
