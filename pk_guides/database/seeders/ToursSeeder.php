<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;


class ToursSeeder extends Seeder
{
    public function run(): void
    {
        $tours = [
            [
                'name' => 'Scenic Rail Trail',
                'description' => 'A breathtaking journey through Pakistan\'s most scenic railway routes, perfect for photography enthusiasts and nature lovers.',
                'price' => 5000.00,
                'duration' => '3 hours',
                'type' => 'scenic',
                'image' => 'tours/scenic-rail-trail.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Adventurous Rail Trail',
                'description' => 'For thrill-seekers, this trail combines challenging terrains with stunning viewpoints.',
                'price' => 7000.00,
                'duration' => '4 hours',
                'type' => 'adventure',
                'image' => 'tours/adventure-rail-trail.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Islamabad Forest & Bike Trip',
                'description' => 'Explore the beautiful forests of Islamabad on our specially designed bike trails.',
                'price' => 6000.00,
                'duration' => '5 hours',
                'type' => 'fun_trip',
                'image' => 'tours/islamabad-forest.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Murree Adventure Course',
                'description' => 'Experience the thrill of our adventure course in the scenic hills of Murree.',
                'price' => 8000.00,
                'duration' => '6 hours',
                'type' => 'adventure',
                'image' => 'tours/murree-adventure.jpg',
                'is_active' => true
            ],
        ];

        foreach ($tours as $tour) {
            Tour::create($tour);
        }
    }
}
