<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * @package App\Models
 * @property string name
 * @property string address
 */
class Department extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name',
      'address',
    ];

}
