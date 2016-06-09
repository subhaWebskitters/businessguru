<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\HomeBanner;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use DB;
use \Session;
use App\Http\Helpers;
use Intervention\Image\Facades\Image as Image;

class HomeBannerImageController extends Controller
{
		public function index(Request $request){
				$value = Session::get('user_name');
				$data= array();
				$data['name']= $value;
				$images = HomeBanner::where('isDeleted','No')->get();
				$data['images']= $images;
				
				//dd($data['images']);
				return view('admin.home_banner.list',$data);
		}
		
		public function create(){
				$data= array();
				return view('admin.home_banner.add',$data);
		}
		
		public function store(Request $request){
				$data= array();
				$action = Input::get('action');
				if($action == "Process"){
						$validator = Validator::make(										);
						if ($validator->fails()){
						    $messages = $validator->messages();
						    return Redirect::back()->withErrors($validator)->withInput();
						}
						else{
								$bimage= new HomeBanner();
								
								$image_title= Input::get('banner_title');
								$question= Input::get('question');
								$answer= Input::get('answer');
								//$order= Input::get('order');
								$image_file = Input::file('bannerimage');
								
								$extension = $image_file->getClientOriginalExtension();
								$fileName = time() . '.' . $extension;
						
								$path= public_path('upload/homeBanner/thumb/' . $fileName);
								
								$image_file->move(public_path('upload/homeBanner/'), $fileName);
								$_image= \Image::make(public_path('upload/homeBanner/'.$fileName))->resize(311, 200, function ($c) {$c->aspectRatio();$c->upsize();});
								
								$upload_success= $_image->save($path);    
								
								if ($upload_success) {
										
										$bimage->banner_title 	= $image_title;
										$bimage->bannerimage    = $fileName;
										$bimage->question 			= $question;
										$bimage->answer    			= $answer;
										//$bimage->order 					= $order;
										
										$bimage->save();
										return Redirect::route('homepagebannerlist')->with('succmsg','Banner add successfully');
								}
						}
				}
				return view('admin.home_banner.add',$data);
		}
		
		
		public function edit($id){
        $data= array();
				$image_id= $id;
				
				$value = Session::get('user_name');
				$data['name']= $value;
				
				$data['details'] = HomeBanner::where('id',$id)->first();
				return view('admin.home_banner.edit',$data);
    }
		
		public function update(Request $request){
        $value = Session::get('user_name');
				$data= array();
				$data['name']= $value;
				
				$action = Input::get('action');
				if($action == "Process"){
						
						$validator = Validator::make(
																						$request->all(),
																						[
																								'banner_title' 	=> 'required',
																								'question'			=> 'required',
																								'answer'				=> 'required',
																								'bannerimage'		=> 'image|image_size:<=2500,<=1500|mimes:jpg,png,jpeg,gif'
																						]
																				);
				
						if ($validator->fails()){
						    $messages = $validator->messages();
						    return Redirect::back()->withErrors($validator)->withInput();
						}
						else{
								$id= $request->id;
								$bimage= HomeBanner::find($request->id);
								$bimage->banner_title= $request->banner_title;
								$bimage->question= $request->question;
								$bimage->answer= $request->answer;
								
								$image_file = Input::file('bannerimage');
								if($image_file != ''){
										
										$extension = $image_file->getClientOriginalExtension();
										$fileName = time() . '.' . $extension;
						
										$path= public_path('upload/homeBanner/thumb/' . $fileName);
										$image_file->move(public_path('upload/homeBanner/'), $fileName);
										$_image= \Image::make(public_path('upload/homeBanner/'.$fileName))->resize(311, 200, function ($c) {$c->aspectRatio();$c->upsize();});
										$upload_success= $_image->save($path);    
										
										if ($upload_success) {
												
												$oldImage=  $bimage->bannerimage;
												
												if (file_exists(public_path('upload/homeBanner/'.$oldImage))){
														@unlink(public_path('upload/homeBanner/'.$oldImage));
												}
												
												if (file_exists(public_path('upload/homeBanner/thumb/'.$oldImage))){
														@unlink(public_path('upload/homeBanner/thumb/'.$oldImage));
												}
												
												$bimage->bannerimage    = $fileName;
												$bimage->save();
												return Redirect::route('homepagebannerlist')->with('succmsg','Image Update successfully');
										}		
								}
								else{ 

										$bimage->save();
										return Redirect::route('homepagebannerlist')->with('succmsg','Image Update successfully');
								}
						}
				}
    }

		public function delete($id){
        $saveBanner = HomeBanner::find($id);
				$saveBanner->delete();
        return Redirect::route('homepagebannerlist')->with('succmsg','Image Deleted successfully');
    }
}
