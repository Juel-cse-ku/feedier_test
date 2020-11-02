<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * @method static paginate(int $int)
 */
class Answer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id', 'question_id'];

    /**
     * Get the question of this answer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Get the question's question type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function questionType()
    {
        return $this->hasOneThrough('App\QuestionType', 'App\Question');
    }

    /**
     * Count answers submitted by last 48 hours.
     *
     * @return int
     */
    public function countAnswersByLast48Hours() {
        return DB::table('answers')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->join('question_types', 'question_types.id', '=', 'questions.question_type_id')
            ->where('question_types.name', '=', 'textarea')
            ->where('questions.created_at', '>=', date('Y-m-d H:i:s', strtotime("-48 hours")))
            ->count();
    }

    /**
     * Get last 5 submitted answers.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLast5Answers() {
        return DB::table('answers')
            ->select('answers.name')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->join('question_types', 'question_types.id', '=', 'questions.question_type_id')
            ->where('question_types.name', '=', 'textarea')
            ->where('questions.created_at', '>=', date('Y-m-d H:i:s', strtotime("-48 hours")))
            ->orderBy('answers.created_at', 'DESC')
            ->take(5)
            ->get();
    }
}
