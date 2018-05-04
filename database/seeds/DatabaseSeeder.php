<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      
        DB::table('users')->delete();
        App\User::create([
        	'id' => '1',
                'name' => 'root',
                'email' => 'root@gmail.com',
                'password' =>  Hash::make('123456'),
                'first_login' => false
                
        ]);
        DB::table('permissions')->delete();
        App\Permission::create([
        	'id' => '1',
                'name' => 'root',
                'description' => 'Reject article'
                
        ]);
        
        $this->call(ArticalTableSeeder::class);
 
    }
}
