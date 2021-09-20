<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class tickets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tickets')->insert([
        'id' => 1,
        'employeeID'=> 1,
        'time'=>'2021-09-20 09:02:50',
        'type'=> "in",
      ]);
      DB::table('tickets')->insert([
        'id' => 2,
        'employeeID'=> 1,
        'time'=>'2021-09-22 18:00:06',
        'type'=> "out",
      ]);
    }
}
