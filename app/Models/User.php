<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all the answers for this user
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * checks if the answer belongs to this user
     */
    public function answerBelongsToUser(Answer $answer)
    {
        return $this->answers()->getQuery()->where('question_id', $answer->question_id)->exists();
    }

    /**
     * check if the user has answered all the questions
     */
    public function completelyAnswered()
    {
        return Question::query()->count() == $this->answers()->count();
    }

    public function calculateResult()
    {
        // for all the answers, group them by their category subtypes
        // for each answer, calculate the percentage = abs(score - min_score)/abs(max_score - min_score)
        // get the average for each subtype by dividing the sum of the percentages by the total no of questions per category,
        // get the max of the average for the category->type == 'temperament'
        $answers = $this->answers()->getQuery()->with(['question', 'question.category'])->get();

        $answers = $answers->map(function (Answer $answer) {
            $score = $answer->score;
            $min_score = $answer->question->min_score;
            $max_score = $answer->question->max_score;
            $percentage = abs($score - $min_score) / abs($max_score - $min_score);

            if ($min_score > $max_score) {
                $percentage = 1 - $percentage;
            }

            return [
                'question_id' => $answer->question->id,
                'answer_id' => $answer->id,
                'score' => $score,
                'percentage' => $percentage,
                'type' => $answer->question->category->type,
                'subtype' => $answer->question->category->subtype,
            ];
        })->groupBy(['type', 'subtype']);

        $temperaments = $answers->get('temperament')
            ->map(fn (Collection $questions, $key) => ['title' => $key, 'score' => $questions->average('percentage')])
            ->values();

        $totalTemperamentScore = $temperaments
            ->reduce(function ($carry, $value, int $key) {
                return $carry + $value['score'];
            });

        $temperaments = $temperaments->transform(fn ($answer, $key) => [
            'title' => $answer['title'],
            'score' => \round($answer['score'] / $totalTemperamentScore, 3)
        ])->toArray();

        $personality_traits = $answers->get('personality trait')
            ->map(fn (Collection $questions, $key) => ['title' => $key, 'score' => $questions->average('percentage')])
            ->values();


        $totalPersonalityTraitScore = $personality_traits
            ->reduce(function ($carry, $value, int $key) {
                return $carry + $value['score'];
            });

        $personality_traits = $personality_traits->transform(fn ($answer, $key) => [
            'title' => $answer['title'],
            'score' => \round($answer['score'] / $totalPersonalityTraitScore, 3)
        ])->toArray();

        return \compact('temperaments', 'personality_traits');
    }
}
