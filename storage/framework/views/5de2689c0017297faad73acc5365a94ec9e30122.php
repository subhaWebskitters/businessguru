
<p>Hello <?php echo e($name); ?>,</p>

<p>A new design has been uploaded by designer <b><?php echo e($designer_name); ?></b> on project <b><?php echo e($project_name); ?></b></p>
</br>
Click the link below or open url in the browser.<br>
<a href="<?php echo e(URL::route('admin')); ?>">Click Here</a>
<p>
Thanks & Regards
<br>
Job Tracking System Team
</p>