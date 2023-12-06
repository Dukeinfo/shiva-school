<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialApp;
class SocialAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //header social app 
        $socialApp = new SocialApp();
        $socialApp->category = 'Header';
        $socialApp->name = 'facebook';
        $socialApp->link = 'https://www.facebook.com/';
        $socialApp->icon = 'fab fa-facebook-f';
        $socialApp->sort_id = 1;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Header';
        $socialApp->name = 'dribbble';
        $socialApp->link = 'http://www.dribbble.com/';
        $socialApp->icon = 'fab fa-dribbble';
        $socialApp->sort_id = 2;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Header';
        $socialApp->name = 'twitter';
        $socialApp->link = 'http://www.twitter.com/';
        $socialApp->icon = 'fab fa-twitter';
        $socialApp->sort_id = 3;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Header';
        $socialApp->name = 'instagram';
        $socialApp->link = 'http://www.instagram.com/';
        $socialApp->icon = 'fab fa-instagram';
        $socialApp->sort_id = 4;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Header';
        $socialApp->name = 'linkedin';
        $socialApp->link = 'http://www.linkedin.com/';
        $socialApp->icon = 'fab fa-linkedin-in';
        $socialApp->sort_id = 5;
        $socialApp->status = 'Active';
        $socialApp->save();

        //footer social app

        $socialApp = new SocialApp();
        $socialApp->category = 'Footer';
        $socialApp->name = 'facebook';
        $socialApp->link = 'https://www.facebook.com/';
        $socialApp->icon = 'fab fa-facebook-f text-white';
        $socialApp->sort_id = 6;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Footer';
        $socialApp->name = 'youtube';
        $socialApp->link = 'https://www.youtube.com/';
        $socialApp->icon = 'fab fa-youtube text-white';
        $socialApp->sort_id = 7;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Footer';
        $socialApp->name = 'twitter';
        $socialApp->link = 'https://www.twitter.com/';
        $socialApp->icon = 'fab fa-twitter text-white';
        $socialApp->sort_id = 8;
        $socialApp->status = 'Active';
        $socialApp->save();

        $socialApp = new SocialApp();
        $socialApp->category = 'Footer';
        $socialApp->name = 'instagram';
        $socialApp->link = 'https://www.instagram.com/';
        $socialApp->icon = 'fab fa-instagram text-white';
        $socialApp->sort_id = 9;
        $socialApp->status = 'Active';
        $socialApp->save();
    }
}
