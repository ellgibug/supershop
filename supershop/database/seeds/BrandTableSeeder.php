<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    private $brands = [
        'Samsung',
        'LG',
        'Xiaomi',
        'Sony',
        'Lenovo',
        'Acer',
        'Asus',
        'Dell',
        'HP',
        'Canon',
        'Epson',
        'Xerox',
        'Phillips',
        'Panasonic',
        'Bosch',
        'Hitachi',
        'Gorenje',
        'Hotpoint-Ariston',
        'Candy',
        'Armani',
        'Chanel',
        'Dior',
        'Kenzo',
        'DKNY',
        'LOreal',
        'Max Factor',
        'Yves Saint Laurent',
        'Чистая линия',
        'Vichy',
        'LaRoche-Posay',
        'Mac',
        'Nyx',
        'Pilot',
        'Parker',
        'Bic',
        'Faber castell',
        'Koh-I-Noor',
        'Deli',
        'Восход',
        'Бумажная фабрика',
        'Ладога',
        'Гамма',
        'Скрепка и кнопка',
        'SuperShop',
        'Русская цветочная база',
        'Гавриш',
        'Аэлита'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand,
                'slug' => Transliterate::make($brand, ['type' => 'url', 'lowercase' => true]),
                'image_big' => Transliterate::make($brand, ['type' => 'filename', 'lowercase' => true]).'.png',
                'image_small' => Transliterate::make($brand, ['type' => 'filename', 'lowercase' => true]).'.png',
            ]);
        }
    }
}
