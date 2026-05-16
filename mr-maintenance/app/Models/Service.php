<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'category', 'price', 'icon_class', 'is_active'];

    protected $casts = ['is_active' => 'boolean', 'price' => 'decimal:2'];

    // Local scope: only active services
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
