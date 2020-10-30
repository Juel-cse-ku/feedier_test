<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'question_type_id', 'name', 'date', 'description', 'user_id'];

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
