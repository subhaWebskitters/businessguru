<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Adminusers, App\Business, App\investors;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Validator, \Redirect, \Session,\Cookie;
use Illuminate\Cookie\CookieJar;
use Illuminate\Cookie\CookieServiceProvider;
use Hash;

use App\Http\Helpers;

class HomeController extends Controller
{
    //public function index(){
    //    
    //   return view('admin.login');
    //
    //}
    
    
    
    public function index(CookieJar $cookieJar, Request $request)
    {
        if (Session::has('ADMIN_ACCESS_ID')){
            return redirect('admin/dashboard');
        }

        if ($request->isMethod('post')){			
                $admin_email		= $request->get('admin_email');
                $admin_password		= $request->get('admin_password');
                $checkAgentExists	= Adminusers::where("email","=",$admin_email);
                $checkAgentExists	= $checkAgentExists->get();
                
                
                
                if ($request->get('remember_login')){
                    $cookieJar->queue(Cookie::make('admin_email', $admin_email, 45000));
                    $cookieJar->queue(Cookie::make('admin_password', $admin_password, 45000));
                }else{
                    $cookieJar->queue(Cookie::forget('admin_email'));
                    $cookieJar->queue(Cookie::forget('admin_password'));
                }
                
                if(count($checkAgentExists) > 0){   
                    if (Hash::check($admin_password, $checkAgentExists[0]->password)){
                        
                        Session::put('ADMIN_ACCESS_ID', $checkAgentExists[0]->id);
                        Session::put('ADMIN_ACCESS_NAME', $checkAgentExists[0]->name);
                        Session::put('ADMIN_ACCESS_IMAGE', $checkAgentExists[0]->image);
                        
                        //echo Session::get('ADMIN_ACCESS_ID');
                        //exit();
                        
                        return redirect::route('admin_dashboard');
                    
                    }else{
                        return redirect::route('admin')->with('errorMessage', 'Invalid password provided.');
                    }
                }else{
                        return redirect::route('admin')->with('errorMessage', 'Invalid email address or/and password provided.');
                }
        }
        
        $data	                        = array();
        $data['admin_email']            = '';
        $data['admin_password']         = '';
        
        $admin_email 			= Cookie::get('admin_email');
        $admin_password 		= Cookie::get('admin_password');
        
        if( $admin_email && $admin_password ){
            $data['admin_email'] 		= $admin_email;
            $data['admin_password'] 		= $admin_password;
        }
        
        return view('admin/login',$data);
    }
    
    public function admin_logout(){
        //echo "aaaa"; die();
        Session::forget('ADMIN_ACCESS_ID');
        Session::forget('ADMIN_ACCESS_NAME');
        Session::forget('ADMIN_ACCESS_IMAGE');
        return redirect('admin/')->with('succMessage', 'You have logged out successfully.');
    }
    
    public function dashboard(){
        
        $data['investors']  = investors::where('status','Active')->count('id');
        $data['business']   = Business::where('status','Active')->count();
        
        return view('admin.dashboard',$data);
    }
    
    public function edit(){
        $id             = Session::get('ADMIN_ACCESS_ID');
        $data['lists']  = Adminusers::find($id);
        return view('admin.profile.edit',$data);
    }
    public function update(Request $request){
        $validator = Validator::make(
                            $request->all(),
                            ['name'                  => 'required']);
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            $id                                 = Session::get('ADMIN_ACCESS_ID');
            $saveUser                           = Adminusers::find($id);
            $saveUser->name                     = $request->name;
            if($request->password !=''){
                $saveUser->password             = $request->password;
            }
            if($_FILES['image']['tmp_name']!='' && $_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpeg'){
                return Redirect::back()->with('errmsg','Please Upload jpg/png image only');
            }
            //if($_FILES['image']['tmp_name']!='' ){
            //    @unlink(public_path().'/upload/adminUser/'.$saveUser->image);
            //    $file_name = time().$_FILES['image']['name'];
            //    move_uploaded_file($_FILES['image']['tmp_name'], public_path().'/upload/adminUser/'.$file_name);
            //    $saveUser->image = $file_name;
            //    Session::set('ADMIN_ACCESS_IMAGE',$file_name);
            //}
            if($request->hasFile('image'))
            {                
                $image 	                      = $request->file('image');
                $filename  	              = time() . '.' . $image->getClientOriginalExtension();
                $path                         = public_path('upload/adminUser/' . $filename);
                $image->move(public_path('upload/adminUser/'), $filename);
                $saveUser->image = $filename;
                Session::set('ADMIN_ACCESS_IMAGE',$filename);
            }
            $saveUser->save();
            Session::set('ADMIN_ACCESS_NAME',$request->name);
            return Redirect::route('edit_profile')->with('succmsg','Profile Updated Successfully!');
        }
    }
}
