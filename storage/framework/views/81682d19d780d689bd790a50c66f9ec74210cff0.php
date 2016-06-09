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
		    <li  data-target='design' class="designList" id="<?php echo e($project_details[0]->id); ?>">(<?php echo e(COUNT($project_details[0]->getAttachmentList)); ?>) Design</li>
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
		
	    <div class="panel panel-default" id="design" style="display:none;">
              <div class="panel-heading clearfix">
                <h4 class="panel-title">Design</h4> <a href="<?php echo e(URL::route('client_add_comment',$project_details[0]->id)); ?>">Add Comment</a> 
              </div>	     
              <div class="panel-body">
		<?php if(COUNT($project_details[0]->getAttachmentList)>0): ?>		    
		  <?php foreach($project_details[0]->getAttachmentList as $k=>$v): ?>
		    <div class="discussion_list clearfix <?php if($k%2 == 0): ?> odd <?php else: ?> even <?php endif; ?>">
		      <div class="discussion_top">
			<div class="left">
			  <?php if($v->getAddedBy->image!= '' && file_exists(public_path().'/upload/adminuser/'.$v->getAddedBy->image) ): ?>
			    <?php echo Html::image(asset('upload/adminuser/'.$v->getAddedBy->image),'',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			  <?php else: ?>
			    <?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			  <?php endif; ?>
			</div>
			<div class="right">
			 <h3> <?php echo $v->getAddedBy->name; ?></h3>
			   <p>
			    <?php echo $v->note; ?>

			   </p>
			  <?php if($v->filename!= ''): ?>
			  <div class="attachment">
			  <?php
			    $info = new SplFileInfo($v->filename);
			    $file_type = $info->getExtension();			  
			  ?>
			  <?php if($file_type == 'doc' || $file_type == 'docx'): ?>
			    <?php echo Html::image(asset('icon/defult_doc.png'),'',array('class'=>'img-responsive img-circle','width'=>'140')); ?>

			  <?php elseif($file_type == 'pdf'): ?>
			    <?php echo Html::image(asset('icon/defult_doc.png'),'',array('class'=>'img-responsive img-circle','width'=>'140')); ?>

			  <?php elseif($file_type == 'xls' || $file_type == 'xlsx'): ?>
			    <?php echo Html::image(asset('icon/xls-121.png'),'',array('class'=>'img-responsive img-circle','width'=>'140')); ?>

			  <?php else: ?>
			    <?php if(file_exists(public_path().'/upload/attachment/'.$v->filename) ): ?>
			      <?php echo Html::image(asset('upload/attachment/'.$v->filename),'',array('class'=>'img-responsive img-circle','width'=>'140')); ?>

			    <?php else: ?>
			      <?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			    <?php endif; ?>
			  <?php endif; ?>
			    <span><a href="<?php echo e(URL::route('download_file',$v->filename)); ?>" class="download_attached_files" data-file="<?php echo e($v->filename); ?>"><?php echo Html::image(asset('upload/arrows.png')); ?></a></span>
			  </div>
			  <?php endif; ?>
			    <span class="discussion_bot">
			      Posted On <?php echo e(date('d M y',strtotime($v->created_at))); ?>

			    </span>
			</div>			
			<?php if($v->getAddedBy->user_type != 'Client'): ?>
			<div class="approve_status">
			    Client Approve Status: <?php echo e($v->is_approved); ?>

			</div>
			<div class="change_status">
			  <label>Approve/Disapprove</label>
			  <?php echo Form::select('status', array('Approved'=>'Approved','Disapproved'=>'Disapproved','Pending'=>'Pending'),$v->is_approved,array('id'=>'change_status_'.$v->id,'class'=>'change_design_status','data-design-id'=>$v->id)); ?>

			</div>
			<?php endif; ?>
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


<?php echo $__env->make('clientView.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>