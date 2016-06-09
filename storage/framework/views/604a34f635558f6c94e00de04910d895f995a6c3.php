  
<?php $__env->startSection('content'); ?>
<div class="page innerPage">
<?php echo $__env->make('front.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main">

    <div class="innerBanner glbCls">
      <div class="innerBannerImg glbCls"><img src="<?php echo e(asset('images/banner-img22.jpg')); ?>" alt="inner-banner"></div>
      <div class="capTitle"><span>404 <strong>Page Not Found</strong></span></div>
    </div>
    <div class="blockSection glbCls aboutUsSec">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox innerTitleBox glbCls"> <span class="glbCls titleBox1">404 <strong>page not found</strong></span></div>
        <div class="aboutContent glbCls clearfix">
          <div class="aboutContentLt leftCls">
           Sorry! Page not found. Unfortunately the page you are looking for has been moved or deleted.
           </div>
          <div class="aboutContentRt rightCls alignCenter"> <img src="<?php echo e(asset('images/broken-down-car.png')); ?>" alt="404"> </div>
        </div>
      </div>
    </div>
    <div class="blockSection glbCls aboutUsIcons">
      <div class="mainWrap glbCls clearfix">
        <div class="abIconBoxs alignCenter leftCls"> <span class="abIconBox glbCls icon1"><em class="spriteImg"></em></span> <span class="abIconText glbCls">100% customer satisfaction</span> </div>
        <div class="abIconBoxs alignCenter leftCls"> <span class="abIconBox glbCls icon2"><em class="spriteImg"></em></span> <span class="abIconText glbCls">100% customer satisfaction</span> </div>
        <div class="abIconBoxs alignCenter leftCls"> <span class="abIconBox glbCls icon3"><em class="spriteImg"></em></span> <span class="abIconText glbCls">100% customer satisfaction</span> </div>
      </div>
    </div>
  </div>

<?php echo $__env->make('front.layout.footer-404', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>