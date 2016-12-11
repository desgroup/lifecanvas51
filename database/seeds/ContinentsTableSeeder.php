<?php

use Illuminate\Database\Seeder;

class ContinentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete countries table records
        DB::table('continents')->delete();

        //insert default records
        DB::table('continents')->insert(array(
                array('continent_code' => 'AF', 'continent_name' => 'Africa', 'un_code' => '002'),
                array('continent_code' => 'AN', 'continent_name' => 'Antarctica', 'un_code' => null),
                array('continent_code' => 'AS', 'continent_name' => 'Asia', 'un_code' => '142'),
                array('continent_code' => 'EU', 'continent_name' => 'Europe', 'un_code' => '150'),
                array('continent_code' => 'NA', 'continent_name' => 'North America', 'un_code' => '019'),
                array('continent_code' => 'OC', 'continent_name' => 'Oceania', 'un_code' => '009'),
                array('continent_code' => 'SA', 'continent_name' => 'South America', 'un_code' => '019')
            )
        );
    }
}
