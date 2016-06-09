<?php $__env->startSection('content'); ?>
  
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span><?php echo e($discussion_list->text); ?> Details</span>
	
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>
		<li><a href="<?php echo e(URL::route('project_details',$discussion_list->project_id)); ?>">Project Details</a></li>           
                <li class="current"><a href="#" title="">Task Details</a></li>
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
		    <li class="active" data-target='discussions'>(<?php echo e(COUNT($discussion_list->getDiscussionList)); ?>) Discussions</li>
		  </ul>
	    </div>
            <div class="panel panel-default" id="discussions" >
              <div class="panel-heading clearfix">
                <h4 class="panel-title">Discussions</h4><a href="<?php echo e(URL::route('add_discussion',[$discussion_list->project_id,$discussion_list->id])); ?>">Add Discussion</a> 
              </div>	     
              <div class="panel-body">
		<?php if(COUNT($discussion_list->getDiscussionList)>0): ?>
		  <?php foreach($discussion_list->getDiscussionList as $k=>$v): ?>
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
			    <span><a href="<?php echo e(URL::route('download_file',$v->attached_file)); ?>" class="download_attached_files" data-file="<?php echo e($v->attached_file); ?>"><?php echo Html::image(asset('upload/arrows.png')); ?></a></span>
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
	      
        </div>
	</div>
    	<!-- Table with custom toolbar -->
    
    </div>
   <!-- Main content ends -->
    
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>