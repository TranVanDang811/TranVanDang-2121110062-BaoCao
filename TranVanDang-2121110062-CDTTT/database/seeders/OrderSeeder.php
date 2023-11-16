<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    private $faker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->faker=Faker::create();
        for ($i = 1; $i <= 10; $i++) {
        Order::create([
            'user_id' => 1,
            'name' => 'Don hang ' . $i,
            'email' => $this->faker->unique()->email,
            'phone' => 0111111111,
            'address' => 'sádasa23',
            'note' => 'sádsssasa23',

            
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => '1',
            'status' => '1'
        ]);
    }
}
}
