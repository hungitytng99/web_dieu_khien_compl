<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
 
		'username' => 'admin',
		 
		'password' => Hash::make('11091999'),
		 
		'email'=>'admin11091999@gmail.com'
		 
		]);
    }
}
