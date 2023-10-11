<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Group;
use App\Models\GroupRole;
use App\Models\User;
use Illuminate\Support\Facades\DB;




// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    $this->call(RoleSeeder::class);
    $this->call(GroupSeeder::class);
    $this->call(GroupRoleSeeder::class);
    // $this->call(UserSeeder::class);

    $this->importGroups();
        $this->importRoles();
        $this->importRole();
        $this->importGroupRole();


    }
    public function importRoles()
    {
        $groups = ['Category', 'User','Product','Group'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','viewtrash'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,
                ]);
            }
        }
    }
    public function importRole()
    {
        $groups = ['Customer', 'Order'];
        $actions = ['viewAny', 'view'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,
                ]);
            }
        }
    }
    public function importGroupRole()
    {
        for ($i = 1; $i <= 36; $i++) {
            DB::table('grouprole')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importGroups()
    {
        $userGroup = new Group();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();
        $userGroup = new Group();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();
        $userGroup = new Group();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();
        $userGroup = new Group();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }
}
