<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningGroup extends Model
{
    public function questionSet(){
    	return $this->belongsTo('App\QuestionSets');
    }

    public function listeningQuestions(){
    	return $this->hasMany('App\ListeningQuestions');
    }
}
