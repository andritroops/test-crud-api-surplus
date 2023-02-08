<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 1,
            'name' => 'Product name 1',
            'enable' => true,
            'description' => 'Product description 1'
        ]);

        Product::create([
            'id' => 2,
            'name' => 'Product name 2',
            'enable' => true,
            'description' => 'Product description 2'
        ]);

        Product::create([
            'id' => 3,
            'name' => 'Product name 3',
            'enable' => true,
            'description' => 'Product description 3'
        ]);
    }
}
