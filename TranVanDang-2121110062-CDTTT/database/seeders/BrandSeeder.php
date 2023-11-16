<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Brand::create([
                'name' => 'Thuong hieu ' . $i,
                'slug' => 'thuong-hieu-' . $i,
                'image' => 'hinhanh.jpg',
                'sort_order' => 0,
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
