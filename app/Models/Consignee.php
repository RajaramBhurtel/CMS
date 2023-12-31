<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $lastConsignee = self::orderBy('id', 'desc')->first();
            $lastConsigneeId = $lastConsignee ? $lastConsignee->consignee_id : 'CO000';

            $model->consignee_id = 'CO' . str_pad((int)substr($lastConsigneeId, 2) + 1, 3, '0', STR_PAD_LEFT);
        });
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'consignee_id', 'consignee_id');
    }
}
