<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private $faker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->faker=Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'khach hang ' . $i,
                'email' => $this->faker->unique()->email,
                'phone' => 0214241123,
                'username' => 'khach hang ' . $i,
                'password' => Hash::make('dang123'),
                'address'=>'hgagg',
                'image' => 'hinhanh.jpg',
                'roles'=>'ss',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => '1',
                'status' => '1'
            ]);
        }
    }
}
