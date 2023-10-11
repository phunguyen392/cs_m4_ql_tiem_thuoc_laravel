<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new Customer();
        $customer->name = 'Phan Phong Phanh';
        $customer->address = '123 Nguyễn Trung';
        $customer->email = 'phongphanh@gmail.com';
        $customer->phone = '0987654321';
        $customer->password = bcrypt('123');
        $customer->save();



    }
}
