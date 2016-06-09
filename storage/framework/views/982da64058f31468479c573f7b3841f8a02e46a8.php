Hello <?php echo e($name); ?>

<br><br>
    Please change your password from this below link.
<br>
<a href="<?php echo e(URL::route('change_password',$enc_email )); ?>">Click on this link</a>

<br><br>
Thanks & Regards
<br>
Job Tracking System Team