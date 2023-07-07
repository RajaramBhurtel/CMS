<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    use HasFactory;

    protected $fillable = ['consignee_id', 'name', 'address', 'phone', 'email'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $lastConsignee = self::orderBy('id', 'desc')->first();
            $lastConsigneeId = $lastConsignee ? $lastConsignee->consignee_id : 'CO000';

            $model->consignee_id = 'SH' . str_pad((int)substr($lastConsigneeId, 2) + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
