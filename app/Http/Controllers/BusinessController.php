<?php

namespace App\Http\Controllers;
use Twilio;
use Illuminate\Http\Request;
use \Validator, \Redirect, \Session,\Cookie;
use App\Http\Requests;
use App\Business,App\Currencies,App\Sitesettings,App\industries,App\BusinessDocuments, App\Businessfiles, App\BusinessProposal, App\BusinessIndustries, App\BusinessDirector;
use \DB,\Mail;
use App\Http\Helpers;
use Hash;
use \Khill\Lavacharts\Lavacharts;
use Chart;



class BusinessController extends Controller
{
    public function business_register(Request $request){
        $data	        = array();
        $type1        = '';
        $looking_for1 = '';
         $data['email'] = '';
         $data['password']= '';
        $data['industry']       = industries::lists('industry_name','id')->all();
        
        //dd($data['industry']);
        $data['currency']       = Currencies::selectRaw('CONCAT(country_currency_symbol, " - ", currency_code) as country_currency_symbol, id')->lists('country_currency_symbol','id')->all();
        $data['site_settings']  = Sitesettings::select('sitesettings_value','sitesettings_lebel')->where('id',1)->first();
    
        if($request->action == 'Process'){
            $data['email']     = $request->email_business;
            $data['password']  = $request->password_business;
            return view('business.signup_basic',$data);
        }
    }
    
