<?php $__env->startSection('content'); ?>
  
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span>Project Details</span>
	
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>                
                <li class="current"><a href="#" title="">Project Details</a></li>
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
		<h6>Project Details</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
	    <div class="tabSection">
		  <ul>
		    <li class="active" data-target='discussions'>(<?php echo e(COUNT($project_details[0]->getGeneralDiscussionList)); ?>) Discussions</li>
		    <li  data-target='todo' class="todoList" id="<?php echo e($project_details[0]->id); ?>">(<?php echo e(COUNT($project_details[0]->todoList)); ?>) To-dos</li>
		  </ul>
	    </div>
            <div class="panel panel-default" id="discussions" >
              <div class="panel-heading clearfix">
                <h4 class="panel-title">Discussions</h4> <a href="<?php echo e(URL::route('add_discussion',[$project_details[0]->id,0])); ?>">Add Discussion</a> 
              </div>	     
              <div class="panel-body">
		<?php if(COUNT($project_details[0]->getGeneralDiscussionList)>0): ?>
		  <?php foreach($project_details[0]->getGeneralDiscussionList as $k=>$v): ?>
		    <div class="discussion_list clearfix <?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
		      <div class="discussion_top">
			<div class="left">
			  <?php if($v->getAdminDetails->image!= '' && file_exists(public_path().'/upload/adminuser/'.$v->getAdminDetails->image) ): ?>
			    <?php echo Html::image(asset('upload/adminuser/'.$v->getAdminDetails->image),'',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			  <?php else: ?>
			    <?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			  <?php endif; ?>
			</div>
			<div class="right">
			 <h3> <?php echo $v->getAdminDetails->name; ?></h3>
			   <p>
			    <?php echo $v->text; ?>

			   </p>
			  <?php if($v->attached_file!= ''): ?>
			  <div class="attachment">
			     <?php if(file_exists(public_path().'/upload/attachment/'.$v->attached_file) ): ?>
			    <?php echo Html::image(asset('upload/attachment/'.$v->attached_file),'',array('class'=>'img-responsive img-circle','width'=>'200')); ?>

			  <?php else: ?>
			    <?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			  <?php endif; ?>
			    <span><a href="<?php echo e(URL::route('download_file',$v->attached_file)); ?>" class="download_attached_files" data-file="<?php echo e($v->attached_file); ?>">Download file</a></span>
			  </div>
			  <?php endif; ?>
		      <span class="discussion_bot">
			Posted On <?php echo e(date('d M y',strtotime($v->created_at))); ?>

		      </span>
			</div>
		      </div>
		     
		    </div>
		  <?php endforeach; ?>
		<?php endif; ?>
              </div>
            </div>
	      
	    <div class="panel panel-default" id="todo" style="display:none;">
              <div class="panel-heading clearfix">
                <h4 class="panel-title">To Do</h4> <a href="<?php echo e(URL::route('add_task',$project_details[0]->id)); ?>">Add Task</a>
              </div>	     
              <div class="panel-body">
	      <?php if(COUNT($project_details[0]->todoList)>0): ?>
		<?php foreach($project_details[0]->todoList as $k=>$v): ?>
		  <div class="tododiv <?php echo e($v->status); ?> <?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
		    <div class="todo_heading"><?php echo e($v->heading); ?></div>
		    <div class="todo_bot">
		      <div class="todo_comment"><?php echo $v->note; ?></div>
		      <div class="todo_addedBy"><?php echo e($v->getAdminDetails->name); ?>-<?php echo e(date('D, M d',strtotime($v->created_at))); ?></div>
		      <div class="included_user">
			<span>Assigned list: </span>
			<?php if(COUNT($v->getAssignedUserList)>0): ?>
			  <ul>
			  <?php foreach($v->getAssignedUserList as $x): ?>
			    <li>
			      <?php if($x->userDetails['image']!= '' && file_exists(public_path().'/upload/adminuser/'.$x->userDetails['image']) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$x->userDetails['image']),'',array('title'=>$x->userDetails['name'],'class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('title'=>$x->name,'class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php endif; ?>
			    </li>
			  <?php endforeach; ?>
			  </ul>
			<?php endif; ?>
		      </div>
		      <div class="total_task">
			<div class="task_status" style="text-transform:capitalize;">
			  Task status: <?php echo e(ucfirst($v->status)); ?>

			</div>
			<?php if($v->created_by == Session::get('USER_ACCESS_ID')): ?>
			<div class="change_status">
			  <label>Change status</label>
			  <?php echo Form::select('status', array('pending'=>'pending','completed'=>'completed','failed'=>'failed'),$v->status,array('id'=>'change_'.$v->id,'class'=>'change_todo_status','data-todo-id'=>$v->id)); ?>

			</div>
			<div class="remove_todo">
			  <label class="remove_label" id="label_<?php echo e($v->id); ?>" onclick="confirm('Are you sure')">Remove</label>
			</div>
			<div class="details_todo">
			  <label class="details_label"><a href="<?php echo e(URL::route('todo_discussion',$v->id)); ?>">Details</a></label>
			</div>
			<?php endif; ?>
		      </div>
		    </div>
		  </div> 
		<?php endforeach; ?>
	      <?php endif; ?>
	      </div>
	    </div>
        </div>
	</div>
    	<!-- Table with custom toolbar -->
    
    </div>
   <!-- Main content ends -->
    
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>