<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentResults extends Model
{
    protected $fillable = ['title'];
    public function readingAnswers(){
    	return $this->hasMany('App\ReadingSubmittedAnswers');
    }
    
    public function listeningAnswers(){
        return $this->hasMany('App\ListeningSubmittedAnswers');
    }

    public function student(){
        return $this->belongsTo('App\User','student_id');
    }

    public function sets(){
        return $this->belongsTo('App\QuestionSets','question_sets_id');
    }
}
