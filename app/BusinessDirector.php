<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDirector extends Model
{
    protected $table = 'business_directors';
    
    function business_details()
    {
        return $this->belongsTo('App\Business','business_id');
    }
}
