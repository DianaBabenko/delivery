<?php

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
        $this->call(UserSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DeliveryTypeSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(ParcelSeeder::class);
    }
}
