<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class Adminusers extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use EntrustUserTrait;
    use Authenticatable, CanResetPassword;
    
    protected $fillable = array('name', 'email', 'password','phone');
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adminusers';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];


    
    public function setPasswordAttribute($password){   
        $this->attributes['password'] = bcrypt($password);
      }
}
