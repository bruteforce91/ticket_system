<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class taskProject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('task-project')->insert([
        [
        'id' => 1,
        'taskID'=> 1,
        'projectID'=>1,
      ],
      [
        'id' => 2,
        'taskID'=> 2,
        'projectID'=>1,
      ],
      ]);
    }
}
