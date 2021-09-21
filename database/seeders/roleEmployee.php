<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class roleEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('role-employee')->insert([
        [
        'id' => 1,
        'roleID'=> 1,
        'employeeID'=>1,
      ],
      [
      'id' => 2,
      'roleID'=> 3,
      'employeeID'=>2,
      ],
      [
      'id' => 3,
      'roleID'=> 2,
      'employeeID'=>3,
      ],
      ]);
    }
}
