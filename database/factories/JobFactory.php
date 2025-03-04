<?php

namespace Database\Factories;

use App\Models\Employer;
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
        'employer_id' => Employer::factory(),
         'title' => $title,
         'salary' => fake()->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
         'location' => 'Remote',
         'schedule' => 'Full Time',
         'job_overview' => fake()->paragraph(2), // New field
            'responsibilities' =>fake()->sentence(10),
            'qualifications' => fake()->sentence(12),
            'how_to_apply' => 'Send your resume to ' . fake()->email(), 
         'featured' => false,
        ];
    }
}
