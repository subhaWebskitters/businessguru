<?php namespace App\Http;
use \Route, \Config, \Session, \Redirect;
use App\Sitesettings;
use App\Specifications;
use App\Emailtemplate;
   

class Helpers {
       
	public static function randomString($length = 10){
		return $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}
	
	public static function random_token( $length = 8 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}
	
	public function url_title($str, $separator = '-', $lowercase = FALSE)
	{
		if ($separator == 'dash') 
		{
		    $separator = '-';
		}
		else if ($separator == 'underscore')
		{
		    $separator = '_';
		}
		
		$q_separator = preg_quote($separator);

		$trans = array(
			'&.+?;'                 => '',
			'[^a-z0-9 _-]'          => '',
			'\s+'                   => $separator,
			'('.$q_separator.')+'   => $separator
		);

		$str = strip_tags($str);

		foreach ($trans as $key => $val)
		{
			$str = preg_replace("#".$key."#i", $val, $str);
		}

		if ($lowercase === TRUE)
		{
			$str = strtolower($str);
		}

		return trim($str, $separator);
	}
        
        
	
        public static function getRoute($type){
            
            $classaction = class_basename(Route::currentRouteAction());
            $routeArr = explode('@', $classaction);
            
            switch ($type) {
                case 'controller':
                    return $routeArr[0];
                break;
                case 'action':
                    return $routeArr[1];
                break;
                case 'alise':
                    return Route::currentRouteName();
                break;
            }
            //return Route::currentRouteName();
            //return class_basename(Route::currentRouteAction());
        }
		
	public static function  isActiveRoute($route, $output = "active")
	{
		if (Route::currentRouteName() == $route) return $output;
	}
	
	
	/*
	FUNCTION NAME : sendMail()
        Parameter: 	1) $template_id    ( type: integer  )
			2) $recipient 	   (type: array() index: email,name )
			4) $replace_key    (type: array() index: all dynamic index like {username},{companyname},{jobtitle} etc )
        
	*/
	public static function sendMail($template_id,$recipient,$replace_key,$subject=''){
	    $to_name 		=  Sitesettings::where('id','3')->select('sitesettings_value')->first();
	    $admin_mail 	=  Sitesettings::where('id','2')->select('sitesettings_value')->first();
	    $template 		=  Emailtemplate::where('id',$template_id)->first();
	    
	     $mail_config = array(
                             'from_mail'  	=> $admin_mail->sitesettings_value,
                             'from_name'  	=> $to_name->sitesettings_value,
                             'to_mail'          => $recipient['email']
                             );
	    if($subject == ''){
		$mail_config['subject']          = $template->mail_subject;
	    }else{
		$k = array();$v = array();
		foreach($subject as $i=>$val){
		    $k[] = $i;
		    $v[] = $val; 
		}
		$mail_config['subject']          = str_replace($k,$v,$template->mail_subject);
	    }
	   
	    
	    $key = array();$val = array();
	    foreach($replace_key as $i=>$v){
		$key[] = $i;
		$val[] = $v; 
	    }
	    $data['template_text'] 	= str_replace(
					    $key,$val,
					    $template->mail_body);
	    $site_name             	=  Sitesettings::where('id','3')->select('sitesettings_value')->first();
	    $data['sitesettings_value'] = $site_name->sitesettings_value;
            //echo $data['template_text'];
            //exit;
	    \Mail::send('email_template', $data, function($message) use ($mail_config)
	    {
		$message->subject($mail_config['subject']);
		$message->from($mail_config['from_mail'], $mail_config['from_name']);
                //$message->from('noreply@hotelsrec.com','Hotelsrec');
		$message->to($mail_config['to_mail']);
	    });
	    
	    return true;
	}
	
	public static function time_ago ($tm, $rcs = 0) {
	    $cur_tm = time(); 
	    $dif = $cur_tm - $tm;
	    $pds = array('second','minute','hour','day','week','month','year','decade');
	    $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	  
	    for ($v = count($lngh) - 1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v--);
	      if ($v < 0)
		$v = 0;
	    $_tm = $cur_tm - ($dif % $lngh[$v]);
	  
	    $no = ($rcs ? floor($no) : round($no)); // if last denomination, round
	  
	    if ($no != 1)
	      $pds[$v] .= 's';
	    $x = $no . ' ' . $pds[$v];
	  
	    if (($rcs > 0) && ($v >= 1))
	      $x .= ' ' . $this->time_ago($_tm, $rcs - 1);
	  
	    return $x.' ago';
	}
	
	
	
	public static function getSettings($slug){
	    if($slug){
		$value = Sitesettings::where('sitesettings_lebel',$slug)->first();
		$value = $value->sitesettings_value;
		return $value;
	    }
	}
	
	public static function getSearchCategory(){
	    $data  = Specifications::where('status',"Active")->get();
	    return $data;
	}
	
	public static function getCategoryName($catId){
	    $data = Specifications::where('id',$catId)->first();
	    if(count($data)>0){
		return $data->name;
	    }
	    return '';
	}
        
    
		public static function chk_login(){
				$investor_id = Session::get('INVESTORS_ID'); 
				if( !$investor_id || empty($investor_id) ){ 
						return redirect('/');
				}
				return true;
		}
	
	
	public static function get_extension_icon($data){
		
		$ext = pathinfo($data, PATHINFO_EXTENSION);
		if($ext == 'pdf'){
			return $img_name = 'pdf_icon.png';
		}
		else if($ext == 'doc' || $ext == 'docx'){
			return $img_name = 'word_icon.png';
		}
		else if($ext == 'xls' || $ext == 'xlsx'){
			return $img_name = 'doc_icon.png';
		}
		else{
			return $img_name = '';
		}
	}
	
	public static function get_extension($data){
		$ext = pathinfo($data, PATHINFO_EXTENSION);
		return $ext;
	}
		
		
		
} //Class
