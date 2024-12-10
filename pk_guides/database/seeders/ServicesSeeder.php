<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        $services = [
            [
                'name' => 'Outdoors Safety Courses',
                'description' => 'Stay safe while exploring the outdoors with our professional safety training courses.',
                'icon' => '🛡️',
                'is_active' => true
            ],
            [
                'name' => 'Cycle Tours',
                'description' => 'Explore the scenic and adventurous rail trails on our cycle tours.',
                'icon' => '🚴',
                'is_active' => true
            ],
            [
                'name' => 'Fun Trips',
                'description' => 'Join us for bike trips through Islamabad forests or take part in our Murree Adventure Course.',
                'icon' => '🏃',
                'is_active' => true
            ],
            [
                'name' => 'Package Trips',
                'description' => 'Complete packages including accommodation, bike hire, and pack hire.',
                'icon' => '📦',
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}