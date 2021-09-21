<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class projectEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('project-employee')->insert([
        [
        'id' => 1,
        'projectID'=> 1,
        'employeeID'=>3,
      ],
      [
        'id' => 2,
        'projectID'=> 1,
        'employeeID'=>3,
      ],
      ]);
    }
}
