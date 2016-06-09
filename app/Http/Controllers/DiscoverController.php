<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\investors,App\industries,App\Business, App\HomeBanner;
use \Validator, \Redirect, \Session,\Cookie;

class DiscoverController extends Controller
{
    public function index(Request $request){
           
        $data = array();
        $bannerData             = HomeBanner::all();
        $data['bannerData']     = $bannerData;
        $search_word            = $request->search;
        $data['search_word']    = $search_word;
        $allindustryData        = industries::orderBy('id','ASC')->get(); 
        $data['allindustryData']= $allindustryData;
           
        if($search_word == ''){
                                    
            $businessData = Business::  join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                        ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                        ->select('business_users.*','industries.industry_name')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.created_at','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(5);
        }
        else {
            
            $businessData = Business::  join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                        ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                        ->where('business_users.business_name', 'LIKE', '%'.$search_word.'%')
                                        ->select('business_users.*','industries.industry_name')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.created_at','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(5);
        }
            
        $popularData = Business::   join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                    ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                    ->select('business_users.*','industries.industry_name','business_users.total_views as TotalViews')
                                    ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                    ->orderBy('TotalViews','DESC')
                                    ->groupBy('business_users.id')
                                    ->paginate(5);
            
        $data['businessData']   = $businessData;
        $data['popularData']    = $popularData;
            
        return view('discover.index',$data);
    }
    
    public function loadmoreBusiness(Request $request){
        
        $businessData = Business::  join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                    ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                    ->select('business_users.*','industries.industry_name')
                                    ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                    ->orderBy('business_users.created_at','DESC')
                                    ->groupBy('business_users.id')
                                    ->paginate(5);
        
        $data['businessData'] = $businessData;
        $view = \View::make('discover.business_more_content',$data);
        $contents = $view->render();

        echo $contents;
        exit;
    }
    
    public function loadmorepopularBusiness(Request $request){
        
        $popularData = Business::   join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                    ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                    ->select('business_users.*','industries.industry_name','business_users.total_views as TotalViews')
                                    ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                    ->orderBy('TotalViews','DESC')
                                    ->groupBy('business_users.id')
                                    ->paginate(5);
             
        $data['popularData']   = $popularData;
        $dataview = \View::make('discover.business_popular_more_content',$data);
        $contents = $dataview->render();

        echo $contents;
        exit;
    }

    
    public function discover_details($business_slug){
                              
        $investor_id = Session::get('INVESTORS_ID');
        $buss_id 	= Session::get('BUSINESS_ID');
        
        if($investor_id != ''){
            return redirect::route('business_details', $business_slug);
        }
        
        $businessDetails= Business::where('business_slug',$business_slug)->first();
        $data['businessDetails'] = $businessDetails;
        $data['investor_id'] = $investor_id;
        $data['buss_id'] = $buss_id;
        
        return view('discover.discover_details',$data);        
    }
}
