<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get all questions for this question type.
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
