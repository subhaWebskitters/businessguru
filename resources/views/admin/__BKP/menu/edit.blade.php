@extends('admin/layout')

@section('title', 'News Articles Update')

@section('content')
<style>
	    .selected{
			background:gray;
	    }
</style>

<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ asset('admin_assets/vendors/holder/jquery.form.min.js')}}"></script>
<script src="{{ asset('admin_assets/vendors/holder/blockui.js')}}"></script>
<script>
$(function() {
$( "#sortable_dev" ).sortable();
$( "#sortable_dev" ).disableSelection();

$( "#sortable_dev" ).sortable({
    stop: function( ) {
	    var sort_str = '';
	    $(".sort_sub_class").each(function( index ) {
		$(this).children('.picDiv').children('.itemImgDiv').children('.image_order').html('Image Order : '+(index+1));
		if (index == 0)
			sort_str = sort_str+$(this).attr('id').replace('company_sort_','');
	        else
			sort_str = sort_str+'@@'+$(this).attr('id').replace('company_sort_','');
	    });
	    $('#sort_order').val(sort_str);
    }
});

$(document).on('click', ".l2r", function(){
	    if ($(".sort_sub_selected").length == 0)
	    {
			alert('Please select a company...');
			return false;
	    }
	    var append_str = '';
	    var append_html = '';
	    $(".sort_sub_selected").each(function( index ) {
			var company_id    = $(this).attr('id').replace('company_sort_','');
			var logo_name  	  = $(this).attr('data-logo-name');
			var company_name  = $(this).attr('data-comp-name');
			$('#max_order').val(parseInt($('#max_order').val())-1);
			if (logo_name != '')
				    append_html = append_html+'<div data-comp-name="'+company_name+'" data-logo-name="'+logo_name+'" id="company_'+company_id+'" class="input-icon right company_list"><img width="50" height="50" alt="'+logo_name+'" src="http://hotelrec.dedicatedresource.net/upload/company/thumb/'+logo_name+'">'+company_name+'</div>';
			else
				    append_html = append_html+'<div data-comp-name="'+company_name+'" data-logo-name="'+logo_name+'" id="company_'+company_id+'" class="input-icon right company_list"><img width="50" height="50" alt="'+logo_name+'" src="http://hotelrec.dedicatedresource.net/front_asset/images/no_image.png">'+company_name+'</div>';
	
			append_str = append_str +'@@'+company_id;
			
			if ($('#sort_order').val().indexOf("@@")>0)
				    $('#sort_order').val($('#sort_order').val().replace('@@'+company_id,'').replace(company_id+'@@',''));
			else
				    $('#sort_order').val($('#sort_order').val().replace(company_id,''));

	    });
	    $('#non_sortable_dev').prepend(append_html);
	    $(".sort_sub_selected").remove();
	    
	    $(".sort_sub_class").each(function( index ) {
		$(this).children('.picDiv').children('.itemImgDiv').children('.image_order').html('Image Order : '+(index+1));		
	    });
});

$(document).on('click', ".r2l", function(){
	    if ($(".selected").length == 0)
	    {
			alert('Please select a company...');
			return false;
	    }
	    var append_str = '';
	    var append_html = '';
	    $(".selected").each(function( index ) {
			var company_id = $(this).attr('id').replace('company_','');
			var logo_name  = $(this).attr('data-logo-name');
			var company_name  = $(this).attr('data-comp-name');
			$('#max_order').val(parseInt($('#max_order').val())+1);
			if (logo_name != '')
			append_html = append_html+'<div id="company_sort_'+company_id+'" data-logo-name="'+logo_name+'" data-comp-name ="'+company_name+'" class="sort_sub_class company_sort_'+company_id+' ui-sortable-handle"><div class="picDiv"><div class="itemImgDiv"><img width="50" height="50" alt="'+logo_name+'" src="http://hotelrec.dedicatedresource.net/upload/company/thumb/'+logo_name+'"> '+company_name+' <span class="image_order">Image Order : '+$('#max_order').val()+'</span></div></div></div>';
	    else
			append_html = append_html+'<div id="company_sort_'+company_id+'" data-logo-name="'+logo_name+'" data-comp-name ="'+company_name+'" class="sort_sub_class company_sort_'+company_id+' ui-sortable-handle"><div class="picDiv"><div class="itemImgDiv"><img width="50" height="50" alt="'+logo_name+'" src="http://hotelrec.dedicatedresource.net/front_asset/images/no_image.png"> '+company_name+' <span class="image_order">Image Order : '+$('#max_order').val()+'</div></div></div></div>';
	
			append_str = append_str +'@@'+company_id;
	    });
	    if ($('#sort_order').val()=='')
			append_str = append_str.substring(2);
			
	    $('#sort_order').val($('#sort_order').val()+append_str);
	    if($(".sort_sub_class").length > 0)
			$(".sort_sub_class").last().after(append_html);
	    else
			$("#sortable_dev").html(append_html);
			
	    $(".selected").remove();
});

$(document).on('click', ".company_list", function(){
 if ($(this).hasClass('selected'))
	    $(this).removeClass('selected');
 else
	    $(this).addClass('selected');
});

$(document).on('click', ".sort_sub_class", function(){
 if ($(this).hasClass('sort_sub_selected'))
	    $(this).removeClass('sort_sub_selected');
 else
	    $(this).addClass('sort_sub_selected');
});

});
</script>
<?php $order_str = '';?>
	 

    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Edit Page Company</div>
                </div>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
		    <div class="panel panel-yellow">
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>array('admin_menu_update'),'class'=>'form-horizontal form-validate','files'=>true)) !!}
				    <div class="form-body pal">
                                                @if (count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                @endif
                                        <!--<div class="form-group"><label class="col-md-3 control-label" for="inputName">Page Name</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::label('title',$lists->menu_name,array('class'=>'form-control required','placeholder'=>'Enter Title','id'=>'title' ))!!}
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="pageName">Page Name:<strong>{{$lists->menu_name}}</strong></div>
					<div class="row">	
					<div class="col-md-5"><div class="newTitle"><h4 for="inputName">Company List</h4></div>
						<div class="listDiv">
                                            <div class="scrollDiv" id="non_sortable_dev">                                                
						@foreach($company_list as $v)
							    @if(!$v->exist)
							    <div class="input-icon right company_list" style="cursor:pointer;" id="company_{{$v->id}}" data-logo-name="{{$v->logo}}" data-comp-name="{{$v->name}}">
							    @if($v->logo!= '')
									{!! Html::image(asset('upload/company/thumb/'.$v->logo), $v->logo ,array('height'=>'50','width'=>'50'))!!}
							    @else
									{!! Html::image(asset('front_asset/images/no_image.png'), 'no-img',array('height'=>'50','width'=>'50'))!!}
							    @endif
                                                            {{$v->name}}
							    </div>
							    @endif
						@endforeach
						</div>
                                            </div>
					</div>
				        
				        <div class="col-md-2 switch_div">
						<div class="swichDivPan">
						<span class="l2r"><i class="fa fa-angle-double-left"></i></span>
						<span class="r2l"><i class="fa fa-angle-double-right"></i></span>
							    </div>
					</div>
										<div class="col-md-5">
						<div class="newTitle"><h4 for="inputName">Selected Company</h4></div>
						<div class="listDiv">	    
						<div class="scrollDiv" id="sortable_dev">
							    @if(isset($selected_company) && COUNT($selected_company)>0)
							    @foreach($selected_company as $k=>$v)
									<?php
									if($k!= 0)
										    $order_str = $order_str.'@@'.$v->company_id;
									else
										    $order_str = $order_str.$v->company_id;
									?>
							    <div id="company_sort_{{$v->company_id}}" data-logo-name="{{$v->companyDetails->logo}}" class="sort_sub_class company_sort_{{$v->company_id}}" data-comp-name="{{$v->companyDetails->name}}">
								<div class="picDiv">
								    <div class="itemImgDiv">
								    {!! Html::image(asset('upload/company/thumb/'.$v->companyDetails->logo),$v->companyDetails->logo ,array('height'=>'50','width'=>'50'))!!}
								    {{$v->companyDetails->name}}
								    <span class="image_order">Image Order : {{$v->sort_order}}</span>
								    </div>
							           
							        </div>		
							   </div>
							    @endforeach
							    @endif
						 </div>
						</div>
					</div>
				        <input type="hidden" name="sort_order"  id="sort_order" class="sort_order" value="{{$order_str}}"/>
				        <input type="hidden" name="max_order"   id="max_order"  class="max_order"  value="{{COUNT($selected_company)}}"/>
				        <input type="hidden" name="menu_id"     id="menu_id"    class="menu_id"    value="{{$menu_id}}"/>
                                        </div>
					</div>	
                                    </div>
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-5 col-md-7">
                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary' )) !!}&nbsp;&nbsp;
                                            {!! Html::linkRoute('admin_menu_listing', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                     
                         </div>
                </div>
            </div>
		
@endsection