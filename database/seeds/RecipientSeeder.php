<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipientSeeder extends Seeder
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
                'name' => 'Євген',
                'surname' => 'Боров',
                'patronymic' => 'Вікторович',
                'phone' => '+380979598595',
            ],

            [
                'name' => 'Юлія',
                'surname' => 'Котенко',
                'patronymic' => 'Сегріївна',
                'phone' => '+380952859595',
            ],

            [
                'name' => 'Анастасія',
                'surname' => 'Стороженко',
                'patronymic' => 'Олегівна',
                'phone' => '+380959590395',
            ],

            [
                'name' => 'Анатолій',
                'surname' => 'Білоніг',
                'patronymic' => 'Ігоревич',
                'phone' => '+380959515925',
            ],

            [
                'name' => 'Богдан',
                'surname' => 'Омельченко',
                'patronymic' => 'Володимирович',
                'phone' => '+380936595945',
            ],

            [
                'name' => 'Ярослав',
                'surname' => 'Ільніцький',
                'patronymic' => 'Сергійович',
                'phone' => '+380931959595',
            ],

            [
                'name' => 'Богдан',
                'surname' => 'Пронкуров',
                'patronymic' => 'Андрійович',
                'phone' => '+380969596595',
            ],

            [
                'name' => 'Назар',
                'surname' => 'Комісаренко',
                'patronymic' => 'Вікторович',
                'phone' => '+380956792595',
            ],

            [
                'name' => 'Ярослав',
                'surname' => 'Мельник',
                'patronymic' => 'Вікторович',
                'phone' => '+380959584995',
            ],

            [
                'name' => 'Дарина',
                'surname' => 'Найбоченко',
                'patronymic' => 'Олегівна',
                'phone' => '+380950995951',
            ],

            [
                'name' => 'Вікторія',
                'surname' => 'Васильєва',
                'patronymic' => 'Олегівна',
                'phone' => '+380954595956',
            ],

            [
                'name' => 'Марія',
                'surname' => 'Гордієнко',
                'patronymic' => 'Павлівна',
                'phone' => '+380949595957',
            ],

            [
                'name' => 'Євгенія',
                'surname' => 'Квітчата',
                'patronymic' => 'Сергіївна',
                'phone' => '+380959505954',
            ],

            [
                'name' => 'Олкесандра',
                'surname' => 'Соломаха',
                'patronymic' => 'Вікторівна',
                'phone' => '+380956345955',
            ],

            [
                'name' => 'В\'ячеслав',
                'surname' => 'Дорошенко',
                'patronymic' => 'Володимирович',
                'phone' => '+380959595957',
            ],
        ];

        DB::table('recipients')->insert($data);
    }
}
