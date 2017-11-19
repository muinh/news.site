<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(
            array(
                [
                    'id' => 1,
                    'article_id' => 2,
                    'user_id' => 1,
                    'parent_id' => 0,
                    'rate' => 0,
                    'content' => 'I like your article'
                ],
                [
                    'id' => 2,
                    'article_id' => 2,
                    'user_id' => 2,
                    'parent_id' => 1,
                    'rate' => 0,
                    'content' => 'Thank you!!!'
                ],
                [
                    'id' => 3,
                    'article_id' => 2,
                    'user_id' => 1,
                    'parent_id' => 1,
                    'rate' => 0,
                    'content' => 'YWC',
                ],
                [
                    'id' => 4,
                    'article_id' => 2,
                    'user_id' => 3,
                    'parent_id' => 0,
                    'rate' => 0,
                    'content' => 'Nice web-resource, how can i get access to read full analytics?',
                ],
            )
        );
    }
}
