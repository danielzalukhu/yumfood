<?php

use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'name' => 'FuyungHai',
            'price' => '28000',
            'tag_id' => '1',
        ]);

        DB::table('foods')->insert([
            'name' => 'Bibimbap',
            'price' => '50000',
            'tag_id' => '3',
        ]);

        DB::table('foods')->insert([
            'name' => 'Nasi Goreng',
            'price' => '10000',
            'tag_id' => '4',
        ]);

        DB::table('foods')->insert([
            'name' => 'Nasi Padang',
            'price' => '12000',
            'tag_id' => '4',
        ]);
    }
}
