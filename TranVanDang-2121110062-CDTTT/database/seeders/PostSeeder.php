<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'topic_id' => $i,
                'title' => 'sssss',
                'slug' => 'bai-viet-' . $i,
                'detail' => 'ss',
                'image' => 'hinhanh.jpg',
                'type'=>'dichvu',
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
