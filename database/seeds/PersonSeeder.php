<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
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
                'phone' => '+38097959595',
            ],

            [
                'name' => 'Автор',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095859595',
            ],

            [
                'name' => 'Diana',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38085959095',
            ],

            [
                'name' => 'Автор не известен',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095951595',
            ],

            [
                'name' => 'Автор',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38093659595',
            ],

            [
                'name' => 'Diana',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38080959595',
            ],

            [
                'name' => 'Автор не известен',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38076959595',
            ],

            [
                'name' => 'Автор',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095679595',
            ],

            [
                'name' => 'Diana',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38085958995',
            ],

            [
                'name' => 'Автор не известен',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095099595',
            ],

            [
                'name' => 'Автор',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095459595',
            ],

            [
                'name' => 'Diana',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38084959595',
            ],

            [
                'name' => 'Автор не известен',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095950595',
            ],

            [
                'name' => 'Автор',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38095634595',
            ],

            [
                'name' => 'Diana',
                'surname' => 'SomeS',
                'patronymic' => 'SomeP',
                'phone' => '+38085959595',
            ],
        ];

        DB::table('persons')->insert($data);
    }
}
