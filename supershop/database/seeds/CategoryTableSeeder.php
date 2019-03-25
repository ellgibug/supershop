<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    private $categories;

    public function __construct()
    {
        $this->categories = collect([
            ['name' => 'Мобильные телефоны', 'main_category_id' => 1],
            ['name' => 'Ноутбуки', 'main_category_id' => 1],
            ['name' => 'Принтеры и МФУ', 'main_category_id' => 1],
            ['name' => 'Телевизоры и мониторы', 'main_category_id' => 1],
            ['name' => 'Холодильники и морозильники', 'main_category_id' => 2],
            ['name' => 'СВЧ печи', 'main_category_id' => 2],
            ['name' => 'Духовые шкафы', 'main_category_id' => 2],
            ['name' => 'Варочные панели', 'main_category_id' => 2],
            ['name' => 'Кухонные плиты', 'main_category_id' => 2],
            ['name' => 'Стиральные машины', 'main_category_id' => 2],
            ['name' => 'Парфюмерия', 'main_category_id' => 3],
            ['name' => 'Макияж', 'main_category_id' => 3],
            ['name' => 'Очищение', 'main_category_id' => 3],
            ['name' => 'Аксессуары', 'main_category_id' => 3],
            ['name' => 'Пишущие принадлежности', 'main_category_id' => 4],
            ['name' => 'Тетради', 'main_category_id' => 4],
            ['name' => 'Краски', 'main_category_id' => 4],
            ['name' => 'Для бумаги', 'main_category_id' => 4],
            ['name' => 'Букеты', 'main_category_id' => 5],
            ['name' => 'Цветы в горшках', 'main_category_id' => 5],
            ['name' => 'Семена', 'main_category_id' => 5]
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Transliterate::make($category['name'], ['type' => 'url', 'lowercase' => true]),
                'main_category_id' => $category['main_category_id']
            ]);
        }
    }
}
