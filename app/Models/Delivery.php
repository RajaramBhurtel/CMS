<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $lastDelivery = self::orderBy('id', 'desc')->first();
            $lastDeliveryId = $lastDelivery ? $lastDelivery->delivery_code : 'DV000';

            $model->delivery_code  = 'DV' . str_pad((int)substr($lastDeliveryId, 2) + 1, 3, '0', STR_PAD_LEFT);
        });
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'delivery_code', 'delivery_code');
    }
}
