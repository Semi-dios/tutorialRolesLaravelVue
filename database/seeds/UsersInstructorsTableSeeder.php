<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersInstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {


        $user1 = User::create([
            'name' => 'admin',
            'email' => 'nemo@gmail.com',
            'password' => bcrypt('123456')
        ]);



        $user1->assignRole('admin');

        $user = User::create([
            'name' => 'Instructor 1',
            'email' => 'in1@gmail.com',
            'password' => bcrypt('123456')
        ]);


        $user->assignRole('instructor');
    }
}
