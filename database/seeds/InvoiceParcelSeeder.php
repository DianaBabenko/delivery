<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceParcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        for ($i = 1; $i < 16; $i++) {
            $data = [
              'invoice_id' => random_int(1, 7),
              'parcel_id' => random_int(1, 7),
            ];

            DB::table('invoice_parcels')->insert($data);
        }
    }
}
