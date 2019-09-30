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
    }
}
