<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Parcel
 * @package App\Models
 * @property float weight
 * @property float length
 * @property float width
 * @property float height
 * @property float volume
 * @property string description
 * @property integer invoice_id
 * @property float cost
 */
class Parcel extends Model
{
    protected $fillable = [
      'weight',
      'length',
      'width',
      'height',
      'volume',
      'description',
      'invoice_id',
      'cost',
    ];

    /**
     * @return BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(
            Invoice::class,
            'invoice_parcels',
            'invoice_id',
            'parcel_id',
            'id',
            'id'
        );
    }
}
