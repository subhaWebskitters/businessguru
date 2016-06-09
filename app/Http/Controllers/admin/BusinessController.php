<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business;
use App\Http\Helpers;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $data['search'] 	= '';
        $data['status_search'] 	= '';
	
	if($request->search !='' || $request->status_search !='')
        {
	    $data['search']        = $request->search;
	    $data['status_search'] = $request->status_search;
	
	    $data['results'] 		= Business::where(function($query) use ($data) {
					    if($data['search'] != ''){
						$query->where('business_name','LIKE','%'.$data['search'].'%')
						->orWhere('email', 'LIKE', '%'.$data['search'].'%')
						->orWhere('user_type', 'LIKE', '%'.$data['search'].'%')
						->orWhere('website', 'LIKE', '%'.$data['search'].'%')
						->orWhere('looking_for', 'LIKE', '%'.$data['search'].'%');
					    }
					    if($data['status_search'] != ''){
						$query->where('status',$data['status_search']);
					    }
					})->orderBy('id','desc')->paginate(10);
	    
	}
        else
	{
            $data['results'] = Business::orderBy('id','desc')->paginate(10);
	}
	
	
        
        return view('admin.business.list',$data);
    }
    
    
    public function details($id){       
        $data['details'] = Business::where('id','=',$id)->first();
        //dd($data['details']->getCurrency);
        return view('admin.business.details',$data);
    }
    
    public function download_file($file)
    {
	$file_path= public_path(). "/upload/attachment/".$file;
	return response()->download($file_path, "attachment");
    }
    
    public function download_proposal_file($file)
    {
	$file_path= public_path(). "/upload/proposal/".$file;
	return response()->download($file_path, "attachment");
    }
    
    public function download_sales_report($file)
    {
	$file_path= public_path(). "/upload/sales_report/".$file;
	return response()->download($file_path, "attachment");
    }
    
    public function download_pll_report($file)
    {
	$file_path= public_path(). "/upload/pll_report/".$file;
	return response()->download($file_path, "attachment");
    }
    
    public function download_valuation_report($file)
    {
	$file_path= public_path(). "/upload/valuation_report/".$file;
	return response()->download($file_path, "attachment");
    }
    
    public function set_status(Request $request)
    {
        $id 	        = $request->id;
        $rec            = Business::find($id);
        $status         = $rec->status;
        if($status=='Active')
	{
            $new_status = 'Inactive';
        }
        else if($status=='Inactive')
	{
	    $new_status = 'Active';
        }
        $rec->status = $new_status;
        $rec->save();
    }
    
}