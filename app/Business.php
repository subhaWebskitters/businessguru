<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Business extends Model implements AuthenticatableContract, CanResetPasswordContract
{
     use Authenticatable, CanResetPassword;
     protected $table = 'business_users';
     
    
    function get_business_detail()
    {
        return $this->belongsTo('App\BusinessProposal','business_id');
    }
    
    function get_investor_detail()
    {
        return $this->belongsTo('App\BusinessProposal','investor_id');
    }
    
    public function setPasswordAttribute($password)
    {
          $this->attributes['password'] = bcrypt($password);
    }
    
    function getCurrency()
    {
        return $this->hasOne('App\Currencies','id','currency');
    }
    
    function getspCurrency()
    {
        return $this->hasOne('App\Currencies','id','sp_currency');
    }
    
    function getcvCurrency()
    {
        return $this->hasOne('App\Currencies','id','cv_currency');
    }
    function getpvCurrency()
    {
        return $this->hasOne('App\Currencies','id','pv_currency');
    }
    
     function businessindustry(){
        return $this->hasMany('App\BusinessIndustries','business_id');
     }
     
     function getDocumentList(){
        return $this->hasMany('App\BusinessDocuments','business_id');
     }
     
     function business_details()
     {
        return $this->hasMany('App\BusinessDirector','business_id');
     }
     function get_business_proposal()
    {
        return $this->hasMany('App\BusinessProposal','business_id');
    }
    function get_business_files()
    {
        return $this->hasMany('App\Businessfiles','business_id');
    }
     function get_business_interest_mail()
    {
        return $this->hasMany('App\BusinessInterestMail','business_id');
    }
}
