<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businessfiles extends Model
{
   protected $table = 'business_files';
   
   function get_investor_detail()
    {
        return $this->belongsTo('App\Business','business_id');
    }
}
