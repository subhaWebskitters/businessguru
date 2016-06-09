<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect, \Session,\Cookie;
use App\Currencies;

class CurrenciesController extends Controller
{
   public function index(Request $request)
    {
        $data	                    = array();
        $data['search'] = '';
        
        $search = trim( $request->get('search') );
        $data['search'] = $search;
        if($search){
        $data['currency_list'] =  Adminusers::select('country_name',
                                             'country_code',
                                             'currency_name',
                                             'country_currency_symbol',
                                             'country_currency_status')
                                     ->where(function($q) use ($search) { 
                                    $q->where('country_name','LIKE','%'.$search.'%');
                                    $q->orWhere('country_code','like','%'.$search.'%');
                                    $q->orWhere('currency_name','like','%'.$search.'%');
                                            })
				    ->orderBy('country_name', 'ASC')
                                    ->paginate(10);
        }else{
            $data['currency_list'] = Currencies::select('id','country_name',
                                             'country_code',
                                             'currency_name',
                                             'country_currency_symbol',
                                             'country_currency_status')
				    ->orderBy('country_name', 'ASC')
                                    ->paginate(10);
           
        }
        return view('admin.currency.list', $data);
    }
     
	  
	  
		public function create(Request $request){
			
			$data	                    = array();
			// $data['errors']             = '';
        if ($request->isMethod('post')){
				$validator = Validator::make($request->all(),
														[                       
															'country_name' => 'required',
															'country_code' => 'required',
															'currency_code' => 'required',
															'currency_name' => 'required',
															'country_currency_symbol'=> 'required',
															'country_currency_status'=> 'required' 
														]
													);
				if ($validator->fails()){
					$messages = $validator->messages();
               return Redirect::back()->withErrors($validator)->withInput();
            }
            else{
               $country_name					=	$request->get('country_name');
					$country_code					=	$request->get('country_code');
					$currency_code					=	$request->get('currency_code');
					$currency_name					= 	$request->get('currency_name');
					$country_currency_symbol	=	$request->get('country_currency_symbol');
					$country_currency_status	=	$request->get('country_currency_status');
                                    
               $newCurrency						=	new Currencies;
					$newCurrency->country_name		=	$country_name;
					$newCurrency->country_code		=	$country_code;
					$newCurrency->currency_code		=	$currency_code;
					$newCurrency->currency_name		=	$currency_name;
					$newCurrency->country_currency_symbol		=	$country_currency_symbol;
					$newCurrency->country_currency_status		=	$country_currency_status;
               $newCurrency->save();
					$newCurrencyID	=	$newCurrency->id;
					if($newCurrencyID){
						return redirect::route('currency')->with('succmsg', 'New currency has been created successfully.');
					}
					else{
						return redirect::back()->with('errmsg', 'Currency not added. Please try again.');
					}
            }
			}
			return view('admin.currency.create',$data);
		}
 
		
		public function edit($id){
			   $getDetails  = Currencies::find($id);
				if($getDetails){
					$data['currency_details'] = Currencies::where('id',$id)->first();
					return view('admin.currency.edit',$data);
				}
				else{
					echo "Invalid ID. Please try with different record.";
				}

		}

    public function update(Request $request){
			
			if ($request->isMethod('post')){
				$id	 = $request->get('currency_id');
				$validator = Validator::make(	$request->all(),
														[
															'country_name' => 'required',
															'country_code' => 'required',
															'currency_code' => 'required',
															'currency_name' => 'required',
															'country_currency_symbol'=> 'required',
															'country_currency_status'=> 'required'
														]
													);
	  
				if ($validator->fails()){
					$messages = $validator->messages();
					return Redirect::back()->withErrors($validator)->withInput();
				}
				else{
					$id                         = $request->get('currency_id');
					$country_name					=	$request->get('country_name');
					$country_code					=	$request->get('country_code');
					$currency_code					=	$request->get('currency_code');
					$currency_name					= 	$request->get('currency_name');
					$country_currency_symbol	=	$request->get('country_currency_symbol');
					$country_currency_status	=	$request->get('country_currency_status');
					
					$get_ID                  	= Currencies::find($id);
					
					$get_ID->country_name		= $country_name;
					$get_ID->country_code		= $country_code;
					$get_ID->currency_code		= $currency_code;
					$get_ID->currency_name		= $currency_name;
					$get_ID->country_currency_symbol	=	$country_currency_symbol;
					$get_ID->country_currency_status	=	$country_currency_status;
					if($get_ID->save()){
                     return redirect::route('currency')->with('succmsg', 'Currency updated successfully.');
					}
					else{
                  return redirect::back()->with('errMsg', 'Currency not updated. Please try again.');                   
					}
            }
			}
    }
		
		
		
		public function delete(Request $request){
			
			$currency_id = $request->get('currency_id');
			$result  = Currencies::find($currency_id)->delete();
			if($result){
            echo "ok";
			}else{
            echo "fail";
			}
		}
	 
	 
	 
    public function search_client(Request $request)
    {
        $data	                    = array();
        $search = trim( $request->get('val') );
        if($search){
        $data['client_list'] =   Adminusers::select('id',
                                             'name',
                                             'image',
                                             'email',
                                             'status')
                                            ->where('user_type','Client')
                                            ->where(function($q) use ($search) { 
                                    $q->where('name','LIKE','%'.$search.'%');
                                    $q->orWhere('email','like','%'.$search.'%');
                                    $q->orWhere('status','like','%'.$search.'%');
                                            })
                                            ->get();
        }
        else{
            $data['client_list'] =  Adminusers::select('id',
                                             'name',
                                             'image',
                                             'email',
                                             'status')
                                    ->where('user_type','Client')
                                    ->paginate(10);
           
        }
        $html = "";
       if(count($data['client_list']) > 0){
	foreach($data['client_list'] AS $r){
                     $html .= "<tr><td>";
                     if($r->image!= '' && file_exists(public_path().'/upload/adminuser/'.$r->image) )
                     {
                       $html .= "<img class='img-responsive img-circle' width='60' height='60' alt='' src='".asset('upload/adminuser/'.$r->image)."'>";
                     }
                     else
                     {
                         $html .= "<img class='img-responsive img-circle' width='60' height='60' alt='' src='asset('upload/no-img.png')'>";
                     }
			    
			$html .="</td><td>".$r->name."</td><td>".$r->email."</td><td>".$r->status."</td><td>";
                        
                        $html .="<a class='tablectrl_small bDefault tipS editIcon' href='".URL::route('edit_client',$r->id)."' title='Edit'><span class='iconb' data-icon='&#xe1db;'></span></a>";
                       
                         $html .= "<a class='tablectrl_small bDefault tipS deleteIcon' href='".URL::route('delete_client',$r->id)."'  onclick='return confirm('Are you sure you want to delete this?');' title='Remove'><span class='iconb' data-icon='&#xe136;'></a>";
                       
                        $html .= "</td></tr>";
        }
       }
       else
       {
		       $html .= "<tr><td colspan='9'>No record Found</td></tr>";
       }
      echo $html; exit;
    }
}
