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
     * @throws Exception
     */
    public function run(Faker $faker)
    {
        $data = [
            [
                'name' => 'Кур\'єр',
                'cost' => random_int(25,100),
            ],
            [
                'name' => 'Самовивіз',
                'cost' => random_int(25,100),
            ],
            [
                'name' => 'Експрес доставка',
                'cost' => random_int(25,100),
            ],
            [
                'name' => 'Експрес кур\'єр',
                'cost' => random_int(25,100),
            ],
            [
                'name' => 'Особисто в руки',
                'cost' => random_int(25,100),
            ],
        ];

        DB::table('delivery_types')->insert($data);
    }
}
