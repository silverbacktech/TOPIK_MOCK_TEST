<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    public function questionSet(){
    	return $this->belongsTo('App\QuestionSets');
    }

    public function readingQuestions(){
    	return $this->hasMany('App\ReadingQuestions');
    }
}