    public function signup(Request $request){
        $data	          = array();
        $type1          =   '';
        $looking_for1   =   '';
        $data['email'] = '';
        $data['password'] = '';
        $data['industry']       = industries::lists('industry_name','id')->all();
        $data['currency']       = Currencies::lists('country_currency_symbol','id')->all();
        $data['site_settings']  = Sitesettings::select('sitesettings_value','sitesettings_lebel')->where('id',1)->first();
  
        if($request->action == 'Process'){
            $business                         = new Business;
            $business->email                  = $request->email;
            $business->password               = $request->password;
            $type                             = $request->business_type;
            
            if($type == 'start_up'){
                $type1 = 'Start Up';
            }
            else if($type == 'existing_business'){
                $type1 = 'Existing Business';
            }
            else if($type == 'business_ideas'){
                $type1 = 'Businees Ideas Only';
            }
    
            $business->user_type = $type1;
    
            //if($type == 'start_up' || $type == 'business_ideas'){
                $business->business_name    = trim($request->bussiness_name);
                $slug                       = preg_replace('/[^A-Za-z0-9-]+/', '-', trim($request->bussiness_name));			
                $business->business_slug    = strtolower($slug);
            //}
    
            //if($type == 'existing_business'){
                $business->mobile_number          = $request->contact;
                $business->website                = $request->website;
            //}
    if($type == 'start_up' || $type == 'existing_business'){
            $business->acta_number	        = $request->acta_number;
            $business->number_of_year	      = $request->no_year;
    }
            //$business->registered_address = $request->address;
            //$business->name_of_director   = $request->director_name;
            $business->business_description = $request->desc;
	    $business->investor_type = $request->investor_type;
            $image_file = $request->image;
    
            if($request->hasFile('image')){
                $extension      = $image_file->getClientOriginalExtension();
                $filename       = time().rand(1000,9999).rand(1000,9999). '.' . $extension;
                $path           = public_path('upload/businessuser/thumb/' . $filename);
                $popularpath    = public_path('upload/businessuser/popularthumb/' . $filename);
                $recentpath     = public_path('upload/businessuser/recentthumb/' . $filename);
            
                $image_file->move(public_path('upload/businessuser/'), $filename);
                $_image = \Image::make(public_path('upload/businessuser/'.$filename))->resize(311, 200, function ($c) {$c->aspectRatio();$c->upsize();});
                $upload_success_img = $_image->save($path);
            
                \Image::make(public_path('upload/businessuser/'.$filename))->resize(229, 152, function ($c) {$c->aspectRatio();$c->upsize();})->save($popularpath);
                \Image::make(public_path('upload/businessuser/'.$filename))->resize(237, 57, function ($c) {$c->aspectRatio();$c->upsize();})->save($recentpath);
                if($upload_success_img){
                    $business->business_logo= $filename;
                }
            }
            
            $looking_for = $request->looking_for;
            if($looking_for == 'investors'){
                $looking_for1 = 'Investors';
            }
            else if($looking_for == 'selling_your_company'){
                $looking_for1 = 'Selling Your Company';
            }
            $business->looking_for = $looking_for1;
    
            if($looking_for == 'investors'){
                if($request->hasFile('upload_proposal')){                
                    $image 	  = $request->file('upload_proposal');
                    $filename = time() .'.' . $image->getClientOriginalExtension();
                    $path     = public_path('upload/proposal/' . $filename);
                    $image->move(public_path('upload/proposal/'), $filename);
                    $business->proposal_name = $filename;
                }
                $business->funds_required         = $request->enter_amt;
                $business->equity_exchange        = $request->equity_exchange;
            }
    
            $business->currency = $request->funds_req_currency;
    
            if($looking_for == 'selling_your_company'){
                if($request->hasFile('upload_proposal_selling')){                
                    $image 	              = $request->file('upload_proposal_selling');
                    $filename                 = time(). '.' . $image->getClientOriginalExtension();
                    $path                     = public_path('upload/proposal/' . $filename);
                    $image->move(public_path('upload/proposal/'), $filename);
                    $business->proposal_name  = $filename;
                }
            
                $business->selling_price          = $request->enter_selling_amt;
                $business->company_valuation      = $request->cmp_val;
            }
            
            $business->sp_currency            = $request->sp_currency;
            $business->cv_currency            = $request->cv_currency;
    
        //if($type == 'start_up' || $type == 'business_ideas')
        // {
            if($request->hasFile('sales_report')){                
                $image 	              = $request->file('sales_report');
                $filename                 = time().'.' . $image->getClientOriginalExtension();
                $path                     = public_path('upload/sales_report/' . $filename);
                $image->move(public_path('upload/sales_report/'), $filename);
                $business->sales_report_name  = $filename;
            }
            if($request->hasFile('pll_report')){                
            $image 	              = $request->file('pll_report');
            $filename                 = time(). '.' . $image->getClientOriginalExtension();
            $path                     = public_path('upload/pll_report/' . $filename);
            $image->move(public_path('upload/pll_report/'), $filename);
            $business->pll_report_name= $filename;
            }
            if($request->hasFile('valuation_report')){                
            $image 	              = $request->file('valuation_report');
            $filename                 = time(). '.' . $image->getClientOriginalExtension();
            $path                     = public_path('upload/valuation_report/' . $filename);
            $image->move(public_path('upload/valuation_report/'), $filename);
            $business->valuation_report_name= $filename;
            }
        // }
            $business->pv_currency           = $request->pv_currency;
            if($type == 'existing_business'){
            
                $business->predicted_valuation   = $request->enter_pv_amt;
                if($request->hasFile('supporting_documents')){                
                    $image 	              = $request->file('supporting_documents');
                    $filename               = time().rand(1000,9999) . '.' . $image->getClientOriginalExtension();
                    $path                     = public_path('upload/supporting_documents/' . $filename);
                    $image->move(public_path('upload/supporting_documents/'), $filename);
                    $business->supporting_document_name= $filename;
                }
            }
            $business->save();
            $inserted_id = $business->id; 
            if(isset($request->business_cat) && is_array($request->business_cat) && count($request->business_cat)>0){
                foreach($request->business_cat as $dtls){
                    $business_industries = new BusinessIndustries;
                    $business_industries->business_id = $inserted_id;
                    $business_industries->industry_id = $dtls;
                    $business_industries->save();         
                }
            }
            
            if( is_array($request->file('upload_doc')) && count($request->file('upload_doc'))>0){
                foreach($request->file('upload_doc') as $dtls){
                    if($dtls!=''){
                        $image 	              = $dtls;
                        $ext                      = $image->getClientOriginalExtension();
                        $filename                 = time().rand(1000,9999).'.'.$ext;
                        $path                     = public_path('upload/attachment/' . $filename);
                        $image->move(public_path('upload/attachment/'), $filename);
                        $business_doc = new BusinessDocuments;
                        $business_doc->business_id = $inserted_id;
                        $business_doc->document_name = $filename;
                        $business_doc->save();
                    }
                }
            }
    
            if( is_array($request->director_name) && count($request->director_name)>0){
                foreach($request->director_name as $dtls){
                    if($dtls!=''){
                        $business_director = new BusinessDirector;
                        $business_director->business_id = $inserted_id;
                        $business_director->director_name = $dtls;
                        $business_director->save();
                    }
                }
            }
            
            $data = array();
            $data['email']= $request->email;
            $data['password']= $request->password;
    
            $mail_config = array(
                                'from_mail'  	=> 'admin@invest.com',
                                'from_name'  	=> 'Business',
                                'to_mail'     	=> $request->email
                            );
    
            \Mail::send('emails.account', $data, function($message) use ($mail_config){
                $message->subject("Registration");
                $message->from($mail_config['from_mail']);
                $message->to($mail_config['to_mail']);
            });
    
            return view('business.signup_success')->with('succmsg','You have successfully signed up');
        }
        return view('business.signup_basic',$data);
    }

    
    
