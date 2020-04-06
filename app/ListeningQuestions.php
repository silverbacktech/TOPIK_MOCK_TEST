<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningQuestions extends Model
{
    public function set(){
		return $this->belongsTo('App\QuestionSets');
	}
    public function listeningGroup(){
    	return $this->belongsTo('App\ListeningGroup');
    }
    // public function readingOptions(){
    // 	return $this->hasMany('App\ReadingOptions');
    // }
    // public function readingAnswer(){
    // 	return $this->hasOne('App\ReadingAnswer');
    // }
}
