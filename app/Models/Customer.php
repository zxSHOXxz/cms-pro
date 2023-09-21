<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $guarded = ['id', 'created_at', 'updated_at'];

    public function rank()
    {
        return $this->belongsTo(\App\Models\Rank::class);
    }

    public function purchace()
    {
        return $this->hasMany(\App\Models\Purchase::class);
    }
}
