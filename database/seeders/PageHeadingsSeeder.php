<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageHeading;
use Carbon\Carbon;
class PageHeadingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //about sirs  (4)
        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 2;
        $pageHeading->pname = 'home.about_sirs';
        $pageHeading->pname_eng = "About SIRS" ;
        $pageHeading->pname_title = 'Our School';
        $pageHeading->pname_heading = "Shiva";
        $pageHeading->pname_subheading = 'Residential School';
        $pageHeading->sort_id = 1;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 2; 
        $pageHeading->pname = 'home.vision_and_mission';  //create page
        $pageHeading->pname_eng = "Mission & Vision" ;
        $pageHeading->pname_title = 'Mission & Vision';
        $pageHeading->pname_heading = "Shiva";
        $pageHeading->pname_subheading = 'Residential School';
        $pageHeading->sort_id = 2;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 2;
        $pageHeading->pname = 'home.leadership'; //create page
        $pageHeading->pname_eng = "Leadership" ;
        $pageHeading->pname_title = 'Leadership';
        $pageHeading->pname_heading = "Shiva";
        $pageHeading->pname_subheading = 'Residential School';
        $pageHeading->sort_id = 3;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 2;
        $pageHeading->pname = 'home.principals_desk';
        $pageHeading->pname_eng = "Principal's Desk" ;
        $pageHeading->pname_title = "Principal's Desk";
        $pageHeading->pname_heading = "Shiva";
        $pageHeading->pname_subheading = 'Residential School';
        $pageHeading->sort_id = 4;
        $pageHeading->status = 'Active';
        $pageHeading->save();


        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 1;
        $pageHeading->pname = 'home.blogs';
        $pageHeading->pname_eng = "Blogs" ;
        $pageHeading->pname_title = "Explore SIRS";
        $pageHeading->pname_heading = "SIRS";
        $pageHeading->pname_subheading = 'Blogs';
        $pageHeading->sort_id = 5;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 1;
        $pageHeading->pname = 'home.blog_detail';
        $pageHeading->pname_eng = "Blog Detail" ;
        $pageHeading->pname_title = "Explore SIRS";
        $pageHeading->pname_heading = "Blogs";
        $pageHeading->pname_subheading = 'Details';
        $pageHeading->sort_id = 6;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 1;
        $pageHeading->pname = 'home.contact_us';
        $pageHeading->pname_eng = "Contact Us" ;
        $pageHeading->pname_title = "Get Connected";
        $pageHeading->pname_heading = "Contact Shiva";
        $pageHeading->pname_subheading = 'Details';
        $pageHeading->sort_id = 7;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 6;
        $pageHeading->pname = 'home.gallery';
        $pageHeading->pname_eng = "Gallery" ;
        $pageHeading->pname_title = "Explore SIRS";
        $pageHeading->pname_heading = "SIRS";
        $pageHeading->pname_subheading = 'Gallery';
        $pageHeading->sort_id = 8;
        $pageHeading->status = 'Active';
        $pageHeading->save();

        $pageHeading = new PageHeading();
        $pageHeading->menu_id = 1;
        $pageHeading->pname = 'home.news_event';
        $pageHeading->pname_eng = "News Events" ;
        $pageHeading->pname_title = "Explore SIRS";
        $pageHeading->pname_heading = "News";
        $pageHeading->pname_subheading = 'Events';
        $pageHeading->sort_id = 9;
        $pageHeading->status = 'Active';
        $pageHeading->save();


    }
}
