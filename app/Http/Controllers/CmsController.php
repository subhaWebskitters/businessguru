<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sitesettings;
use \Validator, \Redirect, \Session,\Cookie;
use App\Business;
use App\investors;

class CmsController extends Controller
{
    public function index(Request $request){
        
        $data = array();
				$slug = $request->segment(1);
	
				if($slug == 'about-us'){
						return view('cms.about',$data);
				}
		
				if($slug == 'contact-us'){
						$data['sitesettings'] = Sitesettings::select('sitesettings_name','sitesettings_value')->get();
						return view('cms.contact',$data);
				}
	
				if($slug == 'how-it-works'){
						return view('cms.how_it_works',$data);
				}
    }
    
    public function contact_email(Request $request){
        $data= array();
       
       $sitesettings = Sitesettings::select('sitesettings_name','sitesettings_value')->where('id',1)->first();
        if($request->action == 'Process'){
						$validator = Validator::make(
                                   $request->all(),
                                   [                       
                                          'first_name'          => 'required',
                                          'email'               => 'required|email',
                                          'organisation_name'   => 'required',
                                          'enquiry'             => 'required'
                                   ]
                                   );
                      if ($validator->fails())
                                   {
                                     return Redirect::back()->withErrors($validator)->withInput();
                                   }
                                   else
                                   {
                                    $data['contact_from_name'] = $request->first_name;
                                    $data['contact_email'] = $request->email;
                                    $data['organisation_name'] = $request->organisation_name;
                                    $data['enquiry'] = $request->enquiry;
                                    $data['admin_from_name'] = $sitesettings['sitesettings_name'];
                                    $mail_config = array(
                                        'from_mail'  	=> $request->email,
                                        'from_name'  	=> $request->first_name,
                                        'to_mail'       => $sitesettings['sitesettings_value']
                                    );
                                    \Mail::send('emails.contact_admin', $data, function($message) use ($mail_config){
                                        $message->subject("Contact Us");
                                        $message->from($mail_config['from_mail']);
                                        $message->to($mail_config['to_mail']);
                                    });
                                    $mail_config1 = array(
                                        'from_mail'  	=> $sitesettings['sitesettings_value'],
                                        'from_name'  	=> $sitesettings['sitesettings_name'],
                                        'to_mail'       => $request->email
                                    );
                                    \Mail::send('emails.contact_user', $data, function($message) use ($mail_config1){
                                        $message->subject("Contact Us");
                                        $message->from($mail_config1['from_mail']);
                                        $message->to($mail_config1['to_mail']);
                                    });
                                   return redirect::back()->with('successMessage', 'Thank you for your Request. We will contact you soon.');
                                     
                                   }
        }
        
    }


		public function sortingbyprice(Request $request){
		    
				$data = array();
				$min_price = $request->minprice;
				$max_price = $request->maxprice;
				$search_text = $request->srchtext;
				$industries_ids = $request->indID;
				$investor_id = Session::get('INVESTORS_ID');
				
				//if($search_text != ''){
						
						$data['search_text'] = $request->srchtext;
						$data['min_price'] = $request->minprice;
						$data['max_price'] = $request->maxprice;
						$data['industries_ids'] = array();
						if($request->indID <> ''){
								$data['industries_ids'] = explode(',',$request->indID);
						}
						
						//print_r($data['industries_ids']); exit;
						
						//$data['result'] = 	Business::join('business_industries','business_industries.business_id','=','business_users.id')
						//														->join('investor_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
						//														->join('investors', 'investor_industries.investor_id', '=', 'investors.id')
						//														->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
						//														->where(function($query) use ($data){
						//																if($data['search_text'] != ''){
						//																		$query->where('business_name','LIKE','%'.$data['search_text'].'%')
						//																		->whereBetween('selling_price', [$data['min_price'], $data['max_price']]);
						//																}
						//																
						//																if($data['industries_ids'] != ''){
						//																		$query->whereIn('industries.id', $data['industries_ids']);
						//																}
						//														})
						//														->where('investors.id',$investor_id)
						//														->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
						//														->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
						//														->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.id) as category_ids"))
						//														->groupBy('business_users.id')
						//														->paginate(5);
						
						
						$data['businessData'] = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                                        ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
                                        ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
																				->where(function($query) use ($data){
																						if($data['search_text'] != ''){
																								$query->where('business_name','LIKE','%'.$data['search_text'].'%');
																						}
																						if($data['min_price'] != '' && $data['max_price'] != ''){
																								$query->whereBetween('selling_price',[$data['min_price'],$data['max_price']]);
																						}
																						if(count($data['industries_ids']) > 0){
																								$query->whereIn('industries.id', $data['industries_ids']);
																						}
																				})
                                        ->where('investors.id',$investor_id)
                                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('industries.id','ASC')
                                        ->groupBy('business_users.id')
                                        ->paginate(10);
						
						
						
						
						
						
						
				//}
				
				//echo "<pre>"; print_r($data['result']); echo "</pre>";
				//die();
				$view = \View::make('investor.business_details_content',$data);
        $contents = $view->render();

        echo $contents;
        exit;				
		}
		
		
		public function searchbusiness(Request $request){
				$industries_ids = $request->indID;
				if($request->indID <> ''){
						$data['industries_ids'] = $request->indID;
				}
				
				$investor_id = Session::get('INVESTORS_ID');
				
				if($investor_id != ''){
						
						$data['businessData'] = 		investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
																				->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
																				->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
																				->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
																				->where('industries.id', $data['industries_ids'])
																				->where('investors.id',$investor_id)
																				->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
																				->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
																				->orderBy('industries.id','ASC')
																				->groupBy('business_users.id')
																				->paginate(5);
				}
				else{
						$data['businessData']	= 	Business:: join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
																									->join('industries', 'business_industries.industry_id', '=', 'industries.id')
																									->where('industries.id', $data['industries_ids'])
																									->select('business_users.*','industries.industry_name')
																									->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
																									->orderBy('business_users.created_at','DESC')
																									->groupBy('business_users.id')
																									->paginate(5);
				}
				
				$view = \View::make('discover.business_search_discover',$data);
        $contents = $view->render();

        echo $contents;
        exit;				
		}

}
