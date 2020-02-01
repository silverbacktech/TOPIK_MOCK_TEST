<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningOptions extends Model
{
    public function listeningQuestions(){
    	return $this->belongsTo('App\ListeningQuestions');
    }
    public function listeningAnswer(){
    	return $this->hasOne('App\ListeningAnswer');
    }
    public funtion listeningSubmittedAnswer(){
    	return $this->hasOne('App\ListeningSubmittedAnswers');
    }
}
