<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class teams extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('teams')->insert([
        [
        'id' => 1,
        'name'=> 'Transaction',
      ],
        [
        'id' => 2,
        'name'=> 'Affiliate',
      ],
        [
        'id' => 3,
        'name'=> 'QA',
      ],
        [
        'id' => 4,
        'name'=> 'Back Office',
      ],
    ]);
  }
}
