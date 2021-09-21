<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class userEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('user-employee')->insert([
        [
        'id' => 1,
        'userID'=> 1,
        'employeeID'=>1,
      ],
      //   [
      //   'id' => 2,
      //   'userID'=> 2,
      //   'employeeID'=>2,
      // ],
      // [
      //   'id' => 3,
      //   'userID'=> 3,
      //   'employeeID'=>3,
      // ],
      ]);
    }
}
