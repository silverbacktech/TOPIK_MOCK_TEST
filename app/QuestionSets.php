<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSets extends Model
{
    public function languages(){
    	return $this->belongsTo('App\Languages');
    }

    public function listeningQuestions(){
    	return $this->hasMany('App\ListeningQuestions');
    }

    public function readingQuestions(){
    	return $this->hasMany('App\ReadingQuestions');
    }

    public function readingGroup(){
    	return $this->hasMany('App\QuestionGroup');
    }

    public function listeningGroup(){
        return $this->hasMany('App\ListeningGroup');
    }
}
