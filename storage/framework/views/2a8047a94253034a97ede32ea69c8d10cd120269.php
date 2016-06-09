<?php $__env->startSection('content'); ?>
  
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span><?php echo e($project_details->project_name); ?> Job List</span>
	<ul class="quickStats">
            <li>
		 <?php if(Auth::user()->ability(array('owner'), array('project_manage_add')) ): ?><a href="<?php echo e(URL::route('add_task',$project_details->id)); ?>" class="blueImg"><img alt="" src="<?php echo e(asset('admin_assets/images/icons/quickstats/plus.png')); ?>"></a><?php endif; ?>
                <div class="floatR">
<strong class="blue">Add</strong>
<span>Task</span>
</div>
            </li>            
        </ul>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>                
                <li><a href="<?php echo e(URL::route('project')); ?>" title="">Project List</a></li>
		<li class="current"><a href="#" title="">Task List</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
	<?php if(Session::has('errorMessage')): ?>
	  <div align="center">
			<div class="nNote nFailure" style="width: 600px;">
				<p><?php echo e(Session::get('errorMessage')); ?></p>
			</div>
		</div>
		
	        <?php endif; ?>
	       <?php if(Session::has('successMessage')): ?>
		 <div align="center">
			<div class="nNote nSuccess" style="width: 600px;">
				<?php echo e(Session::get('successMessage')); ?>

			</div>
		</div>
		
		<?php endif; ?>
    	<!-- Media table sample -->
        <div class="widget check">
            <div class="whead">
		<!--<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>--><h6>Task List</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
                <div class="tablePars" style="display:block">
			<?php echo Form::open(array('class' => 'searchForm', 'id' => 'search_form' , 'method' => 'post')); ?>

			    <div class="dataTables_filter" id="checkAll_filter">
				<label>Search:
				    <?php echo Form::text('search',$searched_val,array('required','id'=>'search','placeholder'=>'Search by Job Name or Status','class'=>'projectSearchBox searchBox')); ?>

				</label>
			    </div>
			<div class="btmButton">
			    <input type="submit" value="Search" class="btn btn-default btn-sm" />
			    <input type="button" value="Show All" class="btn btn-default" id="show_all" name="show_all">
			</div>
			<?php echo Form::close(); ?>

			
		</div>

            <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia dTable" id="checkAll">
                 <thead>
                      <tr>
		      <!--<th><img src="<?php echo e(asset('admin_assets/images/tableArrows.png')); ?>" alt="" /></th>-->
                        <th>Job No</th>
			<th>Job Title</th>
			<th>Created By</th>
			<th>Assigned Members</th>			
			<th>Status</th>
			<th>Created On</th>
			<th>Deadline Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                <tbody class="tbodyTask">		
		 <?php if($task_list->count() > 0): ?>
		     <?php if($searched_val != ''): ?>
		      <?php foreach($task_list as $r): ?>	
			    <?php if(is_numeric(strpos($searched_val,$r->job_no)) || is_numeric(strpos($searched_val,$r->title)) || is_numeric(strpos(strtolower($searched_val),strtolower($r->status)))): ?>
                      <tr>
                        <td class="project_td"><?php echo e($r->job_no); ?></td>
			<td class="project_td"><?php echo e($r->title); ?></td>
			<td class="project_td">
			    <ul>
				<li class="user_image">
			      <?php if($r->getAdminDetails->image!= '' && file_exists(public_path().'/upload/adminuser/'.$r->getAdminDetails->image) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$r->getAdminDetails->image),$r->getAdminDetails->name,array('title'=>$r->getAdminDetails->name,'class'=>'','width'=>'50')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'),$r->getAdminDetails->name,array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php endif; ?>
				</li>
			    </ul>
			</td>
			<td class="project_td">
			<?php if(COUNT($r->getAssignedUserList)>0): ?>
			  <ul>
			  <?php foreach($r->getAssignedUserList as $users): ?>
			    <?php if(isset($users->userDetails->image)): ?>
			    <li class="user_image">
			      <?php if($users->userDetails->image!= '' && file_exists(public_path().'/upload/adminuser/'.$users->userDetails->image) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$users->userDetails->image),$users->userDetails->name,array('title'=>$users->userDetails->name,'class'=>'','width'=>'50')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php endif; ?>
			    </li>
			    <?php endif; ?>
			  <?php endforeach; ?>
			  </ul>
			<?php endif; ?>
			</td>
			<td class="project_td"><?php echo e(ucfirst($r->status)); ?></td>
			<td class="project_td"><?php echo e($r->created_at); ?></td>
			<td class="project_td"><?php echo e($r->deadline); ?></td>
                        <td>
			    <a class="tablectrl_small bDefault tipS editIcon" href="<?php echo e(URL::route('todo_discussion',$r->id)); ?>"  title="Discussion" ><span class="iconb" data-icon="&#xe1db;"></span></a>
			    <a class="tablectrl_small bDefault tipS editIcon" href="<?php echo e(URL::route('edit_task',$r->id)); ?>"  title="Edit" ><span class="iconb" data-icon="&#xe1db;"></span></a>
			    <a class="tablectrl_small bDefault tipS deleteIcon" href="<?php echo e(URL::route('delete_task',$r->id)); ?>" title="Remove" onclick="return confirm('Are you sure you want to delete this?');"><span class="iconb" data-icon="&#xe136;"></a>
			</td>
                      </tr>
			    <?php endif; ?>			
                       <?php endforeach; ?>
		    <?php else: ?>   
		        <?php foreach($task_list as $r): ?>			  
                      <tr>
                        <td class="project_td"><?php echo e($r->job_no); ?></td>
			<td class="project_td"><?php echo e($r->title); ?></td>
			<td class="project_td">
			    <ul>
				<li class="user_image">
			      <?php if($r->getAdminDetails->image!= '' && file_exists(public_path().'/upload/adminuser/'.$r->getAdminDetails->image) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$r->getAdminDetails->image),$r->getAdminDetails->name,array('title'=>$r->getAdminDetails->name,'class'=>'','width'=>'50')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'),$r->getAdminDetails->name,array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php endif; ?>
				</li>
			    </ul>
			</td>
			<td class="project_td">
			<?php if(COUNT($r->getAssignedUserList)>0): ?>
			  <ul>
			  <?php foreach($r->getAssignedUserList as $users): ?>
			    <?php if(isset($users->userDetails->image)): ?>
			    <li class="user_image">
			      <?php if($users->userDetails->image!= '' && file_exists(public_path().'/upload/adminuser/'.$users->userDetails->image) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$users->userDetails->image),$users->userDetails->name,array('title'=>$users->userDetails->name,'class'=>'','width'=>'50')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php endif; ?>
			    </li>
			    <?php endif; ?>
			  <?php endforeach; ?>
			  </ul>
			<?php endif; ?>
			</td>
			<td class="project_td"><?php echo e(ucfirst($r->status)); ?></td>
			<td class="project_td"><?php echo e($r->created_at); ?></td>
			<td class="project_td"><?php echo e($r->deadline); ?></td>
                        <td>
			    <a class="tablectrl_small bDefault tipS chatIcon" href="<?php echo e(URL::route('todo_discussion',$r->id)); ?>"  title="Discussion" ><span class="iconb" data-icon="&#xe1f0;"></span></a>
			    <a class="tablectrl_small bDefault tipS editIcon" href="<?php echo e(URL::route('edit_task',$r->id)); ?>"  title="Edit" ><span class="iconb" data-icon="&#xe1db;"></span></a>
			    <a class="tablectrl_small bDefault tipS deleteIcon" href="<?php echo e(URL::route('delete_task',$r->id)); ?>" title="Remove" onclick="return confirm('Are you sure you want to delete this?');"><span class="iconb" data-icon="&#xe136;"></a>
			</td>
                      </tr>			
                       <?php endforeach; ?>
		   <?php endif; ?>
		   
		        <?php else: ?>
		       <tr><td colspan="9">No record Found</td></tr>
		    <?php endif; ?>
                </tbody>
            </table>
        </div>
	</div>
    	<!-- Table with custom toolbar -->
    
    </div>
   <!-- Main content ends -->
    
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>