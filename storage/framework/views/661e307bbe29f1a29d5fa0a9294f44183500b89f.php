<?php $__env->startSection('content'); ?>
			
<!-- Content begins -->
<div id="content">
<div id="contentInn">


    
    <!-- Main content -->
    <div class="wrapper">
    
    	<div class="dashBoardCont">
        	<h3 class="adminText">
		    Admin, welcome to Job Tracking System Administration page.
		   </h3>
			  <?php echo Form::open(['route'=>'dashboard','name'=>'dashboard_search','id'=>'dashboard_search','class' => 'form form-validate dashboardSearch whead widget searchForm']); ?>

		      <?php if($owner == 1 ): ?>
                     <div class="itemActions">
                        <label>User Select</label>
							
			<?php echo Form::select('user_list',$user_list1,$user_list,array('class' => 'form-control parsley-validated')); ?>

							</div>
                      
			<?php endif; ?>
			<?php if(isset($job_list1) && count($job_list1) > 1 && is_array($job_list1)): ?>
			<div class="itemActions">
                        <label>Job Number Select</label>
							
			<?php echo Form::select('job_no',$job_list1,$job_list,array('class' => 'form-control parsley-validated')); ?>

                      
			</div>
			
			<div class="itemActions">
                        <label>Job Status Select</label>
							
			<?php echo Form::select('job_status', array(''=>'Select Any','pending'=>'pending','failed'=>'failed','completed'=>'completed'), $status,array('class' => 'form-control')); ?>

                       </div>
			<?php endif; ?>
			<?php if(isset($customer_list1) && count($customer_list1) > 1 && is_array($customer_list1)): ?>			 
			<div class="itemActions">
                        <label>Customer Select</label>
							
			<?php echo Form::select('customer_select',$customer_list1,$customer_list,array('class' => 'form-control')); ?>

                      </div>
			<?php endif; ?>			
                    <div class="row">
			<div class="btmButton">
			    <?php echo Form::submit('Search',array('id'=>'add','class'=>'btn btn-default')); ?>

			    <?php echo Form::button('Clear',array('id'=>'show_all','class'=>'btn btn-default')); ?>

			</div>
                    </div>
			<?php echo Form::close(); ?>

		
					<?php if(count($project) > 0): ?>
						<div class="dashList">
					<h3 class="sorting">List of Project Assigned</h3>
						<div class="row dashboardSec">
						
						   <?php foreach($project AS $k=>$project_assigned): ?>
                                                      <a href="javascript:void(0);"
						      class="<?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
                                                            <div class="col-md-4">
                                                                <div class="box_stat box_ico">
                                                                    <span class="stat_ico stat_ico_4"><i class="fa fa-files-o"></i></span>
                                                                    <h4><?php echo e($project_assigned->project_name); ?> (Client - <?php echo e($project_assigned->client_name); ?>)</h4>
                                                                    <small><?php echo e($project_assigned->project_unique_id); ?></small>
                                                                </div>
                                                             </div>
                                                        </a> 
                                                   <?php endforeach; ?>
						
						</div>
						</div>
						<?php else: ?>
						<div class="dashList">
					<h3 class="sorting">List of Project Assigned</h3>No Record Found</div>

						<?php endif; ?>
						
					
						
					
					<?php if(count($job_status) > 0): ?>
					<div class="dashList dashSecond">
					<h3 class="sorting">List of Newly Assigned Job Status</h3>
						<div class="row dashboardSec">
						
						   <?php foreach($job_status AS $k=>$js): ?>
                                                      <a href="javascript:void(0);" class="<?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
                                                            <div class="col-md-4">
                                                                <div class="box_stat box_ico">
                                                                    <span class="stat_ico stat_ico_4"><i class="fa fa-files-o"></i></span>
                                                                    <h4><?php echo e($js->project_name); ?>(<?php echo e($js->job_no); ?>)</h4>
                                                                    <h5><?php echo e($js->title); ?></h5>
						                    <span class="jobPosted">Job Posted : <?php echo e(date('m-d-Y',strtotime($js->created_at))); ?></span>
						                    <span class="jobPosted">Deadline : <?php echo e(date('m-d-Y',strtotime($js->deadline))); ?></span>
						                    <p><?php echo $js->note; ?></p>
                                                                </div>
                                                             </div>
                                                        </a> 
                                                   <?php endforeach; ?>
						</div>
						</div>
						<?php else: ?>
						<div class="dashList">
					<h3 class="sorting">List of Project Assigned</h3>No Record Found</div>
						
						<?php endif; ?>
					
        </div>
    
    </div>
    <!-- Main content ends -->
</div> 
</div>
<!-- Content ends -->			

<script>
$('.odd').on({
  "click": function() {
    $(this).tooltip({ items: ".odd",tooltipClass: "ui_tooltip", content: function () {
                  return '<span id="msg" style="height:200px;">Page will come soon</span>';
               },position: {
        my: "center top",
        at: "center bottom"
      }});
    $(this).tooltip("open");
  }
});
$('.even').on({
  "click": function() {
    $(this).tooltip({ items: ".even",tooltipClass: "ui_tooltip", content: function () {
                  return '<span id="msg" style="height:200px;">Page will come soon</span>';
               },position: {
        my: "center top",
        at: "center bottom"
      }});
    $(this).tooltip("open");
  }
});
</script>

<style>
	.ui_tooltip{
			width:200px;
			text-align:center;
			height:30px;
			padding-top:10px;
	}		
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>