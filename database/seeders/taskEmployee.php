<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class taskEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('task-employee')->insert([
        [
        'id' => 1,
        'taskID'=> 1,
        'employeeID'=>null,
      ],
      [
        'id' => 2,
        'taskID'=> 2,
        'employeeID'=>null,
      ],
      ]);
    }
}
