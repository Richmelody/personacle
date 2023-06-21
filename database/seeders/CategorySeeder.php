<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = \now();

        $categories = collect([
            [
                "type" => "temperament",
                "subtype" => "melancholy"
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
                "subtype" => "sanguine"
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
        ]);

        $categories->transform(function ($category) use ($timestamp)
        {
            return [
                "uuid" => Uuid::uuid4()->toString(),
                ...$category,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        });
        
        DB::table('categories')->insert($categories->toArray());
    }
}
