<?php

use Illuminate\Database\Seeder;
use App\SportsUserTypes;

class SportsUserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SportsUserTypes::create(
            ['user_type'=>'Coach']);
        
        SportsUserTypes::create(
            ['user_type'=>'Athlete']);
    }
}
