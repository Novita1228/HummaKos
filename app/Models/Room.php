<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function activeTenant()
    {
        return $this->hasOne(Tenant::class)->where('status', 'active')->latest();
    }
}
