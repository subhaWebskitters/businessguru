<?php
namespace App\Http\Controllers;
use Twilio;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect, \Session,\Cookie;
use Illuminate\Cookie\CookieJar;
use Illuminate\Cookie\CookieServiceProvider;
use Hash;
use App\Http\Helpers;
use \Auth, \Mail;
use App\tmpInvestors,App\investors,App\industries,App\interests,App\InvestorIndustries, App\Business, App\Businessfiles, App\Sitesettings, App\BusinessProposal, App\BusinessInterestMail;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Input;
use DB;
use App\Investors_banner;


class InvesterController extends Controller
{
    public function signup(Request $request){ 

        $Investors          = new investors();
        $email              = $request->email; 
        
        //dd($request);
        
        $emailExists = $this->investor_email_unique($email);
        
        if($emailExists){
            return Redirect::route('save_invester_step')->with('errmsg','Email Already exists');
        }
        else{
            $password           = $request->password; 
            $investor_type      = $request->investor_type; 
            $name               = $request->name; 
            $contact            = $request->contact; 
            $company_name       = $request->company_name; 
            $arca_no            = $request->arca_no; 
            $address            = $request->address; 
            $about_company      = $request->about_company; 
            $annual_salary      = $request->annual_salary; 
            $willing_to_invest  = $request->willing_to_invest; 
            $industry_status    = $request->industry_status;
            
            $image_file         = $request->image;
        
            if($image_file){
                $extension = $image_file->getClientOriginalExtension();
                $fileName_img = time() . '.' . $extension;
                $path= public_path('upload/Investor/thumb/' . $fileName_img);
                
                $image_file->move(public_path('upload/Investor/'), $fileName_img);
                $_image= \Image::make(public_path('upload/Investor/'.$fileName_img))->resize(150, 150, function ($c) {$c->aspectRatio();$c->upsize();});
                
                $upload_success_img= $_image->save($path);
                
                if($upload_success_img){
                    $Investors->image= $fileName_img;
                }
            }
            
            $portfolio = $request->portfolio;
        
            if($portfolio){
                $extension = $portfolio->getClientOriginalExtension(); 
                $fileName_doc = rand(11111, 99999) . '.' . $extension; 
                $destinationPath = public_path('upload/Investor/');      
                $upload_success_doc = $portfolio->move($destinationPath, $fileName_doc);
            
                if($upload_success_doc){
                    $Investors->portfolio= $fileName_doc;
                }
            }
            
            $Investors->email               = $email;
            $Investors->password            = $password;
            $Investors->investor_type       = $investor_type;
            $Investors->name                = $name;
            $Investors->contact             = $contact;
            $Investors->company_name        = $company_name;
            $Investors->arca_no             = $arca_no;
            $Investors->address             = $address;
            $Investors->about_company       = $about_company;
            $Investors->annual_salary       = $annual_salary;
            $Investors->willing_to_invest   = $willing_to_invest;
            
            $Investors->save();         
            $inserted_id = $Investors->id; 
        
        
            for($i=0;$i<count($industry_status);$i++){
                $istatus = new InvestorIndustries();
                $istatus->investor_id = $inserted_id;
                $istatus->industry_id = $industry_status[$i];
                $istatus->created_at  = date('Y-m-d h:i:s');
                $istatus->save();
            }
            
            $data = array();
            $data['email']= $email;
            $data['password']= $password;
            
            $mail_config = array(
                                'from_mail'  	=> 'admin@invest.com',
                                'from_name'  	=> 'Invest',
                                'to_mail'     => $email
                            );
        
            \Mail::send('emails.account', $data, function($message) use ($mail_config){
                $message->subject("Registration");
                $message->from($mail_config['from_mail']);
                $message->to($mail_config['to_mail']);
            });
            
            return view('investor.final')->with('succmsg','A mail has been sent to your mail id');
        }
    }
    
    
    
