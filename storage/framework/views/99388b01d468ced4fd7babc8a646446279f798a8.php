<?php $__env->startSection('content'); ?>
  
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-user-4"></span>Client List</span>
	<ul class="quickStats">
            <li>
		<?php if(Auth::user()->ability(array('owner'), array('client_add')) ): ?><a href="<?php echo e(URL::route('add_client')); ?>"  class="blueImg"><img alt="" src="<?php echo e(asset('admin_assets/images/icons/quickstats/plus.png')); ?>"></a><?php endif; ?>
                <div class="floatR">
<strong class="blue">Add</strong>
<span>Client</span>
</div>
            </li>            
        </ul>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="">Dashboard</a></li>                
                <li class="current"><a href="#" title="">Client List</a></li>
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
		<!--<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>--><h6>Client List</h6>
	    </div>
	    <div id="dyn" class="hiddenpars">
	    <div class="tablePars" style="display:block">
			<?php echo Form::open(array('class' => 'searchForm', 'id' => 'search_form' , 'method' => 'post')); ?>

			    <div class="dataTables_filter" id="checkAll_filter">
				<label>Search:
				    <?php echo Form::text('search',$search,array('required','id'=>'search','placeholder'=>'Search by Client Name or Email or Status','class'=>'clientsearchBox searchBox')); ?>

				</label>
			    </div>
			<div class="btmButton">
			    <input type="submit" value="Search" class="btn btn-default btn-sm" />
			    <input type="button" value="Show All" class="btn btn-default" id="show_all" name="show_all">
			</div>
			<?php echo Form::close(); ?>

			<div id="checkAll_length" class="dataTables_length">
			    <?php echo $client_list->render(); ?>

			</div>			
		    </div>
                <!--<a class="tOptions" title="Options"><img src="<?php echo e(asset('admin_assets/images/options')); ?>" alt="" /></a>-->
            <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia dTable" id="checkAll">
                 <thead>
                      <tr>
		      <!--<th><img src="<?php echo e(asset('admin_assets/images/tableArrows.png')); ?>" alt="" /></th>-->
                        <th>Client Image</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
			<th>Client Status</th>
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
                <tbody class="tbodyClient">		
		  <?php if($client_list->count() > 0): ?>
		      <?php foreach($client_list AS $r): ?>
			
                      <tr>
		      <!--<td class="sorting_1 noBorderB">
			    <div class="checker" id="uniform-undefined">
				<span><input type="checkbox" id="titleCheck" name="page[]" value="<?php echo e($r->id); ?>" class="chkBox" /></span></div></td>-->
		      <td><?php if($r->image!= '' && file_exists(public_path().'/upload/adminuser/'.$r->image) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$r->image),'',array('class'=>'img-responsive img-circle','width'=>'60','height'=>'60')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'60','height'=>'60')); ?>

			      <?php endif; ?>
			</td>
                        <td><?php echo e($r->name); ?></td>
			
                        <td><?php echo e($r->email); ?></td>
			<td><?php echo e($r->status); ?></td>
                        <!--<td><?php if(Auth::user()->ability(array('owner'), array('client_edit')) ): ?><a class="tablectrl_small bDefault tipS editIcon" href="<?php echo e(URL::route('edit_client',$r->id)); ?>" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a><?php endif; ?>
			<?php if(Auth::user()->ability(array('owner'), array('client_delete')) ): ?><a class="tablectrl_small bDefault tipS deleteIcon" href="<?php echo e(URL::route('delete_client',$r->id)); ?>"  onclick="return confirm('Are you sure you want to delete this?');" title="Remove"><span class="iconb" data-icon="&#xe136;"></a><?php endif; ?></td>-->
			<td><a class="tablectrl_small bDefault tipS editIcon" href="<?php echo e(URL::route('edit_client',$r->id)); ?>" title="Edit"><span class="iconb" data-icon="&#xe1db;"></span></a>
			<a class="tablectrl_small bDefault tipS deleteIcon" href="<?php echo e(URL::route('delete_client',$r->id)); ?>"  onclick="return confirm('Are you sure you want to delete this?');" title="Remove"><span class="iconb" data-icon="&#xe136;"></a></td>
                      </tr>
                       <?php endforeach; ?>
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