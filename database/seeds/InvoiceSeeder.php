<?php

use Carbon\Carbon;
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

            $departure_date = $faker->dateTimeBetween('-10days', 'now');
            $delivery_date = (new DateTime($departure_date->format('Y-m-d')))
                ->add(new DateInterval('P3D'))
                ->format('Y-m-d H:i:s')
            ;

            $data = [
                'code' => strtoupper(substr(sha1($faker->name), 0, 20)),
                'sender_id' => 5,
                'recipient_id' => random_int(1,15),
                'from_department_id' => random_int(1,15),
                'to_department_id' => random_int(1,15),
                'departure_date' => $departure_date,
                'delivery_date' => $delivery_date,
                'delivery_type_id' => random_int(1,5),
            ];

            DB::table('invoices')->insert($data);
        }
    }
}
