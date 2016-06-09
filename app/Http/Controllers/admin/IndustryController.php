<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\industries;
use \Route;
use \Session, \Validator,\Redirect, \Cookie;


class IndustryController extends Controller
{
    
    public function index(Request $request){
        
        $data = array();
        $data['search'] = $request->search;
        $query = '';
        if($data['search'] != '')
        {
            $query = industries::where('industry_name','LIKE','%'.$data['search'].'%')->paginate(10);            	
        }
        else{
            $query = industries::paginate(10);
        }
        $data['industry_list'] = $query;
        return view('admin.industry.list',$data);
    }
    
    
    public function edit($id,Request $request){
        $data       = array();
        $data['id']  = $id;
        $getDetails  = industries::find($id);
        $data['industry_details'] = industries::where('id',$id)->first();;
        
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),['industry_name'=>'required']);
            if($validator->fails()){
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $industry_name  = $request->get('industry_name');
                $status         = $request->get('status');
                $checkIndustryName = industries::where('industry_name',$industry_name)->first();
                if(count($checkIndustryName)>0){
                    return redirect::back()->with('errMsg','Industry name already exists');
                }
                else{
                    $getDetails->industry_name = $industry_name;
                    $getDetails->status        = $status;
                    $getDetails->save();
                    $postID    = $getDetails->id;
                    if($postID){
                        return redirect::route('industries_list')->with('sucMsg','Updated successfully');
                    }
                    else{
                        return redirect::back()->with('errMsg','Category not updated');
                    }
                }
            }
        }
        return view('admin.industry.edit',$data);
    }
    
    
    public function add(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),['industry_name'=>'required']);
            if($validator->fails()){
                    $messages = $validator->messages();
                    return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $industry_name  = $request->get('industry_name');
                $status         = $request->get('status');
                $checkIndustryName = industries::where('industry_name',$industry_name)->first();
                
                if(count($checkIndustryName)>0){
                    return redirect::back()->with('errMsg','Industry name already exists');
                }
                else{
                    $new_industry  = new industries;
                    $new_industry->industry_name = $industry_name;
                    $new_industry->status = $status;
                    $new_industry->save();
                    $id = $new_industry->id;
                    if($id){
                        return redirect::route('industries_list')->with('sucMsg','Updated successfully');
                    }
                }
            }
        }
        return view('admin.industry.add');
    }
}
