<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AmcPlan;

class AmcPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name'              => 'Basic Plan',
                'price'             => 3999.00,
                'preventive_visits' => 2,
                'emergency_visits'  => 8,
                'response_time'     => '24–48 hours',
                'discount_percent'  => 0,
                'is_popular'        => false,
                'features'          => [
                    '2 Preventive Maintenance Visits/year',
                    '8 Emergency Service Visits/year',
                    '24–48 Hour Response Time',
                    'Certified Technicians',
                    'Phone Support',
                ],
            ],
            [
                'name'              => 'Standard Plan',
                'price'             => 9999.00,
                'preventive_visits' => 3,
                'emergency_visits'  => 18,
                'response_time'     => '12–24 hours',
                'discount_percent'  => 10,
                'is_popular'        => true,
                'features'          => [
                    '3 Preventive Maintenance Visits/year',
                    '18 Emergency Service Visits/year',
                    '12–24 Hour Priority Response',
                    '10% Discount on Parts & Materials',
                    'Priority Scheduling',
                    'Dedicated Support Line',
                ],
            ],
            [
                'name'              => 'Premium Plan',
                'price'             => 19999.00,
                'preventive_visits' => 4,
                'emergency_visits'  => 32,
                'response_time'     => '6–12 hours',
                'discount_percent'  => 25,
                'is_popular'        => false,
                'features'          => [
                    '4 Preventive Maintenance Visits/year',
                    '32 Emergency Service Visits/year',
                    '6–12 Hour Express Response',
                    '25% Discount on Parts & Materials',
                    'VIP Priority Scheduling',
                    '24/7 Dedicated Support',
                    'Free Annual Home Inspection',
                ],
            ],
        ];

        foreach ($plans as $plan) {
            AmcPlan::updateOrCreate(['name' => $plan['name']], $plan);
        }
    }
}
