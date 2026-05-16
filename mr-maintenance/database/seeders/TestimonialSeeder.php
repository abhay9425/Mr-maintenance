<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name'      => 'Rajesh Kumar',
                'city'      => 'Varanasi',
                'rating'    => 5,
                'review'    => 'Mr. Maintenance fixed our AC within 2 hours of booking. The technician was professional, polite and cleaned up after the work. Highly recommend!',
                'is_active' => true,
            ],
            [
                'name'      => 'Priya Sharma',
                'city'      => 'Varanasi',
                'rating'    => 5,
                'review'    => 'Excellent plumbing service! They fixed our kitchen pipe leak the same day. Very transparent about pricing — no hidden charges. Will definitely use again.',
                'is_active' => true,
            ],
            [
                'name'      => 'Amit Singh',
                'city'      => 'Sarnath',
                'rating'    => 4,
                'review'    => 'Got our refrigerator repaired at a very reasonable price. The AMC plan is also a great value for money. Their Standard plan saved me ₹2000 in repairs this year alone.',
                'is_active' => true,
            ],
            [
                'name'      => 'Sunita Gupta',
                'city'      => 'Varanasi',
                'rating'    => 5,
                'review'    => 'Best home maintenance service in Varanasi. The electrician came on time and fixed all our wiring issues professionally. The booking process was very simple.',
                'is_active' => true,
            ],
            [
                'name'      => 'Vikram Tiwari',
                'city'      => 'Varanasi',
                'rating'    => 5,
                'review'    => 'I have been using Mr. Maintenance for 2 years now. Their Premium AMC plan is totally worth it — quick response, skilled team, and great service quality every time.',
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
