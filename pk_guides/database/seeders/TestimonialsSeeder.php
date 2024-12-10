<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialsSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Business Owner',
                'content' => 'As a business owner, I\'m constantly looking for new experiences to help reinforce what I provide to my customers. The welcoming and facilities offered by the company were extraordinary.',
                'designation' => 'Business Owner',
                'is_active' => true
            ],
            [
                'name' => 'Happy Traveler',
                'content' => 'We wanted to do something different on our holiday besides just the usual relaxing on beach. You know it would be good to do that something extra that was fun, exciting and energetic.',
                'designation' => 'Tourist',
                'is_active' => true
            ],
            [
                'name' => 'Satisfied Client',
                'content' => 'The teaching and instruction are absolutely dynamic; they have the ability to plan and organise the events at a level suited to the client.',
                'designation' => 'Regular Customer',
                'is_active' => true
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
