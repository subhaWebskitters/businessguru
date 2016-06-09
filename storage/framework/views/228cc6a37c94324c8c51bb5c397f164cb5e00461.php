
<p>Hello <?php echo e($name); ?>,</p>

<p>You have been added in <b>Job Tracking System</b></p>
<p>
    Username: <?php echo e($username); ?>

    <br>
    Password: <?php echo e($password); ?>

</p>
</br>
Click the link below or open url in the browser.<br>
<a href="<?php echo e(URL::route('admin')); ?>">Click Here</a>
<p>
Thanks & Regards
<br>
Job Tracking System Team
</p>