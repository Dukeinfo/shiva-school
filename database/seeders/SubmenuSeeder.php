<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Submenu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    public function run()
    {
      Submenu::truncate();

        $now = Carbon::now();
        $submenus = array(

                array('menu_id' => '2','name' => 'About Sirs','sort_id' => '1','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => 'Our School','display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'about sirs','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                 array('menu_id' => '2','name' => 'Mission & Vision','sort_id' => '2','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => 'Mission & Vision','display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'mission-vision','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                  array('menu_id' => '2','name' => 'Leadership','sort_id' => '3','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => 'Leadership','display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'leadership','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                  array('menu_id' => '2','name' => "Principal,s Desk",'sort_id' => '4','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Principal,s Desk",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'principal-desk','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                  array('menu_id' => '3','name' => "Outside Classroom",'sort_id' => '5','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Principal,s Desk",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'principal-desk','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                   // Outside Classroom nested 
                   array('menu_id' => '3','parent_id' => '5','name' => "Sports",'sort_id' => '6','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Sports",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'sports','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                     array('menu_id' => '3','parent_id' => '5','name' => "Arts",'sort_id' => '7','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Arts",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'arts','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                   array('menu_id' => '3','parent_id' => '5','name' => "Technology",'sort_id' => '8','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Technology",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'technology','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),  

                   array('menu_id' => '3','parent_id' => '5','name' => "Educational Trips",'sort_id' => '9','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Educational Trips",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'educational-trips','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),  

                  array('menu_id' => '3','parent_id' => '5','name' => "Community Service",'sort_id' => '10','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Community Service",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'community service','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 
                  
                  array('menu_id' => '3','name' => "Curriculum & Pedagogy",'sort_id' => '11','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Curriculum & Pedagogy",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'curriculump-pedagogy','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),   

                    array('menu_id' => '3','name' => "Junior School",'sort_id' => '12','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Junior School",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'junior-school','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 

                   array('menu_id' => '3','name' => "Senior School",'sort_id' => '13','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Senior School",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'senior-school','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 

                    array('menu_id' => '3','name' => "Academic Facilities",'sort_id' => '14','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Academic Facilities",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'academic-facilities','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),  

                   array('menu_id' => '3','name' => "Life Skills",'sort_id' => '15','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Life Skills",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'life-skills','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 

                  array('menu_id' => '4','name' => "Ethos",'sort_id' => '16','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Ethos",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'ethos','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 
                  
                  array('menu_id' => '4','name' => "Boarding at SIRS",'sort_id' => '17','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Boarding at SIRS",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'boarding-at-sirs','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),  

                 array('menu_id' => '4','name' => "Wellness",'sort_id' => '18','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Wellness",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'wellness','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 

                   array('menu_id' => '5','name' => "Admission Process",'sort_id' => '19','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Admission Process",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'admission-process','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

                  array('menu_id' => '5','name' => "How to Apply",'sort_id' => '20','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "How to Apply",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'how to-apply','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 
                  
                 array('menu_id' => '5','name' => "Enquire and Visit",'sort_id' => '21','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Enquire and Visit",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'enquire-and-visit','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 

              array('menu_id' => '5','name' => "Open House",'sort_id' => '22','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Open House",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'open-house','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'), 
              
            array('menu_id' => '6','name' => "Blogs",'sort_id' => '23','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Blogs",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'blogs','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),  

            array('menu_id' => '6','name' => "News",'sort_id' => '24','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "News",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'news','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),

           array('menu_id' => '6','name' => "Events",'sort_id' => '25','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Events",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'events','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),
           
            array('menu_id' => '6','name' => "Gallery",'sort_id' => '26','cms' => 'No','pname' => NULL,'image' => NULL,'thumbnail' => NULL,'url_link' => NULL,'display_title' => "Gallery",'display_heading' => 'SHIVA','display_subheading' => 'RESIDENTIAL SCHOOL','slug' => 'gallery','seo_title' => 'Shiva International Residential School','seo_description' => 'Shiva International Residential School','seo_keywords' => 'Shiva International - Residential School','status' => 'Active','ip_address' => NULL,'login' => NULL,'deleted_at' => NULL,'created_at' => '2023-08-16 16:55:06','updated_at' => '2023-08-16 16:55:06'),            



        );


        foreach ($submenus as &$item) {
          // Get the "name" field value
          $name = $item['name'];
          
          // Generate slug by converting to lowercase and replacing spaces with hyphens
          $slug = str_replace(' ', '-', strtolower($name));
          
          // Store the generated slug in the "slug" field
          $item['slug'] = $slug;
      }
      // Now you can proceed with inserting the updated data into the database
      foreach ($submenus as $submenu) {
          DB::table('submenus')->insert($submenu);
      }
    }
}
