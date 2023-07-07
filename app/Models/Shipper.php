<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;
    protected $fillable = ['shipper_id', 'name', 'address', 'phone', 'email'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $lastShipper = self::orderBy('id', 'desc')->first();
            $lastShipperId = $lastShipper ? $lastShipper->shipper_id : 'SH000';

            $model->shipper_id = 'SH' . str_pad((int)substr($lastShipperId, 2) + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
