<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(
            array(
                [
                    'title' => 'Menu 1',
                    'url' => '#',
                    'parentId' => 0
                ],
                [
                    'title' => 'Menu 2',
                    'url' => '#',
                    'parentId' => 0
                ],
                [
                    'title' => 'Menu 3',
                    'url' => '#',
                    'parentId' => 0
                ],
                [
                    'title' => 'Menu 4',
                    'url' => '#',
                    'parentId' => 3
                ],
                [
                    'title' => 'Menu 5',
                    'url' => '#',
                    'parentId' => 3
                ],
                [
                    'title' => 'Menu 6',
                    'url' => '#',
                    'parentId' => 5
                ],
            )
        );
    }
}
