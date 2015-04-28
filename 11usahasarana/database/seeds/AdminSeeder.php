<?php
 
use Illuminate\Database\Seeder;
 
class AdminSeeder extends Seeder {
 
    public function run()
    {
        DB::table('admin')->delete();

        $admins = array(
            ['username'=>'timothy','password'=>'timothy','nama'=>'Timothy Pratama'],
            ['username'=>'william','password'=>'william','nama'=>'William Stefan Hartono'],
            ['username'=>'icha','password'=>'icha','nama'=>'Choirunnisa Fatima'],
            ['username'=>'tony','password'=>'tony','nama'=>'Tony'],
            ['username'=>'riady','password'=>'riady','nama'=>'Riady Sastra Kusuma']);
        DB::table('admin')->insert($admins);
    }
 
}