<?php $__env->startSection('content'); ?>
  
  <div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icos-list2"></span>Role Permission Assign</span>
	<ul class="quickStats">
            <li>
                <!--<a href="" class="blueImg"><img src="" alt=""></a>
                <div class="floatR"><strong class="blue">Add</strong><span>Product</span></div>-->
            </li>            
        </ul>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="">Dashboard</a></li>                
                <li class="current"><a href="#" title="">Role Permission Assign</a></li>
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
		<h6>Role Permission Assign</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
               <?php echo Form::open(array('route'=>'permission_user_assign_store','class'=>'form-validate','novalidate')); ?>

            <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia dTable" id="checkAll">
                 <thead>
                      <tr>
		       <th>Permission List</th>
                                         <?php if($role_lists->count() > 0): ?>
					 <?php foreach($role_lists AS $rl): ?>
                                             
                        <th><?php echo e($rl->display_name); ?></th>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
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
                <tbody>		
		 <?php if($permission_lists->count() > 0): ?>
                                       
                                        
					 <?php for($i=0; $i<count($permission_lists); $i++): ?>
					  <?php /**/$per_role_array = array();/**/ ?>
					    <?php if($permission_role->count() > 0): ?>
					       <?php foreach($permission_role AS $pr): ?>
						 <?php if($permission_lists[$i]->id == $pr->permission_id): ?>
						 <?php /**/array_push($per_role_array,$pr->role_id);/**/ ?>
					         <?php endif; ?>
					       <?php endforeach; ?>
					     <?php endif; ?>
					   
                                         <tr>
                                            <td>
					    <?php echo e(Form::hidden('permission_id[]',$permission_lists[$i]->id)); ?>

                                                <?php echo e($permission_lists[$i]->display_name); ?>

                                            </td>
						
				               <?php if($role_lists->count() > 0): ?>
					       <?php foreach($role_lists AS $rl): ?>
						<?php if(in_array($rl->id,$per_role_array)): ?>
                                               <td><?php echo e(Form::checkbox('permission_type['.$rl->id.'][permission][]', $permission_lists[$i]->id, null, ['class' => 'form-control','checked'=>'checked'])); ?></td>
                                                <?php else: ?>
                                                <td><?php echo e(Form::checkbox('permission_type['.$rl->id.'][permission][]', $permission_lists[$i]->id, null, ['class' => 'form-control'])); ?></td>
						<?php endif; ?>
					     <?php endforeach; ?>
				             <?php endif; ?>
					 </tr>
                                         <?php endfor; ?>
		      <?php else: ?>
			 <tr><td colspan="<?php echo e($permission_lists->count()+1); ?>">No record Found</td></tr>
		    <?php endif; ?>
                </tbody>
            </table>
	      <div class="form-actions text-right pal">
                            <button class="buttonM bBlue" type="submit">Submit</button>
			    </div>
		    <?php echo Form::close(); ?>

        </div>
	</div>
    	<!-- Table with custom toolbar -->
    
    </div>
   <!-- Main content ends -->
    
    </div>


  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>