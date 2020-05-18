<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryType
 * @package App\Models
 * @property string name
 * @property float cost
 */
class DeliveryType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'cost',
    ];
}
