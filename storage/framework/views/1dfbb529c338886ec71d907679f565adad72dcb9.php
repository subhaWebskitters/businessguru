<?php $__env->startSection('title', 'Business Proposal list'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
<div class="page-header pull-left">
<div class="page-title">Business Proposal List</div>
</div>
<ol class="breadcrumb page-breadcrumb pull-right">
<li>
<i class="fa fa-group"></i>&nbsp;
<a href="javascript:void(0);">Business Proposal</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
</li>
<li>
<i class="fa fa-list"></i>&nbsp;
<a href="javascript:void(0);">List</a>&nbsp;&nbsp;
</li>

</ol>
<div class="clearfix"></div>
</div>
<div class="page-content">
<div class="row">
<?php if(Session::has('succmsg')): ?>
<div class="note note-success"><p><strong>Well done!</strong> <?php echo e(Session::get('succmsg')); ?></p></div>

<?php endif; ?>
<div class="col-lg-12">


<div class="form-body pal">
<?php echo Form::open(array('route'=>'business_proposal','method'=>'post','class'=>'form-validate','novalidate','id'=>'searchForm')); ?>


<!--<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right"><i class="fa fa-group"></i>
<?php echo Form::text('search',$search,array('class'=>"form-control", 'id'=>"search","placeholder"=>"Search")); ?>

</div>
</div>
</div>-->
<!--<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right"><i class="fa fa-calendar"></i>

</div>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right"><i class="fa fa-calendar"></i>

</div>
</div>
</div>-->

<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right">
<i class="fa"></i>
<?php echo Form::select('status_search',[''=>'Select Status', 'Requested'=>'Requested', 'Approval'=>'Approval'], $status_search, array('class'=>"form-control", 'id'=>"status_search")); ?>

</div>
</div>
</div>

<div class="col-lg-3">
<input type="submit" name="submit" value="Search" class="btn btn-danger" />
<a href="<?php echo e(URL::route('business_proposal')); ?>" class="btn btn-success" >View All</a>
</div>
<?php echo Form::close(); ?>

</div>
<br>




<div class="portlet box portlet-orange">
<div class="portlet-header">
<div class="caption">Business Proposal List</div>
<div class="actions"></div>
</div>
<div class="portlet-body">
<div id="flip-scroll">
<table class="table table-bordered table-striped table-condensed cf">
<thead class="cf">
<tr>

<th>Investor name</th>
<th>Business Name</th>
<th>Status</th>

<th class="numeric">Action</th>                                           
</tr>
</thead>
	    <tbody>
			    <?php if($results->count() > 0): ?>
					    <?php foreach($results AS $r): ?>
							    <?php if(count($r->get_investor_detail()->first())>0): ?>
									    <?php /**/ $name = $r->get_investor_detail()->first()['name'];  /**/ ?>
							    <?php else: ?>
									    <?php /**/ $name = 'NA';  /**/ ?>
							    <?php endif; ?>
							    
							    <?php if(count($r->get_business_detail()->first())>0): ?>
									    <?php /**/ $businessname = $r->get_business_detail()->first()['business_name'];  /**/ ?>
							    <?php else: ?>
									    <?php /**/ $businessname = 'NA';  /**/ ?>
							    <?php endif; ?>
							    <tr>
									    <td><?php echo e($r->Investor->name); ?></td>
									    <td><?php echo e($r->Business->business_name); ?></td>
									    <td class='status-<?php echo e($r->id); ?>'>
											    <?php if($r->status == 'Requested'): ?>
													    <a href="javascript:void(0);" class="btn btn-default btn-xs btn-warning"><i class="fa"></i>Requested</a>
											    <?php else: ?>
													    <a href="javascript:void(0);" class="btn btn-default btn-xs btn-success"><i class="fa"></i>Approved</a>					
											    <?php endif; ?> 
									    </td>
									    <td>
											    <?php if($r->status=='Requested'): ?>
													    <label onclick="javascript:statusEditor('business_proposal',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-warning" title="Requested">
															    <i class="fa fa-check-square-o"></i>
													    </label>
	    
													    <!--<label onclick="javascript:statusEditor('business_proposal',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-success" title="Approval">
													    <i class="fa fa-check-square-o"></i>
													    </label>-->
											    <?php endif; ?>																							
									    </td>
							    </tr>
					    <?php endforeach; ?>
			    <?php else: ?>
					    <tr><td colspan="7" align="center">.:: Record Not Found ::.</td></tr>
			    <?php endif; ?>	
	    </tbody>
</table>
<div class="pagination-panel">
<?php echo $results->appends($search)->render(); ?>


</div>
</div>


</div>
</div>



</div>
</div>
</div>

<script>
$('#show_all').click(function(){

$('#search').val('');    
$('#searchForm').submit();
});
</script>		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>