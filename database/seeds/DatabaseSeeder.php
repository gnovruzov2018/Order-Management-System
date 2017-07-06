<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('products')->insert([
            'product_name' => 'Queso Cabrales',
            'supplier_id' => '5',
            'category_id' => '4',
            'unit' => '1 kg pkg.',
            'price' => '21',
//            'country' => 'Australia',
//            'phone' => '(03) 444-2343'
        ]);
    }
}
