<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //BlogCategory 1
        $category = new BlogCategory();
        $category->name = 'Entertainment';
        $category->sort_id =1;
        $category->save();

        $category = new BlogCategory();
        $category->name = 'Business';
        $category->sort_id =2;
        $category->save();

        $category = new BlogCategory();
        $category->name = 'Creative';
        $category->sort_id =3;
        $category->save();

        $category = new BlogCategory();
        $category->name = 'Lifestyle';
        $category->sort_id =4;
        $category->save();

        $category = new BlogCategory();
        $category->name = 'Fashion';
        $category->sort_id =5;
        $category->save();

        $category = new BlogCategory();
        $category->name = 'Design';
        $category->sort_id =6;
        $category->save();
    }
}
