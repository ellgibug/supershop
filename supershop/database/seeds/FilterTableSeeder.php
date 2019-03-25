<?php

use Illuminate\Database\Seeder;

class FilterTableSeeder extends Seeder
{
    private $filters;

    public function __construct()
    {
        $this->filters = collect([
            ['name' => 'Диагональ экрана', 'measure' => 'дюймы', 'allowable_values' => '', 'type' => 'num', 'category_id' => 1],
            ['name' => 'Емкость аккумулятора', 'measure' => 'мАЧ', 'allowable_values' => '', 'type' => 'num', 'category_id' => 1],
            ['name' => 'Объем встроенной памяти', 'measure' => 'гБ', 'allowable_values' => '', 'type' => 'num', 'category_id' => 1],
            ['name' => 'Камера', 'measure' => 'мП', 'allowable_values' => '', 'type' => 'num', 'category_id' => 1],
            ['name' => 'Слот для карты памяти', 'measure' => '', 'allowable_values' => 'Да;Нет', 'type' => 'bool', 'category_id' => 1],
            ['name' => 'Процессор', 'measure' => '', 'allowable_values' => 'Intel;AMD', 'type' => 'bool', 'category_id' => 2],
            ['name' => 'Объем оперативной памяти', 'measure' => 'гБ', 'allowable_values' => '', 'type' => 'num', 'category_id' => 2],
            ['name' => 'Объем видео памяти', 'measure' => 'мБ', 'allowable_values' => '', 'type' => 'num', 'category_id' => 2],
            ['name' => 'Тип', 'measure' => '', 'allowable_values' => 'Принтер;МФУ', 'type' => 'bool', 'category_id' => 3],
            ['name' => 'Тип', 'measure' => '', 'allowable_values' => 'Телевизор;Монитор', 'type' => 'bool', 'category_id' => 4],
            ['name' => 'Диагональ экрана', 'measure' => 'дюймы', 'allowable_values' => '', 'type' => 'num', 'category_id' => 2],
            ['name' => 'Объем встроенной памяти', 'measure' => 'гБ', 'allowable_values' => '', 'type' => 'num', 'category_id' => 2],

        ]);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->filters as $filter) {
            DB::table('filters')->insert([
                'name' => $filter['name'],
                'measure' => $filter['measure'],
                'allowable_values' => $filter['allowable_values'],
                'category_id' => $filter['category_id']
            ]);
        }
    }
}
