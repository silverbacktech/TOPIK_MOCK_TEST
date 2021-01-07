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
    public function listeningOptions(){
    	return $this->hasMany('App\ListeningOptions');
    }
    public function listeningAnswer(){
    	return $this->hasOne('App\ListeningAnswer');
    }
}