    public function send_otp(Request $request){
        $contact_no = $request->contact;
        $otp_value  = rand(100000,999999);
        
        $response = Twilio::message($contact_no, 'Your OTP is '.$otp_value);
        if(isset($response->sid) && $response->sid != ''){
            echo base64_encode($otp_value);
            exit;
        }
        else{
            echo 0;
            exit;
        }
    }
    
    public function buss_verify_otp(Request $request){
        
        $otp_value      =   $request->otp_value;
        $business_id    =   $request->business_id;
        $business       =   tmpBusiness::where("id","=",$business_id)
                            ->where('verified','=','No')
                            ->first();
        
        if(isset($business->otp_value) && $business->otp_value == $otp_value){
            $business->otp_value = '';
            $business->verified  = 'Yes';
            $business->save();
            echo 1;
            exit;
        }
        else
        {
            echo 0;
            exit;
        }
    }
    
    public function business_email_unique(Request $request){
        $email =  $request->email_business;
        $business   = Business::where("email","=",$email)->first();
        if($business){
            exit;
        }
        echo 'true';
        exit;
        //return count($business);
    }
    
    public function do_image_upload(){
		
        if(isset($_FILES['file']['name'])){
            $upload_config['field_name'] = 'file';
            $upload_config['file_upload_path'] = 'user/';
            $upload_config['allowed_types']	= 'jpg|jpeg|gif|png';
            
            $thumb_config['thumb_create'] = true;
            $thumb_config['thumb_file_upload_path'] = 'thumb/';
            $thumb_config['thumb_width'] = '200';
            $thumb_config['thumb_height'] = '200';
            $thumb_config['maintain_ratio'] = FALSE;
            
            $image_upload = image_upload($upload_config,$thumb_config);
            $img_name = isset($image_upload)?$image_upload:'';
            
            echo $img_name;
        }
    }
  
    public function download_file($file){
        $file_path= public_path(). "/upload/attachment/".$file;
        return response()->download($file_path, "attachment");
    }
    
    public function front_download_business_file($file){
        $file_path= public_path(). "/upload/attachment/".$file;
        return response()->download($file_path, "attachment");
    }
    
    public function front_download_proposal_file($file){
        $file_path= public_path(). "/upload/proposal/".$file;
        return response()->download($file_path, "attachment");
    }
    
    public function business_evaluation_email(Request $request){
        $details = array();
        $details['admin_mail']      = trim($request->admin_mail);
        $details['admin_name']      = $request->admin_name;
        $details['buss_name']       = $request->buss_name;
        $details['email']           = $request->email;
        $details['address']         = $request->address;
        $details['contact']         = $request->contact;
        $mail = Mail::send('emails.business_evaluation', array( 'buss_name'=>$details['buss_name'],'admin_name'=>$details['admin_name'],'email'=>$details['email'],'address'=>$details['address'],'contact'=>$details['contact'] ), function($message) use ($details)
                    {
                        $message->to($details['admin_mail'])->subject('A new Business Evaluation has arrived');
                    });
        echo $mail; exit;
    }
    
