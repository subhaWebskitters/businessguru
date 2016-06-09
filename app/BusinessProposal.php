<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessProposal extends Model
{
    protected $table = 'business_proposals';
    
    function get_business_detail()
    {
        return $this->hasMany('App\Business','id');
    }
    function get_investor_detail()
    {
        return $this->hasMany('App\investors','id');
    }
}
