<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->truncate();
        App\User::create([
            'id' => '1',
                'name' => 'root',
                'email' => 'root@gmail.com',
                'password' =>  Hash::make('123456'),
                'first_login' => false,
                'created_at' => Carbon::now()
        ]);
    }
    
}
