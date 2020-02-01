<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public function sets(){
    	return $this->hasMany('App\QuestionSets');
    }
}
