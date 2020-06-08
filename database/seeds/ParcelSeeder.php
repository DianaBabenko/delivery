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
        $descriptions = [
            'Смартфон та навушники',
            'В посилкі косметика та парфуми',
            'Електронний годинник',
            'Конструктор лего',
            'Посуд та кухонні ваги',
            'Музичні інструменти',
            'Набір для вишивання',
            '2 пари взуття',
            'Набір косметики',
            'Набір посуду',
            'Зоо товари',
            'Новорічні прикраси',
            'Ковдра та подушки',
            'Гаманець та годинник',
        ];

        for ($i = 0; $i < 15; $i++) {

            $width = $faker->randomFloat(1, 1, 50);
            $height = $faker->randomFloat(1, 1, 50);
            $length = $faker->randomFloat(1, 1, 50);

            $volume = $width * $height * $length;
            $index = random_int(1, 14);
            $data = [
                'weight' => $faker->randomFloat(1, 1, 100),
                'length' => $length,
                'width' => $width,
                'height' => $height,
                'volume' => $volume,
                'description' => $descriptions[$index],
                'invoice_id' => random_int(1, 15),
                'cost' => $faker->randomFloat(1, 1, 100),
            ];

            DB::table('parcels')->insert($data);
        }
    }
}
