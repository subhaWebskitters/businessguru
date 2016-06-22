<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class investors extends Model implements AuthenticatableContract, CanResetPasswordContract
{
		use Authenticatable, CanResetPassword;
		
		public function setPasswordAttribute($password){   
				$this->attributes['password'] = bcrypt($password);
		}
		
		public function investorIndustry()
		{
		    return $this->hasMany('App\InvestorIndustries','investor_id');
		}
		
		public function get_investor_proposal()
		{
			return $this->hasMany('App\BusinessInvestor','investor_id');		
		}
		function get_business_interest_mail()
		{
		    return $this->hasMany('App\BusinessInterestMail','investor_id');
		}
		function get_investor_asCurrency()
		{
		    return $this->hasOne('App\Currencies','id','as_currency');
		}
		
		function get_investor_wiCurrency()
		{
		    return $this->hasOne('App\Currencies','id','wi_currency');
		}
}
