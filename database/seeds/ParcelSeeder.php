<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ParcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     * @throws Exception
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {

            $data = [
                'weight' => $faker->randomFloat(1, 1, 100),
                'length' => $faker->randomFloat(1, 1, 100),
                'width' => $faker->randomFloat(1, 1, 100),
                'height' => $faker->randomFloat(1, 1, 100),
                'volume' => $faker->randomFloat(1, 1, 100),
                'description' => $faker->text(),
                'invoice_id' => random_int(1, 7),
                'cost' => $faker->randomFloat(1, 1, 100),
            ];

            DB::table('parcels')->insert($data);
        }
    }
}
