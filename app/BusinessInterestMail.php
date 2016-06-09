<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessInterestMail extends Model
{
    protected $table = 'business_interested_mail';
    
    function get_business_detail()
    {
        return $this->hasMany('App\Business','id');
    }
    function get_investor_detail()
    {
        return $this->hasMany('App\investors','id');
    }
}
