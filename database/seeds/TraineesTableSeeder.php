<?php

use Illuminate\Database\Seeder;

class TraineesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->assignRole('trainee');
        });
    }
}