<?php $__env->startSection('content'); ?>
  
  <div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-users"></span>Sitesettings List</span>
	<ul class="quickStats">
            <li>
            </li>            
        </ul>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="">Dashboard</a></li>                
                <li class="current"><a href="#" title="">Sitesettings List</a></li>
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
		<h6>Sitesettings List</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
	    <div id="checkAll_wrapper" class="dataTables_wrapper" role="grid">
	    <div class="tablePars" style="display:block">
			
			<div id="checkAll_length" class="dataTables_length">
			   <?php echo $records->render(); ?>

			</div>			
		    </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia dTable" id="checkAll">
                 <thead>
                      <tr>
                        <th>Sitesettings Name</th>
                        <th>Sitesettings Value</th>
                        <th>Action</th>
                      </tr>
                    </thead>
               
                <tbody>		
		   <?php if($records->count() > 0): ?>
		      <?php foreach($records AS $r): ?>
			
                      <tr>
			<td><?php echo e($r->sitesettings_lebel); ?><?php echo Form::hidden('id', $r->id, array('id' => 'id')); ?><?php echo Form::hidden('status', $r->status, array('id' => 'status')); ?></td>
                        <td><?php echo e($r->sitesettings_value); ?></td>
                        <td><a href="<?php echo e(URL::route('edit_sitesettings',$r->id)); ?>" class="tablectrl_small bDefault tipS editIcon" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a></td>
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