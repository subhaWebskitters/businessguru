<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Investors_banner;
use \Validator,\Redirect;

class InvestorsbannerController extends Controller
{
    public function index(Request $request){
        $data           = array();
        $data['lists']   = Investors_banner::get();
        return view('admin.investorbanner.list',$data);
    }
		
    public function create(){
        $data= array();
        return view('admin.investorbanner.add',$data);
    }
		
    public function store(Request $request){
        $data= array();
        $validator = Validator::make($request->all(),
                             [ 'title'    => 'required',
                               'image'    => 'required|mimes:jpeg,png,gif|image']
        );
   
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            $bimage         = new Investors_banner();
            $bimage->title  = $request->title;
            $image_file     = $request->image;
            
            $extension      = $image_file->getClientOriginalExtension();
            $fileName       = time() . '.' . $extension;
    
            $path           = public_path('upload/investorBanner/thumb/' . $fileName);
            
            $image_file->move(public_path('upload/investorBanner/'), $fileName);
            $_image= \Image::make(public_path('upload/investorBanner/'.$fileName))->resize(311, 200, function ($c) {$c->aspectRatio();$c->upsize();});
            
            $upload_success= $_image->save($path);    
            
                if ($upload_success) {
                                $bimage->image        = $fileName;
                                $bimage->save();
                                return Redirect::route('investorbannerlist')->with('succmsg','Banner add successfully');
                }
        }
    }
		
		
    public function edit($id){
        $data= array();        
        $data['details'] = Investors_banner::find($id);
        return view('admin.investorbanner.edit',$data);
    }
		
    public function update(Request $request){
	$data= array();
        $validator = Validator::make($request->all(),
                             [ 'title'    => 'required',
                               'image'    => 'mimes:jpeg,png,gif|image']
        );			
        if ($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $id                     = $request->id;
            $bimage                 = Investors_banner::find($id);
            $bimage->title          = $request->title;
            $bimage->status         = $request->status;
            
            $image_file             = $request->image;
            
            if($image_file != ''){
                            
                $extension = $image_file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;

                $path= public_path('upload/investorBanner/thumb/' . $fileName);
                $image_file->move(public_path('upload/investorBanner/'), $fileName);
                $_image= \Image::make(public_path('upload/investorBanner/'.$fileName))->resize(311, 200, function ($c) {$c->aspectRatio();$c->upsize();});
                $upload_success= $_image->save($path);    
                
                if ($upload_success) {
                                
                    $oldImage=  $bimage->image;
                    
                    if (file_exists(public_path('upload/investorBanner/'.$oldImage))){
                                    @unlink(public_path('upload/investorBanner/'.$oldImage));
                    }
                    
                    if (file_exists(public_path('upload/investorBanner/thumb/'.$oldImage))){
                                    @unlink(public_path('upload/investorBanner/thumb/'.$oldImage));
                    }
                    
                    $bimage->image    = $fileName;
                    $bimage->save();
                    return Redirect::route('investorbannerlist')->with('succmsg','Image Update successfully');
                }		
            }
            else{ 

                $bimage->save();
                return Redirect::route('investorbannerlist')->with('succmsg','Image Update successfully');
            }
}
    }

    public function delete($id){
        $saveBanner = Investors_banner::find($id);
        if (file_exists(public_path('upload/investorBanner/'.$saveBanner->image))){
                        @unlink(public_path('upload/investorBanner/'.$saveBanner->image));
        }
        
        if (file_exists(public_path('upload/investorBanner/thumb/'.$saveBanner->image))){
                        @unlink(public_path('upload/investorBanner/thumb/'.$saveBanner->image));
        }
	$saveBanner->delete();
        return Redirect::route('investorbannerlist')->with('succmsg','Image Deleted successfully');
    }
}
