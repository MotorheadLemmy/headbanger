<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
      public function setSlugAttribute($value)
    {
    	$this->attributes['slug']=empty($value) ? \Str::slug($this->attributes['name'],'-') : \Str::slug($value);
    }
    public function getImgAttribute($value)
    {
    	return empty($value) ? '/images/no.png' : $value;
    }
}
