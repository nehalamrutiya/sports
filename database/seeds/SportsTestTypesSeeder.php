<?php

use Illuminate\Database\Seeder;
use App\SportsTestTypes;

class SportsTestTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SportsTestTypes::create(
        ['test_type_name' => 'CooperTest']);
        
        SportsTestTypes::create(
        ['test_type_name' => '100MeterSprint']);
    }
}
