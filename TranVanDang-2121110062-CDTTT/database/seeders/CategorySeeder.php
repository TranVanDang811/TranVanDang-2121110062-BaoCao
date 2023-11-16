<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'name' => 'Danh muc ' . $i,
                'slug' => 'danh-muc-' . $i,
                'image' => 'hinhanh.jpg',
                'parent_id' => 0,
                'sort_order' => 0,
                'level'=>1,
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
