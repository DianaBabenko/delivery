<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Date;

/**
 * Class Invoice
 * @package App\Models
 * @property integer id
 * @property string code
 * @property integer sender_id
 * @property integer recipient_id
 * @property integer from_department_id
 * @property integer to_department_id
 * @property date departure_date
 * @property date delivery_date
 * @property integer delivery_type_id
 * @property float price
 */
class Invoice extends Model
{
    protected $fillable = [
        'code',
        'sender_id',
        'recipient_id',
        'from_department_id',
        'to_department_id',
        'departure_date',
        'delivery_date',
        'delivery_type_id',
        'price'
    ];

    protected $casts = [
        'delivery_date'     => 'datetime',
        'departure_date'    => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Recipient::class, 'recipient_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function from_department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'from_department_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function parcels(): BelongsToMany
    {
        return $this->belongsToMany(
          Parcel::class,
          'invoice_parcels',
          'parcel_id',
          'invoice_id',
          'id',
          'id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function to_department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'to_department_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function delivery_type(): BelongsTo
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id', 'id');
    }
}
