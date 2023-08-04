<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menifest extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $lastMenifest = self::orderBy('id', 'desc')->first();
            $lastMenifestId = $lastMenifest ? $lastMenifest->menifests_code : 'MN000';

            $model->menifests_code  = 'MN' . str_pad((int)substr($lastMenifestId, 2) + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
