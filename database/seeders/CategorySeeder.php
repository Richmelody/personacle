<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "type" => "temperament",
                "subtype" => "sanguine"
            ],
            [
                "type" => "temperament",
                "subtype" => "phelgmatic"
            ],
            [
                "type" => "temperament",
                "subtype" => "choleric"
            ],
            [
                "type" => "temperament",
                "subtype" => "melancholy"
            ],
            [
                "type" => "personality trait",
                "subtype" => "openness to experience"
            ],
            [
                "type" => "personality trait",
                "subtype" => "conscentiousnes"
            ],
            [
                "type" => "personality trait",
                "subtype" => "extraversion"
            ],
            [
                "type" => "personality trait",
                "subtype" => "agreeableness"
            ],
            [
                "type" => "personality trait",
                "subtype" => "neuroticism"
            ],
        ];
    }
}
