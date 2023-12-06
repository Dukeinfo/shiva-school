<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Widget;
use Carbon\Carbon;
class WidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       /*
         menu_id  1  for home
       */ 

    	//about-sirs (4 widgets)
        $widget = new Widget();
        $widget->menu_id = 2;
        $widget->pname = 'home.about_sirs';
        $widget->spname = 'home.about_sirs';
        $widget->pagetitle = 'About Sirs';
        $widget->sort_id = 1;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 2;
        $widget->pname = 'home.about_sirs';
        $widget->spname = 'home.vision_and_mission';
        $widget->pagetitle = 'Mission Vision';
        $widget->sort_id = 2;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 2;
        $widget->pname = 'home.about_sirs';
        $widget->spname = 'home.leadership';
        $widget->pagetitle = 'Leadership';
        $widget->sort_id = 3;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 2;
        $widget->pname = 'home.about_sirs';
        $widget->spname = 'home.principals_desk';
        $widget->pagetitle = "Principal's Desk";
        $widget->sort_id = 4;
        $widget->status = 'Active';
        $widget->save();

        //blogs (4 widgets)
        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.blogs';
        $widget->spname = 'home.blogs';
        $widget->pagetitle = 'Blogs';
        $widget->sort_id = 5;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.blogs';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'News';
        $widget->sort_id = 6;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.blogs';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'Events';
        $widget->sort_id = 7;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.blogs';
        $widget->spname = 'home.gallery';
        $widget->pagetitle = 'Gallery';
        $widget->sort_id = 8;
        $widget->status = 'Active';
        $widget->save();


         //gallery (4 widgets)
        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.gallery';
        $widget->pagetitle = 'Gallery';
        $widget->sort_id = 9;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'News';
        $widget->sort_id = 10;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'Events';
        $widget->sort_id = 11;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.blogs';
        $widget->pagetitle = 'Blogs';
        $widget->sort_id = 12;
        $widget->status = 'Active';
        $widget->save();


         //gallery detail (4 widgets)
        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.gallery';
        $widget->pagetitle = 'Gallery';
        $widget->sort_id = 13;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'News';
        $widget->sort_id = 14;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'Events';
        $widget->sort_id = 15;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.gallery';
        $widget->spname = 'home.blogs';
        $widget->pagetitle = 'Blogs';
        $widget->sort_id = 16;
        $widget->status = 'Active';
        $widget->save();

         //principals-desk (4 widgets)

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.principals_desk';
        $widget->spname = 'home.principals_desk';
        $widget->pagetitle = "Principal's Desk";
        $widget->sort_id = 17;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.principals_desk';
        $widget->spname = 'home.about_sirs';
        $widget->pagetitle = "About Sirs";
        $widget->sort_id = 18;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.principals_desk';
        $widget->spname = 'home.vision_and_mission';
        $widget->pagetitle = "Mission & Vision";
        $widget->sort_id = 19;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.principals_desk';
        $widget->spname = 'home.leadership';
        $widget->pagetitle = "Leadership";
        $widget->sort_id = 20;
        $widget->status = 'Active';
        $widget->save();

        //Mission & Vission (4 widgets)

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.vision_and_mission';
        $widget->spname = 'home.vision_and_mission';
        $widget->pagetitle = "Mission & Vision";
        $widget->sort_id = 21;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.vision_and_mission';
        $widget->spname = 'home.leadership';
        $widget->pagetitle = "Leadership";
        $widget->sort_id = 22;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.vision_and_mission';
        $widget->spname = 'home.principals_desk';
        $widget->pagetitle = "Principal's Desk";
        $widget->sort_id = 23;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.vision_and_mission';
        $widget->spname = 'home.about_sirs';
        $widget->pagetitle = "About Sirs";
        $widget->sort_id = 24;
        $widget->status = 'Active';
        $widget->save();

        //Leadership (4 widgets)

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.leadership';
        $widget->spname = 'home.leadership';
        $widget->pagetitle = "Leadership";
        $widget->sort_id = 25;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.leadership';
        $widget->spname = 'home.principals_desk';
        $widget->pagetitle = "Principal's Desk";
        $widget->sort_id = 26;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.leadership';
        $widget->spname = 'home.about_sirs';
        $widget->pagetitle = "About Sirs";
        $widget->sort_id = 27;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.leadership';
        $widget->spname = 'home.vision_and_mission';
        $widget->pagetitle = "Mission & Vision";
        $widget->sort_id = 28;
        $widget->status = 'Active';
        $widget->save();


        //News Events (4 widgets)

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.news_event';
        $widget->spname = 'home.blogs';
        $widget->pagetitle = 'Blogs';
        $widget->sort_id = 29;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.news_event';
        $widget->spname = 'home.gallery';
        $widget->pagetitle = 'Gallery';
        $widget->sort_id = 30;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.news_event';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'News';
        $widget->sort_id = 31;
        $widget->status = 'Active';
        $widget->save();

        $widget = new Widget();
        $widget->menu_id = 6;
        $widget->pname = 'home.news_event';
        $widget->spname = 'home.news_event';
        $widget->pagetitle = 'Events';
        $widget->sort_id = 32;
        $widget->status = 'Active';
        $widget->save();



        


    }
}
