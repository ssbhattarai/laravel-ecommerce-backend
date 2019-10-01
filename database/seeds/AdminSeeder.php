<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Admin;
        $user->name = 'Hy fuck you';
        $user->email = 'fuck@example.com';
        $user->password = bcrypt('sambht3609');
        $user->save();
        // $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
