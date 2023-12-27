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
        $item->password = Hash::make('123');
        $item->address = 'Cam Lộ';
        $item->phone  = "0702339204";
        $item->gender ='Đông Hà';
        $item->group_id ='1';
        $item->save();

        
    }
}
