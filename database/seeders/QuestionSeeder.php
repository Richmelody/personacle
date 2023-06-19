<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public static function getQuestion()
    {
        return
            [
                [
                    "id" => 1,
                    "question" => "I Get so involved with things that I forget time"
                ],
                [
                    "id" => 2,
                    "question" => "I have a vivid imagination."
                ],
                [
                    "id" => 3,
                    "question" => "If given the opportunity, I would love to be an artist."
                ],
                [
                    "id" => 4,
                    "question" => "I love creating novelty."
                ],
                [
                    "id" => 5,
                    "question" => "I believe children should be allowed to express themselves fully."
                ],
                [
                    "id" => 6,
                    "question" => "I believe that there is no absolute right or wrong."
                ],
                [
                    "id" => 7,
                    "question" => "I can handle a lot of information."
                ],
                [
                    "id" => 8,
                    "question" => "I understand better when things are explained slowly."
                ],
                [
                    "id" => 9,
                    "question" => "Prefer variety to routine"
                ],
                [
                    "id" => 10,
                    "question" => "I am always engaging in new things."
                ],
                [
                    "id" => 11,
                    "question" => "Get chores done right away."
                ],
                [
                    "id" => 12,
                    "question" => "I stick to fully accomplishing my new year resolutions"
                ],
                [
                    "id" => 13,
                    "question" => "I often forget to put things back in their proper place."
                ],
                [
                    "id" => 14,
                    "question" => "I believe that everything must be done according to a specified plan."
                ],
                [
                    "id" => 15,
                    "question" => "I often make last-minute plans."
                ],
                [
                    "id" => 16,
                    "question" => "I believe strongly in the saying “we live but once, so live life to its fullest.”"
                ],
                [
                    "id" => 17,
                    "question" => "I always turn plans into action."
                ],
                [
                    "id" => 18,
                    "question" => "I demand quality no matter the cost."
                ],
                [
                    "id" => 19,
                    "question" => "I set high standards for myself and others."
                ],
                [
                    "id" => 20,
                    "question" => "I follow through on my commitments."
                ],
                [
                    "id" => 21,
                    "question" => "I make friends easily."
                ],
                [
                    "id" => 22,
                    "question" => "I usually keep others at a distance."
                ],
                [
                    "id" => 23,
                    "question" => " I believe in expressing oneself even if doing so hurts other people's feelings."
                ],
                [
                    "id" => 24,
                    "question" => " I can talk and persuade others into doing things."
                ],
                [
                    "id" => 25,
                    "question" => "I make it a priority to have a lot of fun."
                ],
                [
                    "id" => 26,
                    "question" => "I am often too serious with life."
                ],
                [
                    "id" => 27,
                    "question" => "I love large parties."
                ],
                [
                    "id" => 28,
                    "question" => "I absolutely love surprise parties."
                ],
                [
                    "id" => 29,
                    "question" => "I get easily bored with routine."
                ],
                [
                    "id" => 30,
                    "question" => "I am always busy, always on the go."
                ],
                [
                    "id" => 31,
                    "question" => "I easily trust others."
                ],
                [
                    "id" => 32,
                    "question" => "I believe that no one is absolutely good, most people are selfish."
                ],
                [
                    "id" => 33,
                    "question" => "I anticipate the needs of others."
                ],
                [
                    "id" => 34,
                    "question" => "I usually act to promote the welfare of others, even if it comes at a cost to myself."
                ],
                [
                    "id" => 35,
                    "question" => "I strongly believe that if you don't talk about your achievements, no one will."
                ],
                [
                    "id" => 36,
                    "question" => "I can't stand weak people."
                ],
                [
                    "id" => 37,
                    "question" => "I dislike soft-hearted people."
                ],
                [
                    "id" => 38,
                    "question" => "I am easy to satisfy"
                ],
                [
                    "id" => 39,
                    "question" => "Have a good word for everyone."
                ],
                [
                    "id" => 40,
                    "question" => "I worry about many things."
                ],
                [
                    "id" => 41,
                    "question" => "I get stressed out easily."
                ],
                [
                    "id" => 42,
                    "question" => "I tend to focus on the negative side of life."
                ],
                [
                    "id" => 43,
                    "question" => "I am quick-tempered"
                ],
                [
                    "id" => 44,
                    "question" => "I get easily irritated."
                ],
                [
                    "id" => 45,
                    "question" => "I tend to focus intensely on my misfortune."
                ],
                [
                    "id" => 46,
                    "question" => "I panic easily."
                ],
                [
                    "id" => 47,
                    "question" => "I usually get overwhelmed by emotions."
                ],
                [
                    "id" => 48,
                    "question" => " I tend to disagree a lot"
                ],
                [
                    "id" => 49,
                    "question" => " I am often too conscious of making mistakes."
                ],
                [
                    "id" => 50,
                    "question" => "I am not bothered by difficult social situations."
                ]
            ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = \collect(            [
            [
                "id" => 1,
                "question" => "I Get so involved with things that I forget time"
            ],
            [
                "id" => 2,
                "question" => "I have a vivid imagination."
            ],
            [
                "id" => 3,
                "question" => "If given the opportunity, I would love to be an artist."
            ],
            [
                "id" => 4,
                "question" => "I love creating novelty."
            ],
            [
                "id" => 5,
                "question" => "I believe children should be allowed to express themselves fully."
            ],
            [
                "id" => 6,
                "question" => "I believe that there is no absolute right or wrong."
            ],
            [
                "id" => 7,
                "question" => "I can handle a lot of information."
            ],
            [
                "id" => 8,
                "question" => "I understand better when things are explained slowly."
            ],
            [
                "id" => 9,
                "question" => "Prefer variety to routine"
            ],
            [
                "id" => 10,
                "question" => "I am always engaging in new things."
            ],
            [
                "id" => 11,
                "question" => "Get chores done right away."
            ],
            [
                "id" => 12,
                "question" => "I stick to fully accomplishing my new year resolutions"
            ],
            [
                "id" => 13,
                "question" => "I often forget to put things back in their proper place."
            ],
            [
                "id" => 14,
                "question" => "I believe that everything must be done according to a specified plan."
            ],
            [
                "id" => 15,
                "question" => "I often make last-minute plans."
            ],
            [
                "id" => 16,
                "question" => "I believe strongly in the saying “we live but once, so live life to its fullest.”"
            ],
            [
                "id" => 17,
                "question" => "I always turn plans into action."
            ],
            [
                "id" => 18,
                "question" => "I demand quality no matter the cost."
            ],
            [
                "id" => 19,
                "question" => "I set high standards for myself and others."
            ],
            [
                "id" => 20,
                "question" => "I follow through on my commitments."
            ],
            [
                "id" => 21,
                "question" => "I make friends easily."
            ],
            [
                "id" => 22,
                "question" => "I usually keep others at a distance."
            ],
            [
                "id" => 23,
                "question" => " I believe in expressing oneself even if doing so hurts other people's feelings."
            ],
            [
                "id" => 24,
                "question" => " I can talk and persuade others into doing things."
            ],
            [
                "id" => 25,
                "question" => "I make it a priority to have a lot of fun."
            ],
            [
                "id" => 26,
                "question" => "I am often too serious with life."
            ],
            [
                "id" => 27,
                "question" => "I love large parties."
            ],
            [
                "id" => 28,
                "question" => "I absolutely love surprise parties."
            ],
            [
                "id" => 29,
                "question" => "I get easily bored with routine."
            ],
            [
                "id" => 30,
                "question" => "I am always busy, always on the go."
            ],
            [
                "id" => 31,
                "question" => "I easily trust others."
            ],
            [
                "id" => 32,
                "question" => "I believe that no one is absolutely good, most people are selfish."
            ],
            [
                "id" => 33,
                "question" => "I anticipate the needs of others."
            ],
            [
                "id" => 34,
                "question" => "I usually act to promote the welfare of others, even if it comes at a cost to myself."
            ],
            [
                "id" => 35,
                "question" => "I strongly believe that if you don't talk about your achievements, no one will."
            ],
            [
                "id" => 36,
                "question" => "I can't stand weak people."
            ],
            [
                "id" => 37,
                "question" => "I dislike soft-hearted people."
            ],
            [
                "id" => 38,
                "question" => "I am easy to satisfy"
            ],
            [
                "id" => 39,
                "question" => "Have a good word for everyone."
            ],
            [
                "id" => 40,
                "question" => "I worry about many things."
            ],
            [
                "id" => 41,
                "question" => "I get stressed out easily."
            ],
            [
                "id" => 42,
                "question" => "I tend to focus on the negative side of life."
            ],
            [
                "id" => 43,
                "question" => "I am quick-tempered"
            ],
            [
                "id" => 44,
                "question" => "I get easily irritated."
            ],
            [
                "id" => 45,
                "question" => "I tend to focus intensely on my misfortune."
            ],
            [
                "id" => 46,
                "question" => "I panic easily."
            ],
            [
                "id" => 47,
                "question" => "I usually get overwhelmed by emotions."
            ],
            [
                "id" => 48,
                "question" => " I tend to disagree a lot"
            ],
            [
                "id" => 49,
                "question" => " I am often too conscious of making mistakes."
            ],
            [
                "id" => 50,
                "question" => "I am not bothered by difficult social situations."
            ]
        ])
            ->map(function ($question) {
                return [
                    ...$question,
                ];
            });

        Question::query();
    }
}
