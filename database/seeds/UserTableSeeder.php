<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        $fake=\Faker\Factory::create();
        $password=\Illuminate\Support\Facades\Hash::make('toptal');
        User::create([
            'name'=>'Adminstrator',
            'email'=>'admin@test.com',
            'password'=>$password,
        ]);
        for ($i=0;$i<10;$i++){
            User::create([
                'name'=>$fake->name,
                'email'=>$fake->email,
                'password'=>$password,
            ]);
        }
    }
}
