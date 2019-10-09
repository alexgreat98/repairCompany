<?php

use Illuminate\Database\Seeder;
use App\Param;
class ParamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricesTypes = array(['м²', 'шт.', 'конт.', 'мешок', 'тн.', 'ч./час', 'п.м.']);
        Param::create([
            'key' => 'SITE_NAME',
            'value' => 'Строительство и ремонт',
            'description' => 'Заголовок сайта',
        ]);
        Param::create([
            'key' => 'TEL_NUMBERS',
            'value' => '8-800-555-35-35',
            'description' => 'Телефоны для связи',
        ]);
        Param::create([
            'key' => 'PRICE_TYPE',
            'value' => serialize($pricesTypes),
            'description' => 'Телефоны для связи',
        ]);
    }
}