    public function details(Request $request){
         $data	        = array();
         $buss_id = Session::get('BUSINESS_ID');
          //$buss_id = 2;  
	if( !$buss_id || empty($buss_id) ){ 
	   return redirect('/');
	}
        else{
            $data['business'] = Business::where('id',$buss_id)->first();
        }
         $data['industry'] = industries::lists('industry_name','id')->all();
         $data['currency'] = Currencies::lists('country_currency_symbol','id')->all();
         $data['site_settings'] = Sitesettings::select('sitesettings_value','sitesettings_lebel')->where('id',1)->first();

        return view('business.business_edit',$data);
    }
    
    public function business_edit(Request $request){
         $data	        = array();
         $buss_id 	= Session::get('BUSINESS_ID');
	 
	 if( !$buss_id || empty($buss_id) ){ 
	   return redirect('/');
	 }
         else{
            $data['business'] = Business::where('id',$buss_id)->first();
         }
	 
         $data['industry'] 		= industries::lists('industry_name','id')->all();
         $data['currency'] 		= Currencies::lists('country_currency_symbol','id')->all();
         $data['site_settings']		= Sitesettings::select('sitesettings_value','sitesettings_lebel')->where('id',1)->first();
	 $data['selected_category']	= BusinessIndustries::where('business_id', '=', $buss_id)->lists('industry_id')->all();
	 $data['uploaded_document']	= BusinessDocuments::where('business_id', '=', $buss_id)->lists('document_name','id');

        return view('business.business_edit',$data);
    }
    
    public function business_details(){
        //\Helpers::chk_login();
        
        $data	        = array();
        $buss_id 	= Session::get('BUSINESS_ID');
        if( !$buss_id || empty($buss_id) ){ 
            return redirect('/');
        }
        
        
        
        
        
            $industry = array();
	
	
            $data = array();
            $business                        = Business::where('id',$buss_id)->first();
            $business_id                     = $business->id;
            $business->last_view             = date('Y-m-d h:i:s');
            $business->total_views           = $business->total_views + 1;
            $business->save();

//        $investor_id = Session::get('INVESTORS_ID'); 
//				if( !$investor_id || empty($investor_id) ){ 
//						return redirect('/');
//				}
//        else{
//             $industryData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
//                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
//                                        ->where('investors.id',$investor_id)
//                                        ->select('investors.*','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name')
//                                        ->orderBy('industries.id','ASC')->get();
//            foreach($industryData as $ivstD)
//                {
//                    array_push($industry,strtoupper($ivstD->industry_name));
//                }
            //$data['indus_name'] = implode(", ",$industry);
            $businessDetails = Business::find($business_id);
            $business_files = Businessfiles::where('business_id',$business_id)->get();
            $business_bio = BusinessDirector::where('business_id',$business_id)->get();
            $business_proposal = BusinessProposal::where('business_id',$business_id)->first();
            //$investor_name = Session::get('INVESTORS_NAME');
            //$investor_details = investors::where('id',$investor_id)->first();
            //$data['investor_name'] = $investor_name;
            $data['businessDetails'] = $businessDetails;
            $data['business_files'] = $business_files;
            //$data['investor_details'] = $investor_details;
            $data['business_proposal'] = $business_proposal;
            $data['business_bio'] = $business_bio;
	    
            $data['currency'] 		= Currencies::lists('country_currency_symbol','id')->all();
            $data['uploaded_document']	= BusinessDocuments::where('business_id', '=', $buss_id)->lists('document_name','id');
            //dd($data['businessDetails']);
            
            return view('business.business_details',$data);
        //}
    }
    
