<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmcPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'features', 'preventive_visits', 'emergency_visits', 'response_time', 'discount_percent', 'is_popular'];

    protected $casts = ['features' => 'array', 'is_popular' => 'boolean', 'price' => 'decimal:2'];

    public function subscriptions()
    {
        return $this->hasMany(AmcSubscription::class, 'plan_id');
    }
}
