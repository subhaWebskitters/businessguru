<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestorIndustries extends Model
{
    //
    
    public function industryMaster()
    {
        return $this->belongsTo('App\industries','industry_id');
    }
}
