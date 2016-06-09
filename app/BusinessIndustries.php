<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessIndustries extends Model
{
    protected $table = 'business_industries';

    function businessindustry(){
        return $this->belongsTo('App\Business','business_id');
    }
    
    function industryDetails(){
        return $this->belongsTo('App\industries','industry_id');
    }
}
