<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingQuestions extends Model
{
	public function set(){
		return $this->belongsTo('App\QuestionSets');
	}
    public function readingGroup(){
    	return $this->belongsTo('App\QuestionGroup');
    }
    public function readingOptions(){
    	return $this->hasMany('App\ReadingOptions');
    }
    public function readingAnswer(){
    	return $this->hasOne('App\ReadingAnswer');
    }
}
