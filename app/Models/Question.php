<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory, GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'category_id',
        'question',
        'min_score',
        'max_score',
        'score_step',
    ];

    /**
     * Get the category that owns the question.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
