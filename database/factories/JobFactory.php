<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    
    {
        $title = fake()->jobTitle();
        return [
        'user_id' => User::factory(),
         'title' => $title,
         'salary' => fake()->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
         'location' => 'Remote',
         'schedule' => 'Full Time',
         'job_overview' => fake()->paragraph(10), // New field
            'responsibilities' =>fake()->paragraph(10),
            'compensations' =>fake()->paragraph(10),
            'qualifications' => fake()->paragraph(10),
            'how_to_apply' => 'Send your resume to ' . fake()->email(), 
         'featured' => false,
        ];
    }
}
