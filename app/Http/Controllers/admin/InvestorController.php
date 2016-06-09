<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Adminusers, App\Business, App\investors, App\industries, App\InvestorIndustries, App\BusinessIndustries;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Validator, \Redirect, \Session,\Cookie;
use Illuminate\Cookie\CookieJar;
use Illuminate\Cookie\CookieServiceProvider;
use Hash;

use App\Http\Helpers;


class InvestorController extends Controller
{
    public function index(Request $request)
    {
	$data['search'] = '';
        $data['keyword'] = '';
        $data['status_search'] 	= '';
        
	if($request->keyword !='' || $request->status_search !='')
	{
            $data['search']['keyword']  = $request->keyword;
            $data['keyword']            = $request->keyword;
            $data['status_search'] 	= $request->status_search;
            $data['lists'] 		= investors::where(function($query) use ($data) {
					    if($data['keyword'] != ''){
						$query->where('name','like','%'.$data['keyword'].'%');
					    }
					    if($data['status_search'] != ''){
						$query->where('status',$data['status_search']);
					    }
					})->orderBy('id','desc')->paginate(10);
        }
        else{
             $data['lists'] = investors::orderBy('id','desc')->paginate(10);
        }
       
        return view('admin.investors.list',$data);
    }
    
    public function view($id)
    {
	$data['industries_master']	= industries::where('status','Active')->orderBy('industry_name')->lists('industry_name', 'id');
	$data['details'] 		= investors::where('id',$id)->first();
	$data['selected_category']	= InvestorIndustries::where('investor_id', '=', $id)->lists('industry_id')->all();
	
	//echo "<pre>";print_r($data['selected_category']);exit();
        
        return view('admin.investors.view',$data);
        
    }
    
    public function update(Request $request){
        
        $validator = \Validator::make(
                            $request->all(),
                            ['name'              => 'required',
                             'address'           => 'required',
                             'city_id'           => 'required',
                             'state_id'          => 'required',
                             //'skills'            => 'required',
                             'logo'              => 'mimes:jpg,png,jpeg,gif'
                             ]);
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            
       // dd($request->all());
        $company = Company::where('id',$request->id)->first();
				
				if($request->referral_id != ''){
						$company->referral_id = $request->referral_id;
				}
				
				
        $company->name = $request->name;
        $company->slug = str_slug($request->name);
          if($request->password!=''){
           $company->password = $request->password;
          }
         $company->address = $request->address;
          $company->state_id = $request->state_id;
        $company->city_id = $request->city_id;
         $company->facebook_link = $request->facebook_link;
        $company->twitter_link = $request->twitter_link;
        $company->linked_in_link = $request->linked_in_link;
        $company->phone_no = $request->phone_no;
        //if($request->skills ){
        //    $company->skill_roles = implode(',',$request->skills);
        //}
        if($_FILES['logo']['tmp_name']!='' && ($_FILES['logo']['type']!='image/png' && $_FILES['logo']['type']!='image/jpeg')){
            return Redirect::back()->with('errmsg','Please Upload jpg/png image only');
        }
        if($request->hasFile('logo'))
        {
            @unlink(public_path().'/upload/company/'.$company->logo);
            @unlink(public_path().'/upload/company/thumb/'.$company->logo);
            $image 	= $request->file('logo');
            $filename  	= time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/company/thumb/' . $filename);
            $image->move(public_path('upload/company/'), $filename);
            
            \Image::make(public_path('upload/company/'.$filename))->resize(334, 201)->save($path);
            
            //$background = \Image::canvas(248, 254);
            //
            //$image = \Image::make(public_path('upload/company/'.$filename))->resize(334, 201, function ($c) {
            //        $c->aspectRatio();
            //        $c->upsize();
            //});
            //$background->insert($image, 'center');
            //$background->save($path);
            
             $company->logo = $filename;
        }
        //if($_FILES['logo']['tmp_name']!='' ){
        //    @unlink(public_path().'/upload/company/'.$company->logo);
        //    $file_name = time().$_FILES['logo']['name'];
        //    move_uploaded_file($_FILES['logo']['tmp_name'], public_path().'/upload/company/'.$file_name);
        //    $company->logo = $file_name;
        //}
        $company->save();
        
        return Redirect::route('admin_company')->with('succmsg','Company is updated successfully');
        }
    }
    public function delete($id){
        $data = Company::where('id',$id)->first();
        $data->delete();
        return Redirect::route('admin_company')->with('succmsg','Company is deleted successfully');
    }
    
	 
	 
    public function set_status(Request $request)
    {
        $id 	        = $request->get('id');
        $rec            = investors::find($id);
        $status         = $rec->status;
        if($status=='Active'){
            $new_status = 'Inactive';
        }
        else if($status=='Inactive'){
				$new_status = 'Active';
        }
        $rec->status = $new_status;
        $rec->save();
	echo $new_status;
    }
    
	 
	 
    public function download_portfolio_file($file){
		  $file_path= public_path(). "/upload/Investor/".$file;
		  return response()->download($file_path, "attachment");
    }
}
