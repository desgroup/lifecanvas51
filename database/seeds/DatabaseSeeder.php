<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ZonesTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('ContinentsTableSeeder');
        $this->call('ContinentsCountriesTableSeeder');

        Model::reguard();
    }
}
