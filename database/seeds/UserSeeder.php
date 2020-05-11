<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор не известен',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'address' => 'SomeA',
                'birthday' => \Faker\Provider\DateTime::dateTime(),
                'phone' => '+38095959595',
                'email' => 'anonim@gmail.com',
                'password' => bcrypt('password'),

            ],

            [
                'name' => 'Автор',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'address' => 'SomeA',
                'phone' => '+38095659595',
                'birthday' => \Faker\Provider\DateTime::dateTime(),
                'email' => 'author@gmail.com',
                'password' => bcrypt('password'),

            ],

            [
                'name' => 'Diana',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'address' => 'SomeA',
                'phone' => '+38085959595',
                'birthday' => \Faker\Provider\DateTime::dateTime(),
                'email' => 'babenko@gmail.com',
                'password' => bcrypt('password'),

            ],
        ];

        DB::table('users')->insert($data);
    }
}
