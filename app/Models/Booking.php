<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];

     public function consignee() {
        return $this->belongsTo(Consignee::class, 'consignee_id', 'consignee_id');
    }

    public function merchandise() {
        return $this->belongsTo(Merchandise::class, 'merchandise_code', 'merchandise_code');
    }

    public function manifest()
    {
        return $this->belongsTo(Manifest::class, 'menifests_code', 'menifests_code');
    }
}
