<?php

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisements')->insert(
            array(
                [
                    'title' => 'iPhone Plus',
                    'price' => '1000',
                    'company' => 'Apple Corp.',
                    'website' => 'www.apple.com',
                    'leftside' => '0',
                ],
                [
                    'title' => 'Laptop',
                    'price' => '700',
                    'company' => 'Rozetka.UA',
                    'website' => 'www.rozetka.ua',
                    'leftside' => '1',
                ],
                [
                    'title' => 'Motorcycle',
                    'price' => '59000',
                    'company' => 'Yamaha',
                    'website' => 'www.yamaha.com',
                    'leftside' => '1',
                ],
                [
                    'title' => 'Hyundai Accent',
                    'price' => '12000',
                    'company' => 'Hyundai Motor Company',
                    'website' => 'www.hyundai.com',
                    'leftside' => '0',
                ],
                [
                    'title' => 'Lumia',
                    'price' => '600',
                    'company' => 'Microsoft Inc.',
                    'website' => 'www.microsoft.com',
                    'leftside' => '1',
                ],
                [
                    'title' => 'Apples',
                    'price' => '20',
                    'company' => 'AGRO ECO',
                    'website' => 'www.agro-eco.com.ua',
                    'leftside' => '0',
                ],
                [
                    'title' => 'Electric skateboard',
                    'price' => '2000',
                    'company' => 'Xiaomi',
                    'website' => 'www.xiaomi.com',
                    'leftside' => '1',
                ],
                [
                    'title' => 'Meizu M3 Note',
                    'price' => '300',
                    'company' => 'Meizu China Company',
                    'website' => 'www.meizu.com',
                    'leftside' => '0',
                ]
            )
        );
    }
}
