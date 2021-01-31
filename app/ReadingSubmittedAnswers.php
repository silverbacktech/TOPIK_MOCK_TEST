<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingSubmittedAnswers extends Model
{
    public function set(){
		return $this->belongsTo('App\QuestionSets');
	}

	public function studentResults(){
		return $this->belongsTo('App\StudentResults');
	}
}
