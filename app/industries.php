<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industries extends Model
{
    //
    
    public function industryInvestor()
    {
        return $this->hasMany('App\InvestorIndustries','industry_id');
    }
}
