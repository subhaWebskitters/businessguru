<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\investors,App\industries,App\Business, App\HomeBanner;
use \Validator, \Redirect, \Session,\Cookie;

class DiscoverController extends Controller
{
    public function index(Request $request){
           
            $bannerData         = HomeBanner::all();
            $data = array();
            $data['bannerData'] = $bannerData;
            $search_word = $request->search;
            $data['search_word']      = $search_word;
            $allindustryData = industries::orderBy('id','ASC')->get(); 
            $data['allindustryData'] = $allindustryData;
           
            if($search_word == ''){
            
            //$businessData = investors:: join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
            //                            ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
            //                            ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
            //                            ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
            //                            ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
            //                            ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
            //                            ->orderBy('listed_date','DESC')
            //                            ->groupBy('business_users.id')
            //                            ->paginate(5);
                                        
                                        
            $businessData = Business:: join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                        ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                        ->select('business_users.*','industries.industry_name')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.created_at','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(5);
            }
            else
            {
                
                $businessData = Business:: join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                        ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                        ->where('business_users.business_name', 'LIKE', '%'.$search_word.'%')
                                        ->select('business_users.*','industries.industry_name')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.created_at','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(5);
                
                
                
                //$businessData = investors:: join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                //                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                //                        ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
                //                        ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
                //                        ->where('business_users.business_name', 'LIKE', '%'.$search_word.'%')
                //                        ->orwhere('industries.industry_name', 'LIKE', '%'.$search_word.'%')
                //                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
                //                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                //                        ->orderBy('listed_date','DESC')
                //                        ->groupBy('business_users.id')
                //                        ->paginate(5); 
            }
            
            //dd($businessData);
            
            $data['businessData']   = $businessData;
            
            $popularData = Business:: join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                        ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                        ->select('business_users.*','industries.industry_name','business_users.total_views as TotalViews')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('TotalViews','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(5);
            
            
            //$popularData = investors:: join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
            //                            ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
            //                            ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
            //                            ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
            //                            ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date','business_users.total_views as TotalViews')
            //                            ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
            //                            ->orderBy('TotalViews','DESC')
            //                            ->groupBy('business_users.id')
            //                            ->paginate(5);
          
            $data['popularData']   = $popularData;
            
            //dd($data['businessData']);
            
            return view('discover.index',$data);
    }
    
    public function loadmoreBusiness(Request $request){
        
        $businessData = Business:: join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                        ->join('industries', 'business_industries.industry_id', '=', 'industries.id')
                                        ->select('business_users.*','industries.industry_name')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.created_at','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(5);
        
        
        
        
        
        //investors:: join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
        //                            ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
        //                            ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
        //                            ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
        //                            ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
        //                            ->orderBy('listed_date','DESC')
        //                            ->paginate(5);
                                    
                                    
        $data['businessData'] = $businessData;
        $view = \View::make('discover.business_more_content',$data);
        $contents = $view->render();

        echo $contents;
        exit;
    }
    
    public function loadmorepopularBusiness(Request $request){
        
       
        
        
            $popularData = investors:: join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                                        ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
                                        ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
                                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date','business_users.total_views as TotalViews')
                                        ->orderBy('TotalViews','DESC')
                                        ->paginate(5);
        //}
        //else{
        //    $popularData = investors:: join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
        //                                ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
        //                                ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
        //                                ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
        //                                ->where('business_users.business_name', 'LIKE', '%'.$search_word.'%')
        //                                ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date','business_users.total_views as TotalViews')
        //                                ->orderBy('TotalViews','DESC')
        //                                ->paginate(5);
        //}
                                    
                                    
        $data['popularData']   = $popularData;
        $dataview = \View::make('investor.business_popular_more_content',$data);
        $contents = $dataview->render();

        echo $contents;
        exit;
    }

    
    
    
    public function discover_details($business_slug){
                              
            $investor_id = Session::get('INVESTORS_ID');
            $buss_id 	= Session::get('BUSINESS_ID');
            
            if($investor_id != '')
            {
                return redirect::route('business_details', $business_slug);
            }
            
            
            $businessDetails= Business::where('business_slug',$business_slug)->first();
            $data['businessDetails'] = $businessDetails;
            $data['investor_id'] = $investor_id;
            $data['buss_id'] = $buss_id;
            
            return view('discover.discover_details',$data);        
    }
}
