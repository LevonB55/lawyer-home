<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'civil'
        ]);

        Category::create([
            'name' => 'criminal'
        ]);

        Category::create([
            'name' => 'public'
        ]);
    }
}
