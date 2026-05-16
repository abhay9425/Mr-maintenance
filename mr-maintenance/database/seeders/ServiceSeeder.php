<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name'        => 'Electrician',
                'description' => 'Expert electrical repairs, installations, wiring, switch fittings, and all electrical maintenance needs handled by certified technicians.',
                'category'    => 'electrical',
                'price'       => 249.00,
                'icon_class'  => 'fas fa-bolt',
            ],
            [
                'name'        => 'Plumbing',
                'description' => 'Professional plumbing services including pipe repairs, leak fixing, tap installations, drain cleaning, and bathroom fittings.',
                'category'    => 'plumbing',
                'price'       => 249.00,
                'icon_class'  => 'fas fa-faucet',
            ],
            [
                'name'        => 'Carpenter',
                'description' => 'Skilled carpentry work for furniture assembly, door & window repairs, wooden flooring, and custom woodwork solutions.',
                'category'    => 'carpentry',
                'price'       => 249.00,
                'icon_class'  => 'fas fa-hammer',
            ],
            [
                'name'        => 'Appliance Repair',
                'description' => 'Complete home appliance repair services for washing machines, microwaves, geysers, and other household electronics.',
                'category'    => 'appliance',
                'price'       => 249.00,
                'icon_class'  => 'fas fa-blender',
            ],
            [
                'name'        => 'Refrigerator',
                'description' => 'Expert refrigerator repair & maintenance including cooling issues, compressor service, gas refilling, and door gasket replacement.',
                'category'    => 'appliance',
                'price'       => 249.00,
                'icon_class'  => 'fas fa-temperature-low',
            ],
            [
                'name'        => 'Air Conditioner',
                'description' => 'AC installation, servicing, gas charging, cleaning, repair, and annual maintenance contracts for all brands and models.',
                'category'    => 'appliance',
                'price'       => 249.00,
                'icon_class'  => 'fas fa-wind',
            ],
            [
                'name'        => 'Visit Charge',
                'description' => 'Book a technician visit at an affordable price. Our expert will diagnose and provide a detailed quote for your requirement.',
                'category'    => 'general',
                'price'       => 99.00,
                'icon_class'  => 'fas fa-home',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                array_merge($service, ['slug' => Str::slug($service['name']), 'is_active' => true])
            );
        }
    }
}
