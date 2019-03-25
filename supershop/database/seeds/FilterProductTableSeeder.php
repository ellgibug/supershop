<?php

use Illuminate\Database\Seeder;

class FilterProductTableSeeder extends Seeder
{
    private $filters;

    public function __construct()
    {
        $this->filters = collect([
            ['filter_id' => '1', 'product_id' => '1', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '1', 'value' => '3500'],
            ['filter_id' => '3', 'product_id' => '1', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '1', 'value' => '16'],
            ['filter_id' => '5', 'product_id' => '1', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '2', 'value' => '5.6'],
            ['filter_id' => '2', 'product_id' => '2', 'value' => '3000'],
            ['filter_id' => '3', 'product_id' => '2', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '2', 'value' => '13'],
            ['filter_id' => '5', 'product_id' => '2', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '3', 'value' => '5.8'],
            ['filter_id' => '2', 'product_id' => '3', 'value' => '3000'],
            ['filter_id' => '3', 'product_id' => '3', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '3', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '3', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '4', 'value' => '6.2'],
            ['filter_id' => '2', 'product_id' => '4', 'value' => '3500'],
            ['filter_id' => '3', 'product_id' => '4', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '4', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '4', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '5', 'value' => '5.8'],
            ['filter_id' => '2', 'product_id' => '5', 'value' => '3000'],
            ['filter_id' => '3', 'product_id' => '5', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '5', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '5', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '6', 'value' => '6.2'],
            ['filter_id' => '2', 'product_id' => '6', 'value' => '3500'],
            ['filter_id' => '3', 'product_id' => '6', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '6', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '6', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '7', 'value' => '6.3'],
            ['filter_id' => '2', 'product_id' => '7', 'value' => '3300'],
            ['filter_id' => '3', 'product_id' => '7', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '7', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '7', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '8', 'value' => '6.4'],
            ['filter_id' => '2', 'product_id' => '8', 'value' => '4000'],
            ['filter_id' => '3', 'product_id' => '8', 'value' => '512'],
            ['filter_id' => '4', 'product_id' => '8', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '8', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '9', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '9', 'value' => '3500'],
            ['filter_id' => '3', 'product_id' => '9', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '9', 'value' => '16'],
            ['filter_id' => '5', 'product_id' => '9', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '10', 'value' => '5.5'],
            ['filter_id' => '2', 'product_id' => '10', 'value' => '3000'],
            ['filter_id' => '3', 'product_id' => '10', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '10', 'value' => '13'],
            ['filter_id' => '5', 'product_id' => '10', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '11', 'value' => '5.5'],
            ['filter_id' => '2', 'product_id' => '11', 'value' => '3000'],
            ['filter_id' => '3', 'product_id' => '11', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '11', 'value' => '13'],
            ['filter_id' => '5', 'product_id' => '11', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '12', 'value' => '5.7'],
            ['filter_id' => '2', 'product_id' => '12', 'value' => '3300'],
            ['filter_id' => '3', 'product_id' => '12', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '12', 'value' => '13'],
            ['filter_id' => '5', 'product_id' => '12', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '13', 'value' => '5.3'],
            ['filter_id' => '2', 'product_id' => '13', 'value' => '4100'],
            ['filter_id' => '3', 'product_id' => '13', 'value' => '16'],
            ['filter_id' => '4', 'product_id' => '13', 'value' => '13'],
            ['filter_id' => '5', 'product_id' => '13', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '14', 'value' => '6.1'],
            ['filter_id' => '2', 'product_id' => '14', 'value' => '3000'],
            ['filter_id' => '3', 'product_id' => '14', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '14', 'value' => '16'],
            ['filter_id' => '5', 'product_id' => '14', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '15', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '15', 'value' => '3300'],
            ['filter_id' => '3', 'product_id' => '15', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '15', 'value' => '16'],
            ['filter_id' => '5', 'product_id' => '15', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '16', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '16', 'value' => '3010'],
            ['filter_id' => '3', 'product_id' => '16', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '16', 'value' => '20'],
            ['filter_id' => '5', 'product_id' => '16', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '17', 'value' => '5.8'],
            ['filter_id' => '2', 'product_id' => '17', 'value' => '4000'],
            ['filter_id' => '3', 'product_id' => '17', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '17', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '17', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '18', 'value' => '5.7'],
            ['filter_id' => '2', 'product_id' => '18', 'value' => '3300'],
            ['filter_id' => '3', 'product_id' => '18', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '18', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '18', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '19', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '19', 'value' => '3080'],
            ['filter_id' => '3', 'product_id' => '19', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '19', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '19', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '20', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '20', 'value' => '3400'],
            ['filter_id' => '3', 'product_id' => '20', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '20', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '20', 'value' => 'Нет'],

            ['filter_id' => '1', 'product_id' => '21', 'value' => '6.2'],
            ['filter_id' => '2', 'product_id' => '21', 'value' => '4000'],
            ['filter_id' => '3', 'product_id' => '21', 'value' => '128'],
            ['filter_id' => '4', 'product_id' => '21', 'value' => '12'],
            ['filter_id' => '5', 'product_id' => '21', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '22', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '22', 'value' => '3300'],
            ['filter_id' => '3', 'product_id' => '22', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '22', 'value' => '19'],
            ['filter_id' => '5', 'product_id' => '22', 'value' => 'Нет'],

            ['filter_id' => '1', 'product_id' => '23', 'value' => '6'],
            ['filter_id' => '2', 'product_id' => '23', 'value' => '3580'],
            ['filter_id' => '3', 'product_id' => '23', 'value' => '32'],
            ['filter_id' => '4', 'product_id' => '23', 'value' => '23'],
            ['filter_id' => '5', 'product_id' => '23', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '24', 'value' => '5.8'],
            ['filter_id' => '2', 'product_id' => '24', 'value' => '3540'],
            ['filter_id' => '3', 'product_id' => '24', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '24', 'value' => '19'],
            ['filter_id' => '5', 'product_id' => '24', 'value' => 'Да'],

            ['filter_id' => '1', 'product_id' => '25', 'value' => '5'],
            ['filter_id' => '2', 'product_id' => '25', 'value' => '2870'],
            ['filter_id' => '3', 'product_id' => '25', 'value' => '64'],
            ['filter_id' => '4', 'product_id' => '25', 'value' => '19'],
            ['filter_id' => '5', 'product_id' => '25', 'value' => 'Да'],

            ['filter_id' => '11', 'product_id' => '26', 'value' => '13.9'],
            ['filter_id' => '13', 'product_id' => '26', 'value' => '1000'],
            ['filter_id' => '6', 'product_id' => '26', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '26', 'value' => '12'],
            ['filter_id' => '8', 'product_id' => '26', 'value' => '64'],

            ['filter_id' => '11', 'product_id' => '27', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '27', 'value' => '500'],
            ['filter_id' => '6', 'product_id' => '27', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '27', 'value' => '4'],
            ['filter_id' => '8', 'product_id' => '27', 'value' => '32'],

            ['filter_id' => '11', 'product_id' => '28', 'value' => '11.6'],
            ['filter_id' => '13', 'product_id' => '28', 'value' => '32'],
            ['filter_id' => '6', 'product_id' => '28', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '28', 'value' => '2'],
            ['filter_id' => '8', 'product_id' => '28', 'value' => '2'],

            ['filter_id' => '11', 'product_id' => '29', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '29', 'value' => '1000'],
            ['filter_id' => '6', 'product_id' => '29', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '29', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '29', 'value' => '8'],

            ['filter_id' => '11', 'product_id' => '30', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '30', 'value' => '1256'],
            ['filter_id' => '6', 'product_id' => '30', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '30', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '30', 'value' => '4'],

            ['filter_id' => '11', 'product_id' => '31', 'value' => '14'],
            ['filter_id' => '13', 'product_id' => '31', 'value' => '256'],
            ['filter_id' => '6', 'product_id' => '31', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '31', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '31', 'value' => '2'],

            ['filter_id' => '11', 'product_id' => '32', 'value' => '17.3'],
            ['filter_id' => '13', 'product_id' => '32', 'value' => '1024'],
            ['filter_id' => '6', 'product_id' => '32', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '32', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '32', 'value' => '8'],

            ['filter_id' => '11', 'product_id' => '33', 'value' => '14'],
            ['filter_id' => '13', 'product_id' => '33', 'value' => '500'],
            ['filter_id' => '6', 'product_id' => '33', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '33', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '33', 'value' => '4'],

            ['filter_id' => '11', 'product_id' => '34', 'value' => '13.3'],
            ['filter_id' => '13', 'product_id' => '34', 'value' => '256'],
            ['filter_id' => '6', 'product_id' => '34', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '34', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '34', 'value' => '4'],

            ['filter_id' => '11', 'product_id' => '35', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '35', 'value' => '2000'],
            ['filter_id' => '6', 'product_id' => '35', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '35', 'value' => '12'],
            ['filter_id' => '8', 'product_id' => '35', 'value' => '4'],

            ['filter_id' => '11', 'product_id' => '36', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '36', 'value' => '1000'],
            ['filter_id' => '6', 'product_id' => '36', 'value' => 'AMD'],
            ['filter_id' => '7', 'product_id' => '36', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '36', 'value' => '8'],

            ['filter_id' => '11', 'product_id' => '37', 'value' => '17.3'],
            ['filter_id' => '13', 'product_id' => '37', 'value' => '2048'],
            ['filter_id' => '6', 'product_id' => '37', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '37', 'value' => '32'],
            ['filter_id' => '8', 'product_id' => '37', 'value' => '16'],

            ['filter_id' => '11', 'product_id' => '38', 'value' => '17.3'],
            ['filter_id' => '13', 'product_id' => '38', 'value' => '1128'],
            ['filter_id' => '6', 'product_id' => '38', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '38', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '38', 'value' => '16'],

            ['filter_id' => '11', 'product_id' => '39', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '39', 'value' => '1128'],
            ['filter_id' => '6', 'product_id' => '39', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '39', 'value' => '32'],
            ['filter_id' => '8', 'product_id' => '39', 'value' => '16'],

            ['filter_id' => '11', 'product_id' => '40', 'value' => '14'],
            ['filter_id' => '13', 'product_id' => '40', 'value' => '1000'],
            ['filter_id' => '6', 'product_id' => '40', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '40', 'value' => '4'],
            ['filter_id' => '8', 'product_id' => '40', 'value' => '2'],

            ['filter_id' => '11', 'product_id' => '41', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '41', 'value' => '1024'],
            ['filter_id' => '6', 'product_id' => '41', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '41', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '41', 'value' => '4'],

            ['filter_id' => '11', 'product_id' => '42', 'value' => '14'],
            ['filter_id' => '13', 'product_id' => '42', 'value' => '1000'],
            ['filter_id' => '6', 'product_id' => '42', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '42', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '42', 'value' => '2'],

            ['filter_id' => '11', 'product_id' => '43', 'value' => '17.3'],
            ['filter_id' => '13', 'product_id' => '43', 'value' => '512'],
            ['filter_id' => '6', 'product_id' => '43', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '43', 'value' => '32'],
            ['filter_id' => '8', 'product_id' => '43', 'value' => '6'],

            ['filter_id' => '11', 'product_id' => '44', 'value' => '13.3'],
            ['filter_id' => '13', 'product_id' => '44', 'value' => '256'],
            ['filter_id' => '6', 'product_id' => '44', 'value' => 'AMD'],
            ['filter_id' => '7', 'product_id' => '44', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '44', 'value' => '4'],

            ['filter_id' => '11', 'product_id' => '45', 'value' => '14'],
            ['filter_id' => '13', 'product_id' => '45', 'value' => '64'],
            ['filter_id' => '6', 'product_id' => '45', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '45', 'value' => '8'],
            ['filter_id' => '8', 'product_id' => '45', 'value' => '8'],

            ['filter_id' => '11', 'product_id' => '46', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '46', 'value' => '512'],
            ['filter_id' => '6', 'product_id' => '46', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '46', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '46', 'value' => '8'],

            ['filter_id' => '11', 'product_id' => '47', 'value' => '15.6'],
            ['filter_id' => '13', 'product_id' => '47', 'value' => '256'],
            ['filter_id' => '6', 'product_id' => '47', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '47', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '47', 'value' => '8'],

            ['filter_id' => '11', 'product_id' => '48', 'value' => '13.3'],
            ['filter_id' => '13', 'product_id' => '48', 'value' => '256'],
            ['filter_id' => '6', 'product_id' => '48', 'value' => 'Intel'],
            ['filter_id' => '7', 'product_id' => '48', 'value' => '16'],
            ['filter_id' => '8', 'product_id' => '48', 'value' => '8'],

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
            DB::table('filter_product')->insert([
                'filter_id' => $filter['filter_id'],
                'product_id' => $filter['product_id'],
                'value' => $filter['value']
            ]);
        }
    }
}
