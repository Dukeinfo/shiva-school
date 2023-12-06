<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FooterLink;

class FooterLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footerLink = new FooterLink();
        $footerLink->category = 'Quick Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'About School';
        $footerLink->sort_id = 1;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'Quick Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Admission Process';
        $footerLink->sort_id = 2;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'Quick Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Mandatory Disclosure';
        $footerLink->sort_id = 3;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'Quick Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Fees Structure';
        $footerLink->sort_id = 4;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'Quick Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Contact us';
        $footerLink->sort_id = 5;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'More Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Boarding Life';
        $footerLink->sort_id = 6;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'More Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Blogs';
        $footerLink->sort_id = 7;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'More Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Recent News';
        $footerLink->sort_id = 8;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'More Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Events';
        $footerLink->sort_id = 9;
        $footerLink->status = 'Active';
        $footerLink->save();

        $footerLink = new FooterLink();
        $footerLink->category = 'More Links';
        $footerLink->pname = Null;
        $footerLink->pagetitle = 'Gallery';
        $footerLink->sort_id = 10;
        $footerLink->status = 'Active';
        $footerLink->save();

    }
}
