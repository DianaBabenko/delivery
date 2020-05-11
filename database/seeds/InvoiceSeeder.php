<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class InvoiceSeeder extends Seeder
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
                'code' => strtoupper(sha1($faker->name)),
                'sender_id' => random_int(1,3),
                'recipient_id' => random_int(1,10),
                'from_department_id' => random_int(1,10),
                'to_department_id' => random_int(1,10),
                'departure_date' => $faker->dateTime(),
                'delivery_date' => $faker->dateTime(),
                'delivery_type_id' => random_int(1,15),
            ];

            DB::table('invoices')->insert($data);
        }
    }
}
