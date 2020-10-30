<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'description', 'is_verified', 'user_id'];

    /**
     * Get the question of this answer.
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
