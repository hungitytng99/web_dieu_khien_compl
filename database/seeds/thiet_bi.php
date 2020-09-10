<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class thiet_bi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();

        DB::table('thiet_bi')->insert([
 
		'name' => 'Jetson-Nano-2nd',
		 
		'ip_address' => '192.168.3.113',
		 
		'port'=>'7113',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/nano2nd_on.sh',

		'scriptOff'=>'/home/power/nano2nd_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio25/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);

		DB::table('thiet_bi')->insert([
 
		'name' => 'Jetson-Nano',
		 
		'ip_address' => '192.168.3.111',
		 
		'port'=>'7111',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/nano_on.sh',

		'scriptOff'=>'/home/power/nano_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio17/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);

		DB::table('thiet_bi')->insert([
 
		'name' => 'PI-Coral',
		 
		'ip_address' => '192.168.3.206',
		 
		'port'=>'2206',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/picoral_on.sh',

		'scriptOff'=>'/home/power/picoral_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio27/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);

		DB::table('thiet_bi')->insert([
 
		'name' => 'PI-Intel',
		 
		'ip_address' => '192.168.3.204',
		 
		'port'=>'2204',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/pi-intel_on.sh',

		'scriptOff'=>'/home/power/pi-intel_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio22/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);

		DB::table('thiet_bi')->insert([
 
		'name' => 'PI-3B+',
		 
		'ip_address' => '192.168.3.208',
		 
		'port'=>'2208',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/pi3BP_on.sh',

		'scriptOff'=>'/home/power/pi3BP_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio23/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);


		DB::table('thiet_bi')->insert([
 
		'name' => 'Jetson-Xavier',
		 
		'ip_address' => '192.168.3.112',
		 
		'port'=>'7112',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/xavier_on.sh',

		'scriptOff'=>'/home/power/xavier_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio18/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);

		DB::table('thiet_bi')->insert([
 
		'name' => 'Z800',
		 
		'ip_address' => '192.168.3.107',
		 
		'port'=>'2417',

		'isShowUser'=>1,

		'scriptOn'=>'/home/power/z800_on.sh',

		'scriptOff'=>'/home/power/z800_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio4/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);

		DB::table('thiet_bi')->insert([
 
		'name' => 'T430',
		 
		'ip_address' => '192.168.3.100',
		 
		'port'=>'2000',

		'isShowUser'=>0,

		'scriptOn'=>'/home/power/t430_on.sh',

		'scriptOff'=>'/home/power/t430_off.sh',

		'statusPath'=>'/sys/class/gpio/gpio24/value',

		'start_time'=>$time,

		'stop_time'=>$time
		 
		]);


    }
}
