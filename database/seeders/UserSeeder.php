<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new User();
        $item->name = "Trần Trân Trọng";
        $item->email = "trantrong@gmail.com";
        $item->password = Hash::make('123456789');
        $item->address = 'Cam Lộ';
        $item->phone  = "0702339204";
        $item->gender ='Đông Hà';
        $item->group_id ='1';
        $item->save();

        $item = new User();
        $item->name = "Phan Phá Phách";
        $item->email = "phaphach@gmail.com";
        $item->password = Hash::make('123456789');
        $item->address = 'Hải Lăng';
        $item->phone  = "0702339205";
        $item->gender ='Nam';
        $item->group_id ='1';
        $item->save();

        $item = new User();
        $item->name = "Lý Luồn Lách";
        $item->email = "luonlach@gmail.com";
        $item->password = Hash::make('123456789');
        $item->address = 'Gio Linh';
        $item->phone  = "0702339206";
        $item->gender ='Nam';
        $item->group_id ='1';
        $item->save();

        $item = new User();
        $item->name = "Nguyễn Nghi Ngút";
        $item->email = "nghingut@gmail.com";
        $item->password = Hash::make('123');
        $item->address = 'Vĩnh Linh';
        $item->phone  = "0702339204";
        $item->gender ='Nữ';
        $item->group_id ='1';
        $item->save();
    }
}
