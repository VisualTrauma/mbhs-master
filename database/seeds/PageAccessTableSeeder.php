<?php

use Illuminate\Database\Seeder;

class PageAccessTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\PageAccess::class, 7)->create();
    }
}
