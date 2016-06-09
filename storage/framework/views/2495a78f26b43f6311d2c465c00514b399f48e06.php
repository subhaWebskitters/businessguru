<?php $__env->startSection('content'); ?>
  
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-suitcase"></span>Role Management List</span>
	<ul class="quickStats">
            <li>
               <?php if(Auth::user()->ability(array('owner'), array('role_add')) ): ?><a href="<?php echo e(URL::route('add_role')); ?>" class="blueImg"><img alt="" src="<?php echo e(asset('admin_assets/images/icons/quickstats/plus.png')); ?>"></a><?php endif; ?>
		   <div class="floatR">
<strong class="blue">Add</strong>
<span>Role</span>
</div>
            </li>            
        </ul>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="">Dashboard</a></li>                
                <li class="current"><a href="#" title="">Role Management List</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
	<?php if(Session::has('errorMessage')): ?>
	  <div align="center">
			<div class="nNote nFailure">
				<p><?php echo e(Session::get('errorMessage')); ?></p>
			</div>
		</div>
		
	        <?php endif; ?>
	       <?php if(Session::has('successMessage')): ?>
		 <div align="center">
			<div class="nNote nSuccess">
				<?php echo e(Session::get('successMessage')); ?>

			</div>
		</div>
		
		<?php endif; ?>
    	<!-- Media table sample -->
        <div class="widget check">
            <div class="whead">
		<!--<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>--><h6>Role Management List</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
               <!-- <a class="tOptions" title="Options"><img src="<?php echo e(asset('admin_assets/images/options')); ?>" alt="" /></a>-->
		<div id="checkAll_wrapper" class="dataTables_wrapper" role="grid">		    
		    <div class="tablePars" style="display:block">
			<?php echo Form::open(array('route' => 'role', 'class' => 'searchForm', 'id' => 'search_form' , 'method' => 'post')); ?>

			    <div class="dataTables_filter" id="checkAll_filter">
				<label>Search:
				    <?php echo Form::text('role_search',$search,array('required','id'=>'role_search','placeholder'=>'Search by Role Name or Description','class'=>'rolesearchBox searchBox')); ?>

				</label>
			    </div>
			<div class="btmButton">
			    <input type="submit" value="Search" class="btn btn-default" id="role_search_submit" name="role_search_submit">
			    <input type="button" value="Show All" class="btn btn-default" id="show_all" name="show_all">
			</div>
			<?php echo Form::close(); ?>

			<div id="checkAll_length" class="dataTables_length">
			    <?php echo $role_list->render(); ?>

			</div>			
		    </div>
		   
		    <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia dTable" id="checkAll">
			 <thead>
			      <tr>
			      <!--<th><img src="<?php echo e(asset('admin_assets/images/tableArrows.png')); ?>" alt="" /></th>-->
				<th>Role Name</th>
				<th>Description</th>
				<th>Action</th>
			      </tr>
			    </thead>
			<!--<tfoot>
			    <tr>
				<td colspan="7">
				    <div class="itemActions">
					<label>Apply action:</label>
					<select class="styled" name="apply_action" id="apply_action" >
					    <option value="">Select action...</option>                                    
					    <option value="Delete">Delete</option>
					    <option value="Activate">Activate</option>
					    <option value="Deactivate">Deactivate</option>
					</select>
				    </div>
				   
				</td>
			    </tr>
			</tfoot>-->
			<tbody class="tbodyRole">		
			 <?php if($role_list->count() > 0): ?>
			      <?php foreach($role_list AS $r): ?>
				
			      <tr>
			      <!--<td class="sorting_1 noBorderB">
				    <div class="checker" id="uniform-undefined">
					<span><input type="checkbox" id="titleCheck" name="page[]" value="<?php echo e($r->id); ?>" class="chkBox" /></span></div>
			      </td>-->
				<td><?php echo e($r->display_name); ?></td>
				<td><?php echo e($r->description); ?></td>
				<td><?php if(Auth::user()->ability(array('owner'), array('role_edit')) ): ?> <a href="<?php echo e(URL::route('edit_role',$r->id)); ?>" class="tablectrl_small bDefault tipS editIcon" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
				<?php endif; ?>
				<?php if(Auth::user()->ability(array('owner'), array('role_delete')) ): ?>
				  <a href="<?php echo e(URL::route('delete_role',$r->id)); ?>" class="tablectrl_small bDefault tipS deleteIcon" title="Remove" onclick="return confirm('Are you sure you want to delete this?');"><span class="iconb" data-icon="&#xe136;"></span></a>          
				  <?php endif; ?></td>
			      </tr>
			       <?php endforeach; ?>
				<?php else: ?>
			       <tr><td colspan="3">No record Found</td></tr>
			    <?php endif; ?>  
			</tbody>
		    </table>
		</div>
        </div>
	</div>
    	<!-- Table with custom toolbar -->
    
    </div>
   <!-- Main content ends -->
    
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>