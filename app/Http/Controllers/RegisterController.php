<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect, \Session,\Cookie;
use Illuminate\Cookie\CookieJar;
use Illuminate\Cookie\CookieServiceProvider;
use Hash;
use App\Http\Helpers;
use \Auth, \Mail;

class RegisterController extends Controller
{
    public function index(CookieJar $cookieJar, Request $request)
    {
        $business_id = Session::get('BUSINESS_ID');
        $investor_id = Session::get('INVESTORS_ID');
        
        if($business_id > 0)
        {
            return redirect::route('business_dashboard');
        }
        else if($investor_id > 0)
        {
            return redirect::route('investor_dashboard');
        }
        else
        {
            $data   = array();
            return view('home.register',$data);
        }
    
    }
    
}