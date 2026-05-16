<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $team = [
            ['name' => 'Rohit Pandey',   'role' => 'Senior Electrician',    'is_active' => true],
            ['name' => 'Manoj Verma',    'role' => 'AC & Refrigerator Specialist', 'is_active' => true],
            ['name' => 'Suresh Mishra',  'role' => 'Plumbing & Carpentry Expert',  'is_active' => true],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }
    }
}
