<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commenttable()
    {
    	return $this->morphTo();
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
   
    
    
    
}
