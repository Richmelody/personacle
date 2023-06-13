<?php

namespace Database\Factories;

use App\Enums\QuestionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(QuestionType::cases());
        $subtype = $this->faker->randomElement(QuestionType::getSubTypesByType($type));

        return [
            'uuid' => $this->faker->uuid(),
            'type' => $type->value,
            'subtype' => $subtype,
        ];
    }
}
