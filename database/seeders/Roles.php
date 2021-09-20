<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        [
        'id' => 1,
        'role'=> 'CEO',
      ],
        [
        'id' => 2,
        'role'=> 'PM',
      ],
        [
        'id' => 3,
        'role'=> 'DEV',
      ],
    ]);
  }
}
