<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @method static paginate(int $int)
 */
class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'description', 'is_verified', 'user_id', 'question_id'];

    /**
     * Get the question of this answer.
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Get the question's question type.
     */
    public function questionType()
    {
        return $this->hasOneThrough('App\QuestionType', 'App\Question');
    }

    public function countAnswersByLast48Hours() {
        return DB::table('answers')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->join('question_types', 'question_types.id', '=', 'questions.question_type_id')
            ->where('question_types.name', '=', 'textarea')
            ->where('questions.created_at', '>=', date('Y-m-d H:i:s', strtotime("-48 hours")))
            ->count();
    }

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
