<?php

namespace Database\Seeders;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Menuseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  

    public function run()
    {
        Menu::truncate();
        $now = Carbon::now();

               /* `shiva`.`menus` */
        $menus = array(
        array('name' => 'Home','sort_id' => '1','link' => 'home.homepage','status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Our School' ,'sort_id' => '2','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Academics' ,'sort_id' => '3','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Boarding','sort_id' => '4','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Admissions' ,'sort_id' => '5','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Explore Sirs' ,'sort_id' => '6','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        array('name' => 'Contact' ,'sort_id' => '7','link' => NULL,'status' => 'Active','ip_address' => NULL,'login' => '1','deleted_at' => NULL,'created_at' => now(),'updated_at' => now()),
        );
        foreach ( $menus as $key => $name) {
                    Menu::create($name);
                }
    }
}







