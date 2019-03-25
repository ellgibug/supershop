<?php

use Illuminate\Database\Seeder;

class MainCategoryTableSeeder extends Seeder
{
    private $main_categories = [
        'Электроника',
        'Бытовая техника',
        'Косметика',
        'Канцтовары',
        'Цветы'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->main_categories as $main_category) {
            DB::table('main_categories')->insert([
                'name' => $main_category,
                'slug' => Transliterate::make($main_category, ['type' => 'url', 'lowercase' => true]),
                'image' => Transliterate::make($main_category, ['type' => 'filename', 'lowercase' => true]).'.png',
            ]);
        }
    }
}
