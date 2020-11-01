<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($id)
 */
class Question extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'question_type_id', 'name', 'date', 'description', 'user_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date'     => 'date',
    ];

    /**
     * Get the user by which the question is raised.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all answers for this question.
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * Get the type of this question.
     */
    public function questionType()
    {
        return $this->belongsTo('App\QuestionType');
    }

}
