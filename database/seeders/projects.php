<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class projects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('projects')->insert([
        [
        'id' => 1,
        'name'=> 'RefactorCart',
      ],
        [
        'id' => 2,
        'name'=> 'Payment',
      ],
        [
        'id' => 3,
        'name'=> 'Booking',
      ],
        [
        'id' => 4,
        'name'=> 'homepage',
      ]
    ]);
    }
}
