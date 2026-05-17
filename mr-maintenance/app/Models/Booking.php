<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'phone', 'city', 'address', 'service_id', 'booking_date', 'message', 'status'];

    protected $casts = ['booking_date' => 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'confirmed'  => 'badge-confirmed',
            'completed'  => 'badge-completed',
            'cancelled'  => 'badge-cancelled',
            default      => 'badge-pending',
        };
    }
}
