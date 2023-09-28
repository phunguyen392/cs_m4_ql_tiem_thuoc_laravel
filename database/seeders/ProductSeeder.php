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
        $pro = new Product();
        $pro->product_name = 'huda';
        $pro->category_id = 1;
        $pro->quantity = 100;
        $pro->price = 15000;
        $pro->image = 'huda.jpg';
        $pro->status = 1;
        $pro->save();

        $pro = new Product();
        $pro->product_name = 'mì xào hải sản';
        $pro->category_id = 2;
        $pro->quantity = 100;
        $pro->price = 75000;
        $pro->image = 'mixao.jpg';
        $pro->status = 1;
        $pro->save();

        $pro = new Product();
        $pro->product_name = 'Cá sấu lội bùn';
        $pro->category_id = 3;
        $pro->quantity = 100;
        $pro->price = 30000;
        $pro->image = 'muop.jpg';
        $pro->status = 1;
        $pro->save();

        $pro = new Product();
        $pro->product_name = 'Vũ nữ chân dài';
        $pro->category_id = 3;
        $pro->quantity = 100;
        $pro->price = 75000;
        $pro->image = 'nhai.jpg';
        $pro->status = 1;
        $pro->save();

        $pro = new Product();
        $pro->product_name = 'Táo quân lội vạc dầu';
        $pro->category_id = 3;
        $pro->quantity = 100;
        $pro->price = 150000;
        $pro->image = 'cachep.jpg';
        $pro->status = 1;
        $pro->save();
    }
}
