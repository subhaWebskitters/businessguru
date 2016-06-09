<?php $__env->startSection('content'); ?>
  
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span>Project List</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>                
                <li class="current"><a href="#" title="">Project List</a></li>
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
		<!--<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>--><h6>Project List</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
                <!--<a class="tOptions" title="Options"><img src="<?php echo e(asset('admin_assets/images/options')); ?>" alt="" /></a>-->
		<div class="tablePars" style="display:block">
			<?php echo Form::open(array('class' => 'searchForm', 'id' => 'search_form' , 'method' => 'post')); ?>

			    <div class="dataTables_filter" id="checkAll_filter">
				<label>Search:
				    <?php echo Form::text('client_search',$search,array('required','id'=>'client_search','placeholder'=>'Search by Project Name ','class'=>'ClientprojectSearchBox searchBox')); ?>

				</label>
			    </div>
			<div class="btmButton">
			    <input type="submit" value="Search" class="btn btn-default btn-sm" />
			    <input type="button" value="Show All" class="btn btn-default" id="show_all" name="show_all">
			</div>
			<?php echo Form::close(); ?>

			<div id="checkAll_length" class="dataTables_length">
			    <?php echo $project_list->render(); ?>

			</div>			
		    </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia dTable" id="checkAll">
                 <thead>
                      <tr>
		      <!--<th><img src="<?php echo e(asset('admin_assets/images/tableArrows.png')); ?>" alt="" /></th>-->
                         <th>Name</th>
			<th>Assigned Members</th>
			<th>Duration</th>
			<th>Created On</th>
                      </tr>
                    </thead>
                <tbody class="tbodyProject">		
		 <?php if($project_list->count() > 0): ?>
		      <?php foreach($project_list as $r): ?>			
                      <tr id="project_id_<?php echo e($r->id); ?>" style="cursor:pointer;">
		      <!--<td class="sorting_1 noBorderB">
			    <div class="checker" id="uniform-undefined">
				<span><input type="checkbox" id="titleCheck" name="page[]" value="<?php echo e($r->id); ?>" class="chkBox" /></span></div></td>-->
                        <td class="client_project_td"><?php echo e($r->project_unique_id); ?>-<?php echo e($r->project_name); ?></td>
			<td class="client_project_td">
			<?php if(COUNT($r->assignList)>0): ?>
			  <ul>
			  <?php foreach($r->assignList as $users): ?>
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
			</td>
			<td class="client_project_td"><?php echo e($r->project_duration); ?> Hrs</td>
			<td class="client_project_td"><?php echo e(date('d/m/Y',strtotime($r->created_at))); ?></td>
                      </tr>
                       <?php endforeach; ?>
		        <?php else: ?>
		       <tr><td colspan="9">No project Found</td></tr>
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

<?php echo $__env->make('clientView.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>