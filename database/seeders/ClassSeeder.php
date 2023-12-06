<?php

namespace Database\Seeders;

use App\Models\ClassMaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassMaster::truncate();
        $now = Carbon::now();

      $classes = array(
        array('classname' => '1st' ,'sort_id' => '1','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '2nd','sort_id' => '2','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '3rd' ,'sort_id' => '3','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '4th' ,'sort_id' => '4','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '5th' ,'sort_id' => '5','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '6th' ,'sort_id' => '6','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '7th' ,'sort_id' => '7','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '8th' ,'sort_id' => '8','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '9th' ,'sort_id' => '9','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('classname' => '10th' ,'sort_id' => '10','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
         array('classname' => '11th' ,'sort_id' => '11','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
          array('classname' => '12th' ,'sort_id' => '12','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        );
        foreach ( $classes as $key => $name) {
                    ClassMaster::create($name);
                }

        
    }
}
