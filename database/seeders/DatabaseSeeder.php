<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(Menuseeder::class);
        $this->call(SubmenuSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(FancyBoxSeeder::class);
        $this->call(FooterLinksSeeder::class);
        $this->call(PageHeadingsSeeder::class);
        $this->call(WidgetSeeder::class);
        $this->call(BlogCategorySeeder::class);
       /*$this->call(FacilitySeeder::class);
        $this->call(MembershipsSeeder::class);
        $this->call(TestimonialsSeeder::class);
        $this->call(SocialAppSeeder::class);
        $this->call(PageHeadingsSeeder::class);
        $this->call(StudentHeadlinesSeeder::class);*/



    }
}
