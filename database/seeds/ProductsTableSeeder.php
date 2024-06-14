<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Cannabis Premium',
                'product_stock' => 22,
                'product_category' => 'Drugs',
                'product_price' => 200000,
                'product_image' => 'public/storage/Cannabis_Indica_01.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Ecstasy Pills',
                'product_stock' => 100,
                'product_category' => 'Drugs',
                'product_price' => 150000,
                'product_image' => 'public/storage/Ecstasy_Pills.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Cocaine Pure',
                'product_stock' => 50,
                'product_category' => 'Drugs',
                'product_price' => 500000,
                'product_image' => 'public/storage/Cocaine_Pure.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'LSD Tabs',
                'product_stock' => 200,
                'product_category' => 'Drugs',
                'product_price' => 250000,
                'product_image' => 'public/storage/LSD_Tabs.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Magic Mushrooms',
                'product_stock' => 80,
                'product_category' => 'Drugs',
                'product_price' => 180000,
                'product_image' => 'public/storage/Magic_Mushrooms.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Stolen Credit Cards',
                'product_stock' => null,
                'product_category' => 'Fraud',
                'product_price' => 100000,
                'product_image' => 'public/storage/Stolen_Credit_Cards.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Fake Passports',
                'product_stock' => 40,
                'product_category' => 'Documents',
                'product_price' => 750000,
                'product_image' => 'public/storage/Fake_Passports.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Hacking Tools',
                'product_stock' => null,
                'product_category' => 'Software',
                'product_price' => 300000,
                'product_image' => 'public/storage/Hacking_Tools.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Bitcoin Tumbling Service',
                'product_stock' => null,
                'product_category' => 'Services',
                'product_price' => 120000,
                'product_image' => 'public/storage/Bitcoin_Tumbling.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Anonymous VPN',
                'product_stock' => 300,
                'product_category' => 'Services',
                'product_price' => 50000,
                'product_image' => 'public/storage/Anonymous_VPN.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_name' => 'Counterfeit Money',
                'product_stock' => 60,
                'product_category' => 'Fraud',
                'product_price' => 400000,
                'product_image' => 'public/storage/Counterfeit_Money.jpg',
                'listing_date' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
