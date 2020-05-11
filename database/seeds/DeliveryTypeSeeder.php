<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $data = [
                'name' => $faker->name(),
                'cost' => $faker->randomFloat(1, 1,100),
            ];

            DB::table('delivery_types')->insert($data);
        }
    }
}