    public function update(Request $request){
	
         $data	        = array();
         $type1         =   '';
         $looking_for1  =   '';
         $data['industry'] = industries::lists('industry_name','id')->all();
         $data['currency'] = Currencies::lists('country_currency_symbol','id')->all();
         $data['site_settings'] = Sitesettings::select('sitesettings_value','sitesettings_lebel')->where('id',1)->first();
	
	 $buss_id = Session::get('BUSINESS_ID');
	 //echo $request->business_description; exit;
	
	    if($request->action == 'Process')
	    {
				$business                         = Business::find($buss_id);
			
				//$type                             = $request->business_type;
				//if($type == 'start_up')
				//{
				//    $type1 = 'Start Up';
				//}
				//else if($type == 'existing_business')
				//{
				//    $type1 = 'Existing Business';
				//}
				//else if($type == 'business_ideas')
				//{
				//    $type1 = 'Businees Ideas Only';
				//}
				//
				//
				//if($type == 'start_up' || $type == 'business_ideas')
				//{
				//    $business->business_name          = $request->bussiness_name;
				//}
				//if($type == 'existing_business')
				//{
				//    $business->mobile_number          = $request->contact;
				//    $business->website                = $request->website;
				//}
				
				$business->business_name          = $request->bussiness_name;
				if($request->website != '')
				{
				    $business->website                = $request->website;
				}
				
				$business->acta_number	      	= $request->acta_number;
				$business->number_of_year	      = $request->no_year;
				//$business->registered_address     = $request->address;
				//$business->name_of_director       = $request->director_name;
				$business->business_description   = $request->business_description;
				$business->company_portfolio   = $request->company_portfolio;
				$image_file = $request->image;
				
				if($request->hasFile('image'))
				{
				    $extension = $image_file->getClientOriginalExtension();
				    $filename  	              = time().rand(1000,9999) . '.' . $extension;
				    $path                         = public_path('upload/businessuser/thumb/' . $filename);
            $popularpath    = public_path('upload/businessuser/popularthumb/' . $filename);
            $recentpath     = public_path('upload/businessuser/recentthumb/' . $filename);
            
				    $image_file->move(public_path('upload/businessuser/'), $filename);
				    $_image= \Image::make(public_path('upload/businessuser/'.$filename))->resize(311, 200, function ($c) {$c->aspectRatio();$c->upsize();});
				    
				    $upload_success_img= $_image->save($path);
				    
            \Image::make(public_path('upload/businessuser/'.$filename))->resize(229, 152, function ($c) {$c->aspectRatio();$c->upsize();})->save($popularpath);
            \Image::make(public_path('upload/businessuser/'.$filename))->resize(237, 57, function ($c) {$c->aspectRatio();$c->upsize();})->save($recentpath);
            
            
            
				    if($upload_success_img){
                $business->business_logo= $filename;
				    }
				}
				$looking_for                      = $request->looking_for;
				//if($looking_for == 'Investors')
				//{
				//    $looking_for1 = 'Investors';
				//}
				//else if($looking_for == 'selling_your_company')
				//{
				//    $looking_for1 = 'Selling Your Company';
				////}
				//$business->looking_for            = $request->looking_for;
			       
				if($looking_for == 'Investors')
				{
				    if($request->hasFile('upload_proposal'))
				    {                
					$image 	              = $request->file('upload_proposal');
					$filename                 = time().rand(1000,9999) . '.' . $image->getClientOriginalExtension();
					$path                     = public_path('upload/proposal/' . $filename);
					$image->move(public_path('upload/proposal/'), $filename);
					$business->proposal_name  = $filename;
				    }
				    $business->currency               = $request->currency;
				    $business->funds_required         = $request->funds_required;
				}
				
				//
				
				if($looking_for == 'Selling Your Company')
				{
				    if($request->hasFile('upload_proposal_selling'))
				    {                
					$image 	              = $request->file('upload_proposal_selling');
					$filename                 = time().rand(1000,9999) . '.' . $image->getClientOriginalExtension();
					$path                     = public_path('upload/proposal/' . $filename);
					$image->move(public_path('upload/proposal/'), $filename);
					$business->proposal_name  = $filename;
				    }
				    $business->sp_currency            = $request->sp_currency;
				    $business->selling_price          = $request->enter_selling_amt;
				    $business->equity_exchange        = $request->equity_exchange;
				}
				
				//$business->cv_currency            = $request->cv_currency;
				//if($type == 'start_up' || $type == 'business_ideas')
				//{
				if($request->hasFile('sales_report'))
				    {
					//echo "aa"; die();
					$image 	              = $request->file('sales_report');
					$filename                 = time().rand(1000,9999) . '.' . $image->getClientOriginalExtension();
					$path                     = public_path('upload/sales_report/' . $filename);
					$image->move(public_path('upload/sales_report/'), $filename);
					$business->sales_report_name  = $filename;
				    }
				if($request->hasFile('pll_report'))
				    {                
					$image 	              = $request->file('pll_report');
					$filename                 = time().rand(1000,9999) . '.' . $image->getClientOriginalExtension();
					$path                     = public_path('upload/pll_report/' . $filename);
					$image->move(public_path('upload/pll_report/'), $filename);
					$business->pll_report_name= $filename;
				    }
				if($request->hasFile('valuation_report'))
				    {                
					$image 	              = $request->file('valuation_report');
					$filename                 = time() .rand(1000,9999). '.' . $image->getClientOriginalExtension();
					$path                     = public_path('upload/valuation_report/' . $filename);
					$image->move(public_path('upload/valuation_report/'), $filename);
					$business->valuation_report_name= $filename;
				    }
				//}
				//$business->pv_currency           = $request->pv_currency;
				//if($type == 'existing_business')
				//{
				
				$business->predicted_valuation   = $request->enter_pv_amt;
				if($request->hasFile('supporting_documents'))
				    {                
					$image 	              = $request->file('supporting_documents');
					$filename                 = time().rand(1000,9999). '.' . $image->getClientOriginalExtension();
					$path                     = public_path('upload/supporting_documents/' . $filename);
					$image->move(public_path('upload/supporting_documents/'), $filename);
					$business->supporting_document_name= $filename;
				    }
				//}
				
				
				$files = $request->file('media');
				$file_count = count($files);
				$uploadcount = 0;
				//echo $file_count;die();
				if($file_count>0){
				    
				
				foreach($files as $file) { 
				    $rules = array('file' => 'required|mimes:gif,png,jpg,jpeg,mp4,avg,mkv'); 
				    $validator = Validator::make(array('file'=> $file), $rules);
					if($validator->passes()){
					
					    $image_file = $file->getClientOriginalName();  
					    $extension  = $file->getClientOriginalExtension(); 
					    $fileName   = time().rand().'.'.$extension;
					    
           
	    
					    $path       = public_path('upload/businessfiles/thumb/'.$fileName); 
					    
					    $file->move(public_path('upload/businessfiles/'), $fileName);
					    if($extension == 'gif' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
					    {
					    $_image= \Image::make(public_path('upload/businessfiles/'.$fileName))->resize(150, 150, function ($c) {$c->aspectRatio();$c->upsize();});
					    
					    $upload_success= $_image->save($path);
					     $popularpath    = public_path('upload/businessfiles/businessSliderThumb/' . $fileName);
				    
            \Image::make(public_path('upload/businessfiles/'.$fileName))->resize(220, 170, function ($c) {$c->aspectRatio();$c->upsize();})->save($popularpath);
					    }
					    $uploadcount ++;
					    
					    $business_file = new Businessfiles;
					    $business_file->business_id = $buss_id;
					    $business_file->file_name = $fileName;
					    $business_file->save();
					    
					}
				    }
				}
				
			  $business->save();
			 
			BusinessDirector::where('business_id', '=', $buss_id)->delete();
				
			 if(count($request->director_name)>0)
			 {
			    for($d=0;$d<count($request->director_name);$d++)
			    {
				if($request->director_name[$d] != '' || $request->director_bio[$d] !='')
				{
				    $bio = new BusinessDirector;
				    $bio->business_id = $buss_id;
				    $bio->director_name = $request->director_name[$d];
				    $bio->director_bio  = $request->director_bio[$d];
				    $bio->save();
				}
				
			    }
			 }
			 
			if(isset($request->business_cat) && is_array($request->business_cat) && count($request->business_cat)>0)
			{
			    BusinessIndustries::where('business_id', '=', $buss_id)->delete();
			    foreach($request->business_cat as $dtls)
			    {
				$business_industries = new BusinessIndustries;
				$business_industries->business_id = $buss_id;
				$business_industries->industry_id = $dtls;
				$business_industries->save();         
			    }
			}
			
			if( is_array($request->file('upload_doc')) && count($request->file('upload_doc'))>0)
			{
			    
			    foreach($request->file('upload_doc') as $dtls)
			    {
				if($dtls!='')
				{
					$image 	              = $dtls;
					$ext                      = $image->getClientOriginalExtension();
					$filename                 = time().rand(1000,9999).'.'.$ext;
					$path                     = public_path('upload/attachment/' . $filename);
					$image->move(public_path('upload/attachment/'), $filename);
					$business_documents = new BusinessDocuments;
					$business_documents->business_id = $buss_id;
					$business_documents->document_name = $filename;
					$business_documents->save();
				}
			    }
			}
			
			return redirect::route('business_dashboard');
			//return view('business.signup_success')->with('succmsg','You have successfully signed up');
	    }
        //return view('business.signup_basic',$data);
    }

    
    
    public function login(Request $request){
        $data = array();
        $type = $request->type;
    
        if($type == "Business" && $request->action == "Process"){
            $validator = Validator::make(
                                            $request->all(),
                                            [	'email'                 => 'required|email',
                                                'password'              => 'required',
                                            ]
                                        );
    
            if ($validator->fails()){
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $email = $request->email;
                $password = $request->password;
                //$emailExists = $this->business_email_unique($email);
                $userDetails = Business::where("email","=",$email)->where('status','Active')->first();
    
                if(count($userDetails)>0){
                    $auth = auth()->guard('business');
                    $userdata = array('email' => $email, 'password' => $password);
                    
                    if($auth->attempt($userdata)){ 
                        Session::put('BUSINESS_ID', $userDetails->id);
                        Session::put('BUSINESS_NAME', $userDetails->name);
                        $data['id'] = $userDetails->id;
                        $data['val'] = 1;
                        return $data;     
                    }
                    else{ 
                        $data['id'] = '';
                        $data['val'] = 0;
                        return $data; 
                    }
                }
                else{
                    $data['id'] = '';
                    $data['val'] = 0;
                    return $data; 
                }
            }
        }
    }
    
    public function business_forgot_password(){ 
        $data= array();
        return view('business/forgotpassword',$data);
    }
    
    public function do_forgotpassword(Request $request){
        $validator = Validator::make(
                                        $request->all(),
                                        [		
                                            'email'  	=> 'required|email',
                                        ]
                                    );
        if ($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $email = $request->get('email');
            if(isset($email)){
                $mailExists= Business::where('email',$email)->get();		
               
                if(count($mailExists) > 0){	
                    $id= $mailExists[0]->id; 
                    $data = array();
                    $data['email']= $email;
                    $data['password']= str_random(8);
                    
                    $business= Business::find($id);
                    $business->password= $data['password'];
                    $business->save();
                    
                    $mail_config = array(
                                        'from_mail'  	=> 'mail@websmaster.com',
                                        'to_mail'     => $email
                                    );
                    
                    \Mail::send('emails.password', $data, function($message) use ($mail_config){
                        $message->subject("New Password");
                        $message->from($mail_config['from_mail']);
                        $message->to($mail_config['to_mail']);
                    });
                    return redirect::route('business_forgot_password')->with('succMessage', 'A Mail has been to to your mail id.');
                }
                else{
                    return redirect::route('register')->with('errorMessage', 'Mail Id not exists.');
                }
            }
        }
    }
    
    public function remove_doc(Request $request){
        $id = $request->data_id;
        $det = BusinessDocuments::where('id','=',$id)->first();
        
        $filename = $det['document_name'];
        
        @unlink(public_path('upload/attachment/'.$filename));	
        BusinessDocuments::where('id','=',$id)->delete();
        echo "success";
        //return true;
    }
    
    public function remove_bio(Request $request){
        $id = $request->data_id;
        
        BusinessDirector::where('id','=',$id)->delete();
        echo "success";
	//return true;
    }
    
    public function remove_photo(Request $request){
        $id = $request->data_id;
        $det = Businessfiles::where('id','=',$id)->first();
        
        $filename = $det['file_name'];
        
        @unlink(public_path('upload/businessfiles/'.$filename));
        @unlink(public_path('upload/businessfiles/thumb/'.$filename));
        Businessfiles::where('id','=',$id)->delete();
        echo "success";
        //return true;
    }
    
    public function downloadDoc($type,$filename){
        //PDF file is stored under project/public/download/info.pdf
        if($type == 'doc'){
            $filepath= public_path('upload/attachment/'.$filename);    
        }
        if($type == 'salse'){
            $filepath= public_path('upload/sales_report/'.$filename);    
        }
        if($type == 'pll'){
            $filepath= public_path('upload/pll_report/'.$filename);    
        }
        if($type == 'valuation'){
            $filepath= public_path('upload/valuation_report/'.$filename);    
        }
        
        //$headers = array('Content-Type: application/pdf');
        //return Response::download($file, 'filename.pdf', $headers);
        return \Response::download($filepath);
    }
    
    public function business_logout(){
        Session::forget('BUSINESS_ID');
        return redirect('/');
    }
    

    public function editprofile($id){ 
        $data= array();
        $BusinessUsers  = Business::find($id);
        $data['businessuser_details'] = $BusinessUsers;
        return view('business.editprofile',$data);
    }
    
    public function updateprofile(Request $request){ 
        $data= array();
        $type = $request->type;
        
        if($type == "Business" && $request->action == "Process"){ 
            $validator = Validator::make(
                                            $request->all(),
                                            [
                                                //'email'                 => 'required|email',
                                                'business_name'         => 'required',
                                                'mobile_number'         => 'required',
                                                'website'               => 'required',
                                                'registered_address'    => 'required'
                                            ]
                                        );
                
            if ($validator->fails()){ 
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{ 
                $id                             = $request->profileid_business;
                $Business                       = Business::find($id);
                $Business->business_name        = $request->business_name;
                //$Business->email                = $request->email;
                $Business->mobile_number        = $request->mobile_number;
                $Business->website              = $request->website;
                $Business->registered_address   = $request->registered_address;
                
                if($request->hasFile('image')){ 
                    @unlink(public_path().'/upload/businessuser/'.$Business->image);
                    @unlink(public_path().'/upload/businessuser/thumb/'.$Business->image);
                    
                    $image 	    = $request->file('image');
                    $filename  	= time() . '.' . $image->getClientOriginalExtension();
                    $path       = public_path('upload/businessuser/thumb/' . $filename);
                    
                    $image->move(public_path('upload/businessuser/'), $filename);
                    $image = \Image::make(public_path('upload/businessuser/'.$filename))->resize(334, 201,function ($c){$c->aspectRatio();$c->upsize();});
                    $image->save($path);    
                    
                    //\Image::make(public_path('upload/job/'.$filename))->resize(334, 201)->save($path);
                    $Business->business_logo = $filename;
                    $Business->save();
                    return Redirect::route('business_editprofile',$id)->with('succmsg','Profile Updated Successfully!');
                }
                else{
                    $Business->save();
                    return Redirect::route('business_editprofile',$id)->with('succmsg','Profile Updated Successfully!');
                }
            }
        }
        return view('business.editprofile',$data);
    }
    
    public function business_changepassword(){ 
        $data= array();
        
        $business_id = Session::get('BUSINESS_ID'); 
				if( !$business_id || empty($business_id) ){ 
						return redirect('/');
				}
        else{
            return view('business.business_changepassword',$data);
        }
    }
    
    public function business_do_changepassword(Request $request){ 
        $data= array();
        $business_id = Session::get('BUSINESS_ID');
        $type = $request->type;
        if($type == "Business" && $request->action == "Process"){ 
            $validator = Validator::make(
                                        $request->all(),
                                    [
                                        //'password'=> 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/| //confirmed',
                                        'old_business_password' => 'required',
                                        'business_password' => 'required|min:6',
                                        'business_password_confirm' => 'required|same:business_password'  
                                        ]
                                    );
                
            if ($validator->fails()){  
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $id                         = $business_id; 
                $Business                   = Business::find($id);
                if (Hash::check($request->old_business_password, $Business->password)){
                    $Business->password         = $request->business_password;
                    $Business->save();
                    return Redirect::route('business_changepassword')->with('succmsg','Password changed Successfully!');
                }
                else{
                    return Redirect::route('business_changepassword')->with('errmsg','Old Password does not matched!');
                }
            }
        }
        return view('business.business_changepassword',$data);
    }
    
    
    public function buss_name_unique(Request $request){
        $bussiness_name      = $request->bussiness_name;
        $buss_name_exist     = Business::where("business_name","=",trim($bussiness_name))->first();
        return count($buss_name_exist);
    }
    
}
