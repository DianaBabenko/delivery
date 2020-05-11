<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++ ) {
            $data = [
                'name' => 'Some Dep',
                'address' => 'Some Add',
            ];

            DB::table('departments')->insert($data);
        }
    }
}
