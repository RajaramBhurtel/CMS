<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;
    protected $fillable = ['merchandise_code', 'name'];

     public function bookings()
    {
        return $this->hasMany(Booking::class, 'merchandise_code', 'merchandise_code');
    }
}
