<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Recipient
 * @package App\Models
 * @property int id
 * @property string name
 * @property string surname
 * @property string patronymic
 * @property string phone
 */
class Recipient extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'phone',
    ];
}
