<?php

namespace Database\Seeders;

use App\Models\FancyBox;
use Illuminate\Database\Seeder;

class FancyBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FancyBox::truncate();

        $fancyBox = array(
            array('category' =>'School Brochure','description' =>'Lorem ipsum dolor consectetur adipiscing eiusmod tempor','sort_id' => '1','status' => 'Active','ip_address' => NULL,'login' => NULL,'created_at' => now(),'updated_at' => now()),
            array('category' =>'Our Campus','description' =>'Lorem ipsum dolor consectetur adipiscing eiusmod tempor','sort_id' => '2','status' => 'Active','ip_address' => NULL,'login' => NULL,'created_at' => now(),'updated_at' => now()),

            array('category' =>"Parents' Speak",'description' =>'Lorem ipsum dolor consectetur adipiscing eiusmod tempor','sort_id' => '3','status' => 'Active','ip_address' => NULL,'login' => NULL,'created_at' => now(),'updated_at' => now()), 

            array('category' =>"Admission",'description' =>'Lorem ipsum dolor consectetur adipiscing eiusmod tempor','sort_id' => '4','status' => 'Active','ip_address' => NULL,'login' => NULL,'created_at' => now(),'updated_at' => now()),

            array('category' =>"School in News",'description' =>'Lorem ipsum dolor consectetur adipiscing eiusmod tempor','sort_id' => '5','status' => 'Active','ip_address' => NULL,'login' => NULL,'created_at' => now(),'updated_at' => now()),

            array('category' =>"Fee Structure",'description' =>'Lorem ipsum dolor consectetur adipiscing eiusmod tempor','sort_id' => '6','status' => 'Active','ip_address' => NULL,'login' => NULL,'created_at' => now(),'updated_at' => now())

            );

          foreach ( $fancyBox as $key => $name) {
            FancyBox::create($name);
         }                         
    }
}
