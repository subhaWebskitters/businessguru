<?php $__env->startSection('content'); ?>
	<?php //echo $searched_job;exit;?>		
<!-- Content begins -->
<div id="content">
<div id="contentInn">

    <!-- Main content -->
    <div class="wrapper">    
    	<div class="dashBoardCont">
        	<h3 class="adminText">
		    Admin, welcome to Job Tracking System Client Panel.
		</h3>
		<?php echo Form::open(['route'=>'client_dashboard','name'=>'dashboard_search','id'=>'dashboard_search','class' => 'form form-validate dashboardSearch whead widget searchForm']); ?>


                     <div class="itemActions">
                        <label>Project Select</label>							
			<select name="project_list" class="form-control parsley-validated" style="width:200px;">
				<option value=''>Select Project</option>
			    <?php foreach($project_list as $v): ?>
				<option value="<?php echo e($v->id); ?>" <?php if($searched_project!= '' && $searched_project == $v->id): ?>selected <?php endif; ?>><?php echo e($v->project_name.' ('.$v->project_unique_id.')'); ?></option>
			    <?php endforeach; ?>
			</select> 
		    </div>
			<?php if(isset($job_list) && count($job_list) > 1): ?>
			<!--<div class="itemActions">
                        <label>Job Number Select</label>
			    <select name="job_id" class="form-control parsley-validated">
				    <option value=''>Select Job</option>
				<?php foreach($job_list as $v): ?>
				    <option value="<?php echo e($v['id']); ?>" <?php if($searched_job!= '' && $searched_job == $v['id']): ?>selected <?php endif; ?>><?php echo e($v['job_no']); ?></option>
				<?php endforeach; ?>
			    </select>                      
			</div>
			
			<div class="itemActions">
                        <label>Job Status Select</label>
			<?php echo Form::select('job_status', array(''=>'Select Any','pending'=>'pending','failed'=>'failed','completed'=>'completed'), $searched_job_status,array('class' => 'form-control')); ?>

                       </div>-->
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
		    <h3 class="sorting">All Projects</h3>
			<div class="row dashboardSec">
			
			   <?php foreach($project AS $k=>$project_assigned): ?>
			      <a href="<?php echo e(URL::route('client_project_details',$project_assigned->id)); ?>"
			      class="<?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
				    <div class="col-md-4">
					<div class="box_stat box_ico">
					    <span class="stat_ico stat_ico_4"><i class="fa fa-files-o"></i></span>
					    <h4><?php echo e($project_assigned->project_name); ?> (ID - <?php echo e($project_assigned->project_unique_id); ?>)</h4>
					    <div class="last_updated">
						Last updated on
						<?php if(isset($project_assigned->getLogList[0])): ?>
						    <?php echo e(date('d/m/Y', strtotime($project_assigned->getLogList[0]['created_at']))); ?>

						<?php else: ?>
						    <?php echo e(date('d/m/Y', strtotime($project_assigned->created_at))); ?>

						<?php endif; ?>
					    </div>
					    <div class="asign_list">
						<?php if(COUNT($project_assigned->assignList)>0): ?>
						<ul>
						<?php foreach($project_assigned->assignList as $users): ?>
						  <li class="user_image">
						    <?php if($users->userDetails->image!= '' && file_exists(public_path().'/upload/adminuser/'.$users->userDetails->image) ): ?>
						      <?php echo Html::image(asset('upload/adminuser/'.$users->userDetails->image),$users->userDetails->name,array('title'=>$users->userDetails->name,'class'=>'','width'=>'50')); ?>

						    <?php else: ?>
						      <?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

						    <?php endif; ?>
						  </li>			    
						<?php endforeach; ?>
						</ul>
					      <?php endif; ?>
					    </div>
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
		
		<div class="dashList dashSecond">
		    <h3 class="sorting">Latest Activity</h3>
			<div class="row dashboardSec">
			
			   <?php foreach($notification_list AS $k=>$x): ?>
			      <a href="<?php echo e(URL::route('client_project_details',$x->getProjectDetails->id)); ?>"
			      class="<?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
				    <div class="col-md-4">
					<div class="box_stat box_ico">
					    <span class="stat_ico stat_ico_4"><i class="fa fa-files-o"></i></span>
					    <h4><?php echo e($x->getProjectDetails->project_name); ?> (ID - <?php echo e($x->getProjectDetails->project_unique_id); ?>)</h4>
					    <div class="text"><?php echo e($x->note); ?></div>
					    <div class="performed_on">Performed on <?php echo e(date('d/m/Y', strtotime($x->created_at))); ?></div>
					    <div class="performed_by">Performed by <?php echo e($x->getUserDetails->name); ?></div>
					</div>
				     </div>
				</a> 
			   <?php endforeach; ?>
			</div>
		</div>
		    
		<!--<div class="dashList dashSecond">
		    <h3 class="sorting">Latest Jobs</h3>
			<div class="row dashboardSec">
			
			   <?php foreach($job_list_bot AS $k=>$x): ?>
			      <a href="<?php echo e(URL::route('client_project_details',$x->getProjectDetails->id)); ?>"
			      class="<?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
				    <div class="col-md-4">
					<div class="box_stat box_ico">
					    <span class="stat_ico stat_ico_4"><i class="fa fa-files-o"></i></span>
					    <h4><?php echo e($x->getProjectDetails->project_name); ?> (JOB ID - <?php echo e($x->job_no); ?>)</h4>
					    <div class="text"><?php echo e($x->title); ?></div>
					    <div class="job_status"><?php echo e($x->status); ?></div>
					    <div class="performed_on">Added on <?php echo e(date('d/m/Y', strtotime($x->created_at))); ?></div>
					</div>
				     </div>
				</a> 
			   <?php endforeach; ?>
			</div>
		</div>	-->	    

        </div>    
    </div>
    <!-- Main content ends -->
</div> 
</div>
<!-- Content ends -->			
<?php $__env->stopSection(); ?>

<?php echo $__env->make('clientView/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>