    public function signup_basic(Request $request){  
        $data                = array();
        $data['industries']  = industries::where('status','Active')->orderBy('industry_name')->lists('industry_name', 'id');
        $data['interests']   = interests::where('status','Active')->orderBy('interest_name')->lists('interest_name', 'id');
        if($request->action == 'Process')
        {
                            $data['email']                  = $request->email;
                            $data['password']               = $request->password;
                         
             return view('investor.signup',$data);
        }
    }
    
    public function send_otp(Request $request){
        $contact_no         = $request->contact;
        $investor_id        = $request->investor_id;
        $otp_value          = rand(100000,999999);      
        
        $response = Twilio::message('+'.$contact_no, 'Your OTP is '.$otp_value);
        if(isset($response->sid) && $response->sid != '')
            echo $otp_value;
        else
            echo 0;
            
        exit;
    }
    
    public function verify_otp(Request $request){
        $otp_value      = $request->otp_value;
        $investor_id    = $request->investor_id;
        $investor           = tmpInvestors::where("id","=",$investor_id)
        ->where('verified','=','No')
        ->first();
        if(isset($investor->otp_value) && $investor->otp_value == $otp_value)
        {
            $investor->otp_value = '';
            $investor->verified  = 'Yes';
            $investor->save();
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
        $email      = $request->email;
        $investor   = investors::where("email","=",$email)->first();
        return count($investor);
    }
    public function investor_email_unique($email){
        //$email      = $request->email;
        $investor   = investors::where("email","=",$email)->first();
        return count($investor);
    }
    
    public function signin(Request $request){
        $data = array();
        
        $type = $request->type;
        if($type == "Investor" && $request->action == "Process"){
        
            $validator = Validator::make(
																				$request->all(),
                                        [		'email'     => 'required|email',
                                            'password'  => 'required',
                                        ]
																		);
            
            if ($validator->fails()){
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $email = $request->email;
                $password = $request->password;
                
                $emailExists = $this->investor_email_unique($email);
                $userDetails = investors::where("email","=",$email)->first();
                
                if($emailExists)
                {
                    $auth = auth()->guard('investors');
                    $userdata = array('email' => $email, 'password' => $password);
                        
                    if($auth->attempt($userdata)){
                        
                        //echo "<pre>";print_r($userDetails);exit();
                        
                        Session::put('INVESTORS_ID', $userDetails->id);
                        Session::put('INVESTORS_NAME', $userDetails->name);
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
                else
                {
                    $data['id'] = '';
                    $data['val'] = 0;
                    return $data; 
                }
            }
        }
    }
    
    
    public function investor_dashboard(Request $request){
        
        $maxprice = DB::table('business_users')->max('selling_price');
        
        
        
        //\Helpers::chk_login();
        $investor_id = Session::get('INVESTORS_ID');
        if($investor_id == 0 || $investor_id == '')
        {
            return redirect('/');
        }
        else
        {
            $data = Session::all();
            $investor_id = Session::get('INVESTORS_ID');
            $investor_name = Session::get('INVESTORS_NAME');
            $investor = investors::find($investor_id);
            
            //$industryData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
            //                            ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
            //                            ->where('investors.id',$investor_id)
            //                            ->select('investors.*','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name')
            //                            ->orderBy('industries.id','ASC')
            //                            ->paginate(10);
            
            
            $lastviewbusinessData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                                        ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
                                        ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
                                        ->where('investors.id',$investor_id)
                                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.last_view','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(10);
            
            
            
                                        
             $allindustryData = industries::orderBy('id','ASC')->get();                             
                         
            $businessData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                                        ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
                                        ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
                                        ->where('investors.id',$investor_id)
                                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('industries.id','ASC')
                                        ->groupBy('business_users.id')
                                        ->paginate(10);
                                    
            $data['allindustryData'] = $allindustryData;
            //$data['industryData'] = $industryData;
            $data['businessData'] = $businessData;  
            $data['max_price'] = $maxprice;
            $data['lastviewbusinessData'] = $lastviewbusinessData;
            $data['investors_banner'] = Investors_banner::where('status','Active')->get();
            //dd($businessData); 
            
            
            return view('investor.dashboard',$data);
        }
    }
    
    public function logout(){
        //Session::forget('INVESTORS_ID');
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    
//    public function business_search($industry_id,$investor_id){
//        //\Helpers::chk_login();
//        
//        $investor_id = Session::get('INVESTORS_ID'); 
//				if( !$investor_id || empty($investor_id) ){ 
//						return redirect('/');
//				}
//        else{
//        
//        
//            $industryData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
//                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
//                                        ->where('investors.id',$investor_id)
//                                        ->select('investors.*','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name')
//                                        ->orderBy('industries.id','ASC')
//                                        ->paginate(10);  
//            
//            
//            $businessData = Business::join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
//                                        ->join('investor_industries','business_industries.industry_id','=','investor_industries.industry_id')
//                                        ->join('investors','investor_industries.investor_id','=','investors.id')
//                                        ->where('business_industries.industry_id',$industry_id)
//                                        ->where('investors.id',$investor_id)
//                                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','business_users.created_at as listed_date')
//                                        ->orderBy('business_users.id','ASC')
//                                        ->paginate(10);
//                                        
//                                        
//            //dd($investorDetails);
//            $data['industryData'] = $industryData;
//            $data['businessData'] = $businessData;
//        
//            return view('investor.dashboard',$data);
//        }
//    }
    
    public function business_details($business_slug){
        //\Helpers::chk_login();
        
        //$businessDetails = Business::join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
        //                            ->where('business_users.id',$business_id)
        //                            ->get();
        $industry = array();
        $data = array();
            $business                        = Business::where('business_slug',$business_slug)->first();
            $business_id                     = $business->id;
            $business->last_view             = date('Y-m-d h:i:s');
            $business->total_views           = $business->total_views + 1;
            $business->save();

        $investor_id = Session::get('INVESTORS_ID'); 
//				if( !$investor_id || empty($investor_id) ){ 
//						return redirect('/');
//				}
//        else{
             $industryData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                                        ->where('investors.id',$investor_id)
                                        ->select('investors.*','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name')
                                        ->orderBy('industries.id','ASC')->get();
            foreach($industryData as $ivstD)
                {
                    array_push($industry,strtoupper($ivstD->industry_name));
                }
            $data['indus_name'] = implode(", ",$industry);
            $businessDetails = Business::find($business_id);
            $business_files = Businessfiles::where('business_id',$business_id)->get();
            $business_proposal = BusinessProposal::where('business_id',$business_id)->where('investor_id',$investor_id)->first();
            $investor_name = Session::get('INVESTORS_NAME');
            $investor_details = investors::where('id',$investor_id)->first();
            $data['investor_name'] = $investor_name;
            $data['businessDetails'] = $businessDetails;
            $data['business_files'] = $business_files;
            $data['investor_details'] = $investor_details;
            $data['business_proposal'] = $business_proposal;
            //dd($data['businessDetails']);
            
            return view('investor.business_details',$data);
        //}
    }
    
    public function business_search(Request $request){
        
        $industry_id = $request->industryid;  
        $investor_id = $request->investorid;
        
       
                                        
        $businessData = Business::join('business_industries', 'business_industries.business_id', '=', 'business_users.id')
                                    ->join('investor_industries','business_industries.industry_id','=','investor_industries.industry_id')
                                    ->join('investors','investor_industries.investor_id','=','investors.id')
                                    ->where('business_industries.industry_id',$industry_id)
                                    ->where('investors.id',$investor_id)
                                    ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','business_users.created_at as listed_date')
                                    ->orderBy('business_users.id','ASC')
                                    ->paginate(10);
                                    
                                    
        $data['businessData'] = $businessData;
        $view = \View::make('investor.business_details_content',$data);
        $contents = $view->render();

        echo $contents;
        exit;
    }
    
    public function forgot_password(){ 
        $data= array();
        return view('forgotpassword',$data);
    }
    
    public function do_forgotpassword(Request $request){
				
        $validator = Validator::make(
																				$request->all(),
																				[		
																						'email'  				=> 'required|email',
																				]
																				);
        if ($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $email = $request->get('email');
            if(isset($email)){
                $mailExists= investors::where('email',$email)->get();		
               
                if(count($mailExists) > 0){	
                    $id= $mailExists[0]->id; 
                    $data = array();
                    $data['email']= $email;
                    $data['password']= str_random(8);
                    
                    $investor= investors::find($id);
                    $investor->password= $data['password'];
                    $investor->save();
                    
                    $mail_config = array(
                                        'from_mail'  	=> 'mail@websmaster.com',
                                        'to_mail'     => $email
                                    );
                    
                    \Mail::send('emails.password', $data, function($message) use ($mail_config){
                        $message->subject("New Password");
                        $message->from($mail_config['from_mail']);
                        $message->to($mail_config['to_mail']);
                    });
                    return redirect::route('forgot_password')->with('succMessage', 'A Mail has been to to your mail id.');
                }
                else{
                    return redirect::route('register')->with('errorMessage', 'Mail Id not exists.');
                }
            }
        }
		}


    public function image_upload(){
        $data= array();
        return view('investor.image_upload',$data);
    }
    
    public function editprofile($id){ 
        $data= array();
        $Investors  = investors::find($id);
        $data['investor_details'] = $Investors;
        return view('investor.editprofile',$data);
    }
    
    public function updateprofile(Request $request){ 
        $data= array();
        $type = $request->type;
        
        if($type == "Investor" && $request->action == "Process"){ 
            $validator = Validator::make(
                                            $request->all(),
                                            [
                                                //'email'         => 'required|email',
                                                'name'          => 'required',
                                                'contact'       => 'required',
                                                'company_name'  => 'required',
                                                'address'       => 'required'
                                            ]
                                        );
                
            if ($validator->fails()){ 
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{ 
                $id                          = $request->profileid;
                $Investors                   = investors::find($id);
                $Investors->name             = $request->name;
                //$Investors->email            = $request->email;
                $Investors->contact          = $request->contact;
                $Investors->company_name     = $request->company_name;
                $Investors->address          = $request->address;
                
                if($request->hasFile('image')){ 
                    @unlink(public_path().'/upload/Investor/'.$Investors->image);
                    @unlink(public_path().'/upload/Investor/thumb/'.$Investors->image);
                    
                    $image 	    = $request->file('image');
                    $filename  	= time() . '.' . $image->getClientOriginalExtension();
                    $path       = public_path('upload/Investor/thumb/' . $filename);
                    
                    $image->move(public_path('upload/Investor/'), $filename);
                    $image = \Image::make(public_path('upload/Investor/'.$filename))->resize(334, 201,function ($c){$c->aspectRatio();$c->upsize();});
                    $image->save($path);    
                    
                    //\Image::make(public_path('upload/job/'.$filename))->resize(334, 201)->save($path);
                    $Investors->image = $filename;
                    $Investors->save();
                    return Redirect::route('editprofile',$id)->with('succmsg','Profile Updated Successfully!');
                }
                else{
                    $Investors->save();
                    return Redirect::route('editprofile',$id)->with('succmsg','Profile Updated Successfully!');
                }
            }
        }
        
        return view('investor.editprofile',$data);
    }
    
    public function changepassword(){ 
        $data= array();
        Session::get('INVESTORS_ID');
        return view('investor.changepassword',$data);
    }
    
    public function do_changepassword(Request $request){ 
        $data= array();
        $investors_id = Session::get('INVESTORS_ID');
        $type = $request->type;
        if($type == "Investor" && $request->action == "Process"){ 
            $validator = Validator::make(
                                            $request->all(),
                                            [
                //                                'password'         => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|
                //confirmed',
                                                'old_password' => 'required',
                                                'password' => 'required|min:6',
                                                'password_confirm' => 'required|same:password'   
                                            ]
                                        );
                
            if ($validator->fails()){  
                $messages = $validator->messages();
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
                $id                          = $investors_id; 
                $Investors                   = investors::find($id);
                //dd($Investors->password);
                if (Hash::check($request->old_password, $Investors->password))
                {
                    $Investors->password         = $request->password;
                    $Investors->save();
                    return Redirect::route('changepassword')->with('succmsg','Password changed Successfully!');
                }
                else
                {
                    return Redirect::route('changepassword')->with('errmsg','Old Password does not matched!');
                }
                
                
            }
        }
        return view('investor.changepassword',$data);
    }
    
    public function uploadimage(Request $request){
        if($request->action == "Process"){
            //$files = \Input::file('media'); 
            $files = $request->file('media');
            $file_count = count($files);
            $uploadcount = 0;
            
            foreach($files as $file) { 
                $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){
                 
                    $image_file = $file->getClientOriginalName();  
                    $extension  = $file->getClientOriginalExtension(); 
                    $fileName   = time().rand().'.'.$extension;
                    $path       = public_path('upload/imagetest/thumb/'.$fileName); 
                    
                    $file->move(public_path('upload/imagetest/'), $fileName);
                    $_image= \Image::make(public_path('upload/imagetest/'.$fileName))->resize(150, 150, function ($c) {$c->aspectRatio();$c->upsize();});
                   
                    $upload_success= $_image->save($path);    
                    $uploadcount ++;
                }
            }      
            //if($uploadcount == $file_count){
            //    Session::flash('success', 'Upload successfully'); 
            //    return Redirect::to('upload');
            //} 
            //else {
            //    return Redirect::to('upload')->withInput()->withErrors($validator);
            //}
            
            echo 'ok';
            exit;
        }

    }


    public function getDownload(){
        //PDF file is stored under project/public/download/info.pdf
        $filepath= public_path('upload/businessuser/1463733877.jpg');
        //$headers = array('Content-Type: application/pdf');
        //return Response::download($file, 'filename.pdf', $headers);
        return \Response::download($filepath);
    }
    //public function contact_submit(Request $request){
    //    $sitesettings = Sitesettings::select('sitesettings_name','sitesettings_value')->where('id',1)->first();
    //    $data['contact_from_name'] = $request->first_name;
    //    $data['contact_email'] = $request->email;
    //    $data['enquiry'] = $request->enquiry;
    //    $data['admin_from_name'] = $sitesettings['sitesettings_name'];
    //    //dd($data);
    //        $mail_config = array(
    //            'from_mail'  	=> $request->email,
    //            'from_name'  	=> $request->first_name,
    //            'to_mail'       => $sitesettings['sitesettings_value']
    //        );
    //        $is_mail = \Mail::send('emails.interested', $data, function($message) use ($mail_config){
    //            $message->subject("Interested");
    //            $message->from($mail_config['from_mail']);
    //            $message->to($mail_config['to_mail']);
    //        });
    //        echo $is_mail; exit;
    //}
    public function contact_submit(Request $request){
        $sitesettings = Sitesettings::select('sitesettings_name','sitesettings_value')->where('id',1)->first();
        $investor_id = Session::get('INVESTORS_ID');
        $investor_details = investors::select('name','email')->where('id',$investor_id)->first();
        $buss_id = $request->buss_id;
        $data['contact_from_name'] = $investor_details['name'];
        $data['contact_email'] = $investor_details['email'];
        $data['contact_email'] = $investor_details['email'];
        $data['buss_name'] = $request->buss_name;
        //dd($data);
        $bussInterestMailExists= BusinessInterestMail::where('business_id',$buss_id)->where('investor_id',$investor_id)->first();
        
              if(count($bussInterestMailExists) == 0){
                $BussInterestMail                   = new BusinessInterestMail();
                $BussInterestMail->business_id       = $buss_id;
                $BussInterestMail->investor_id       = $investor_id;
                $BussInterestMail->save();
            $mail_config = array(
                'from_mail'  	=> $investor_details['email'],
                'from_name'  	=> $investor_details['name'],
                'to_mail'       => $sitesettings['sitesettings_value']
            );
            $is_mail = \Mail::send('emails.interested', $data, function($message) use ($mail_config){
                $message->subject("Interested");
                $message->from($mail_config['from_mail']);
                $message->to($mail_config['to_mail']);
            });
            echo $is_mail; exit;
              }
               else
              {
                echo 2; exit;
              }
    }
    public function view_proposal_mail(Request $request){
        $sitesettings = Sitesettings::select('sitesettings_name','sitesettings_value')->where('id',1)->first();
        $data['contact_from_name'] = $request->name;
        $data['contact_email'] = $request->email;
        $data['admin_from_name'] = $sitesettings['sitesettings_name'];
        $data['buss_name'] = $request->buss_name;
        $investor_id = Session::get('INVESTORS_ID');
        $buss_id = $request->buss_id;
        //dd($data);
        $bussProposalExists= BusinessProposal::where('business_id',$buss_id)->where('investor_id',$investor_id)->first();
        
              if(count($bussProposalExists) == 0){
                $BusinessProposal          = new BusinessProposal();
                $BusinessProposal->business_id       = $buss_id;
                $BusinessProposal->investor_id       = $investor_id;
                $BusinessProposal->status            = 'Requested';
                $BusinessProposal->save();
                $mail_config = array(
                'from_mail'  	=> $request->email,
                'from_name'  	=> $request->name,
                'to_mail'       => $sitesettings['sitesettings_value']
            );
            $is_mail = \Mail::send('emails.admin_view_proposal', $data, function($message) use ($mail_config){
                $message->subject("Proposal Request");
                $message->from($mail_config['from_mail']);
                $message->to($mail_config['to_mail']);
            });
            $mail_config1 = array(
                                        'from_mail'  	=> $sitesettings['sitesettings_value'],
                                        'from_name'  	=> $sitesettings['sitesettings_name'],
                                        'to_mail'       => $request->email
                                    );
                                    \Mail::send('emails.view_proposal_user', $data, function($message) use ($mail_config1){
                                        $message->subject("Proposal Request");
                                        $message->from($mail_config1['from_mail']);
                                        $message->to($mail_config1['to_mail']);
                                    });
             
              echo $is_mail; exit;
              }
              else
              {
                echo 2; exit;
              }
              
            
    }
    
    public function recent_business(){
        $maxprice = DB::table('business_users')->max('selling_price');
        
        
        
        //\Helpers::chk_login();
        $investor_id = Session::get('INVESTORS_ID');
        if($investor_id == 0 || $investor_id == '')
        {
            return redirect('/');
        }
        else
        {
            $data = Session::all();
            $investor_id = Session::get('INVESTORS_ID');
            $investor_name = Session::get('INVESTORS_NAME');
            $investor = investors::find($investor_id);
                                      
            $allindustryData = industries::orderBy('id','ASC')->get();                             
                         
            $businessData = investors::join('investor_industries', 'investor_industries.investor_id', '=', 'investors.id')
                                        ->join('industries', 'investor_industries.industry_id', '=', 'industries.id')
                                        ->join('business_industries', 'investor_industries.industry_id', '=', 'business_industries.industry_id')
                                        ->join('business_users', 'business_industries.business_id', '=', 'business_users.id')
                                        ->where('investors.id',$investor_id)
                                        ->select('investors.*','business_users.*','investors.id as investor_id','business_users.id as business_id','investor_industries.investor_id','investor_industries.industry_id','industries.industry_name','business_users.created_at as listed_date')
                                        ->addSelect(\DB::Raw("GROUP_CONCAT(is_industries.industry_name) as category_list"))
                                        ->orderBy('business_users.last_view','DESC')
                                        ->groupBy('business_users.id')
                                        ->paginate(10);
                                    
            $data['allindustryData'] = $allindustryData;
            //$data['industryData'] = $industryData;
            $data['businessData'] = $businessData;  
            $data['max_price'] = $maxprice;
            $data['investors_banner'] = Investors_banner::where('status','Active')->get();
            //dd($data['investors_banner']);
            return view('investor.recent_business',$data);
        }
    }
}
