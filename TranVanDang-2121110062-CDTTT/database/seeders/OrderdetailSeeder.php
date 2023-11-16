<?php

namespace Database\Seeders;

use App\Models\Orderdetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Orderdetail::create([
                'order_id' => $i,
                'product_id' =>$i,
                'price'=>200000,
                'qty'=>1,
                'amount'=>1,
                
            ]);
        }
    }
}
