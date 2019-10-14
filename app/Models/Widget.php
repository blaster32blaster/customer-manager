<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Widget
 * @package App\Models
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property mixed $subscriptions
 */
class Widget extends Model
{
    protected $fillable = ['name', 'price'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
