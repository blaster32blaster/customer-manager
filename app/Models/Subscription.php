<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscription
 * @package App\Models
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property mixed $customer
 * @property mixed $address
 * @property mixed $widget
 */
class Subscription extends Model
{
    protected $fillable = ['expiration_date', 'frequency', 'day', 'day_interval', 'customer_id', 'address_id', 'widget_id'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function widget()
    {
        return $this->belongsTo(Widget::class);
    }
}
