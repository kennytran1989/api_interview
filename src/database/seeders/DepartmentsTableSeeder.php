<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1; $i < 10; $i++){
            \App\Models\Department::create([
                'dep_name' => 'Department-'. $i
            ]);
        }
    }
}
