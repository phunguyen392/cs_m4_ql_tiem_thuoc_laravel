<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = new Category();
        $cate->category_name = 'Bia';
        $cate->description = 'Các loại bia đa dạng';
        $cate->save();

        $cate = new Category();
        $cate->category_name = 'Đồ ăn';
        $cate->description = 'Món nào cũng tuyệt, cũng ngon';
        $cate->save();

        $cate = new Category();
        $cate->category_name = 'Tráng miệng';
        $cate->description = 'Đôg ngọt và các món tráng miệng';
        $cate->save();

        $cate = new Category();
        $cate->category_name = 'Đặc sản địa phương';
        $cate->description = 'Toàn các món nổi tiếng';
        $cate->save();

        $cate = new Category();
        $cate->category_name = 'Hải sản';
        $cate->description = 'khỏi phải bàn về độ tươi ngon';
        $cate->save();
    }
}
