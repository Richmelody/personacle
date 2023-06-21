<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all(['id', 'subtype']);

        $timestamp = \now();

        $questions = \collect([
            [
                "id" => 1,
                "question" => "I Get so involved with things that I forget time",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 2,
                "question" => "I have a vivid imagination",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 3,
                "question" => "If given the opportunity, I would love to be an artist",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 4,
                "question" => "I love creating novelty",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 5,
                "question" => "I believe children should be allowed to express themselves fully",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 6,
                "question" => "I believe that there is no absolute right or wrong",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 7,
                "question" => "I can handle a lot of information",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 8,
                "question" => "I understand better when things are explained slowly",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 9,
                "question" => "Prefer variety to routine",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 10,
                "question" => "I am always engaging in new things",
                "type" => "personality trait",
                "subtype" => "openness to experience",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 11,
                "question" => "I get chores done right away",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 12,
                "question" => "I stick to fully accomplishing my new year resolutions",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 13,
                "question" => "I often forget to put things back in their proper place",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 14,
                "question" => "I believe that everything must be done according to a specified plan",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 15,
                "question" => "I often make last-minute plans",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 16,
                "question" => "I believe strongly in the saying “we live but once, so live life to its fullest”",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 17,
                "question" => "I always turn plans into action",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 18,
                "question" => "I demand quality no matter the cost",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 19,
                "question" => "I set high standards for myself and others",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 20,
                "question" => "I follow through on my commitments",
                "type" => "personality trait",
                "subtype" => "conscentiousnes",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 21,
                "question" => "I make friends easily",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 22,
                "question" => "I usually keep others at a distance",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 23,
                "question" => "I believe in expressing oneself even if doing so hurts other people's feelings",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 24,
                "question" => " I can talk and persuade others into doing things",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 25,
                "question" => "I make it a priority to have a lot of fun",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 26,
                "question" => "I am often too serious with life",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 27,
                "question" => "I love large parties",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 28,
                "question" => "I absolutely love surprise parties",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 29,
                "question" => "I get easily bored with routine",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 30,
                "question" => "I am always busy, always on the go",
                "type" => "personality trait",
                "subtype" => "extraversion",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 31,
                "question" => "I easily trust others",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 32,
                "question" => "I believe that no one is absolutely good, most people are selfish",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 33,
                "question" => "I anticipate the needs of others",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 34,
                "question" => "I usually act to promote the welfare of others, even if it comes at a cost to myself",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 35,
                "question" => "I strongly believe that if you don't talk about your achievements, no one will",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 36,
                "question" => "I can't stand weak people",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 37,
                "question" => "I dislike soft-hearted people",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],
            [
                "id" => 38,
                "question" => "I am easy to satisfy",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 39,
                "question" => "Have a good word for everyone",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 40,
                "question" => "I worry about many things",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 41,
                "question" => "I get stressed out easily",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 42,
                "question" => "I tend to focus on the negative side of life",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 43,
                "question" => "I am quick-tempered",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 44,
                "question" => "I get easily irritated",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 45,
                "question" => "I tend to focus intensely on my misfortune",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 46,
                "question" => "I panic easily",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 47,
                "question" => "I usually get overwhelmed by emotions",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 48,
                "question" => "I tend to disagree a lot",
                "type" => "personality trait",
                "subtype" => "agreeableness",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 49,
                "question" => "I am often too conscious of making mistakes",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 50,
                "question" => "I am not bothered by difficult social situations",
                "type" => "personality trait",
                "subtype" => "neuroticism",
                "min_score" => 5,
                "max_score" => 1,
                "score_step" => 1
            ],

            // temperament
            [
                "id" => 51,
                "question" => "I give priority to details and organisation",
                "type" => "temperament",
                "subtype" => "melancholy",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 52,
                "question" => "I set exacting standards ",
                "type" => "temperament",
                "subtype" => "melancholy",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 53,
                "question" => "I tend to experience my feeling intensly",
                "type" => "temperament",
                "subtype" => "melancholy",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 54,
                "question" => "I prefer operating within guidelines",
                "type" => "temperament",
                "subtype" => "melancholy",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 55,
                "question" => "I like accuracy",
                "type" => "temperament",
                "subtype" => "melancholy",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 56,
                "question" => "I give priority to supporting others",
                "type" => "temperament",
                "subtype" => "phelgmatic",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 57,
                "question" => "I find it difficult to say no",
                "type" => "temperament",
                "subtype" => "phelgmatic",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 58,
                "question" => "I prefer cooperation over competition",
                "type" => "temperament",
                "subtype" => "phelgmatic",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 59,
                "question" => "I am not easily excited",
                "type" => "temperament",
                "subtype" => "phelgmatic",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 60,
                "question" => "I tend to listen more and talk less",
                "type" => "temperament",
                "subtype" => "phelgmatic",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 61,
                "question" => "I give priority to achieving results",
                "type" => "temperament",
                "subtype" => "choleric",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 62,
                "question" => "I seek out challenges",
                "type" => "temperament",
                "subtype" => "choleric",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 63,
                "question" => "I am more likely to confront issues head-on than avoid them",
                "type" => "temperament",
                "subtype" => "choleric",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 64,
                "question" => "I am comfortable with expressing disagreement and challenging others when I believe it's necessary to advocate for my perspective",
                "type" => "temperament",
                "subtype" => "choleric",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 65,
                "question" => "My energy levels are generally high, and I can feel restless or impatient if things are not moving at the pace I desire",
                "type" => "temperament",
                "subtype" => "choleric",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 66,
                "question" => "I give priority to creating a friendly environment",
                "type" => "temperament",
                "subtype" => "sanguine",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 67,
                "question" => "I have a very high social energy",
                "type" => "temperament",
                "subtype" => "sanguine",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 68,
                "question" => "I tend to act more on impulses",
                "type" => "temperament",
                "subtype" => "sanguine",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 69,
                "question" => "I'm the life of the party",
                "type" => "temperament",
                "subtype" => "sanguine",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
            [
                "id" => 70,
                "question" => "I don't find it difficult expressing my feelings",
                "type" => "temperament",
                "subtype" => "sanguine",
                "min_score" => 1,
                "max_score" => 5,
                "score_step" => 1
            ],
        ]);

        $questions->transform(function (array $question) use ($categories, $timestamp) {
            $category = $categories->where('subtype', $question['subtype'])->first();
            return [
                "id" => $question['id'],
                "uuid" => Uuid::uuid4()->toString(),
                "category_id" => $category->id,
                "question" => $question['question'],
                "min_score" => $question['min_score'],
                "max_score" => $question['max_score'],
                "score_step" => $question['score_step'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        });

        DB::table('questions')->insert($questions->toArray());
    }
}
