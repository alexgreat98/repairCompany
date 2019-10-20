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
        $pricesTypes = ['м²', 'шт.', 'конт.', 'мешок', 'тн.', 'ч./час', 'п.м.'];
        Param::create([
            'key' => 'SITE_NAME',
            'value' => 'Строительство и ремонт',
            'description' => 'Заголовок сайта',
            'type'=>'String',
        ]);
        Param::create([
            'key' => 'TEL_NUMBERS',
            'value' => '8-800-555-35-35',
            'description' => 'Телефоны для связи',
            'type'=>'String',
        ]);
        Param::create([
            'key' => 'PRICE_TYPE',
            'value' => implode(';', $pricesTypes),
            'description' => 'Ед. измирения, через точку с запятой',
            'type'=>'Array',
        ]);
        Param::create([
            'key' => 'GOOGLE_RECAPTCHA',
            'value' => False,
            'description' => 'Включить каптчу Google',
            'type'=>'Bool',
        ]);
        Param::create([
            'key' => 'GOOGLE_RECAPTCHA_KEY',
            'value' => '',
            'description' => 'RECAPTCHA_KEY',
            'type'=>'String',
        ]);
        Param::create([
            'key' => 'GOOGLE_RECAPTCHA_SECRET',
            'value' => '',
            'description' => 'RECAPTCHA_SECRET',
            'type'=>'String',
        ]);
    }
}
