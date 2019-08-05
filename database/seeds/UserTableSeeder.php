<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $user = new User;
        $user->name = 'Shyam sundar bhattarai';
        $user->email = 'user@example.com';
        $user->password = bcrypt('sambht3609');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Sundar Bhattarai';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('sambht3609');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
