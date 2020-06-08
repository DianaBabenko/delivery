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
                'name' => 'Тетяна',
                'surname' => 'Бабенко',
                'patronymic' => 'Вікторівна',
                'address' => 'Черкаси, вул. Надпільна, 425',
                'birthday' => \Faker\Provider\DateTime::dateTimeBetween('-40 years', '-18 years'),
                'phone' => '+38095989595',
                'email' => 'babenkoTanya@gmail.com',
                'password' => bcrypt('password'),

            ],
            [
                'name' => 'Любов',
                'surname' => 'Кравченко',
                'patronymic' => 'Миколаівна',
                'address' => 'Черкаси, вул. Гагаріна, 56',
                'birthday' => \Faker\Provider\DateTime::dateTimeBetween('-60 years', '-18 years'),
                'phone' => '+38095959585',
                'email' => 'kravchenko@gmail.com',
                'password' => bcrypt('password'),

            ],
            [
                'name' => 'Віктор',
                'surname' => 'Дорошенко',
                'patronymic' => 'Іванович',
                'address' => 'Черкаси, вул. Благовісна, 89',
                'birthday' => \Faker\Provider\DateTime::dateTimeBetween('-60 years', '-18 years'),
                'phone' => '+38095959535',
                'email' => 'doroshenko@gmail.com',
                'password' => bcrypt('password'),

            ],

            [
                'name' => 'Віталій',
                'surname' => 'Онойко',
                'patronymic' => 'Сергійович',
                'address' => 'Черкаси, вул. Хоменка, 12',
                'phone' => '+38095659595',
                'birthday' =>\Faker\Provider\DateTime::dateTimeBetween('-22 years', '-18 years'),
                'email' => 'onoiko@gmail.com',
                'password' => bcrypt('password'),

            ],

            [
                'name' => 'Діана',
                'surname' => 'Бабенко',
                'patronymic' => 'Олегівна',
                'address' => 'Черкаси, бульв. Шевченка, 42',
                'phone' => '+380959509595',
                'birthday' => \Faker\Provider\DateTime::dateTimeBetween('-22 years', '-18 years'),
                'email' => 'babenko@gmail.com',
                'password' => bcrypt('password'),

            ],
        ];

        DB::table('users')->insert($data);
    }
}
