<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::create([
            'id' => 1,
            'product_id' => 1,
            'image_id' => 1,
        ]);

        ProductImage::create([
            'id' => 2,
            'product_id' => 2,
            'image_id' => 2,
        ]);

        ProductImage::create([
            'id' => 3,
            'product_id' => 3,
            'image_id' => 3,
        ]);
    }
}
