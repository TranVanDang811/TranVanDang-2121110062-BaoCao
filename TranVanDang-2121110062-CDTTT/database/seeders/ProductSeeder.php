<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id' =>  $i,
                'brand_id' => $i,
                'name' => 'san pham'.$i,
                'slug' => 'san-pham'.$i,
                'price' => '1000'.$i,
                'price_sale' => '100'.$i,
                'image' => 'hinhanh.jpg',
                'qty' => 1,
                'detail' => 'sss',
                'metakey' => 'key word',
                'metadesc' => 'mô tả',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => '1',
                'status' => '1'
            ]);
        }
    }
}
