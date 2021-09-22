<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(commits::class);
        $this->call(employees::class);
        $this->call(projects::class);
        $this->call(Roles::class);
        $this->call(tasks::class);
        $this->call(teams::class);
        $this->call(tickets::class);
        // $this->call(roleEmployee::class);
        $this->call(users::class);
        // $this->call(taskEmployee::class);
        // $this->call(projectEmployee::class);
        $this->call(taskProject::class);
        // $this->call(userEmployee::class);
    }
  }
