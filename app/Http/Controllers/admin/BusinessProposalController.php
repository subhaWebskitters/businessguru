<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BusinessProposal;
use App\Business;
use App\Http\Helpers;

class BusinessProposalController extends Controller
{
     public function index(Request $request)
    {
        $data['search'] 	= '';
        $data['status_search'] 	= '';
	
	if($request->search !='' || $request->status_search !='')
        {
	    //$data['search']        = $request->search;
	    $data['status_search'] = $request->status_search;
	
	    $data['results'] 		= BusinessProposal::where(function($query) use ($data) {
//					    if($data['search'] != ''){
//						$query->where('business_name','LIKE','%'.$data['search'].'%')
//                                                ->orWhere('name', 'LIKE', '%'.$data['search'].'%');
//					    }
					    if($data['status_search'] != ''){
						$query->where('status',$data['status_search']);
					    }
					})->orderBy('id','desc')->paginate(10);
	    
	}
        else
	{
            $data['results'] = BusinessProposal::orderBy('id','desc')->paginate(10);
           
	}
	
	
        
        return view('admin.business_proposal.list',$data);
    }
    
    public function set_status(Request $request)
    {
        $id 	        = $request->get('id');
        $rec            = BusinessProposal::find($id);
        $status         = $rec->status;
        if($status=='Requested'){
            $new_status = 'Approval';
        }
        else if($status=='Approval'){
				$new_status = 'Requested';
        }
        $rec->status = $new_status;
        $rec->save();
	echo $new_status;
    }
}
