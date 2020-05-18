<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * @package App\Models
 * @property string name
 * @property string surname
 * @property string patronymic
 * @property string phone
 */
class Person extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'phone',
    ];
}
