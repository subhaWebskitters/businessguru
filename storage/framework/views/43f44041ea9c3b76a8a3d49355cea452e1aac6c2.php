  
<?php $__env->startSection('content'); ?>

    <div id="main" class="clear contact_page"> 
    <div class="contact_banner">
      <img src="<?php echo e(asset('front_assets/assets/images/img7.jpg')); ?>" alt="no img">
      <div class="contact_inner">
	<div class="main_container clear">
	  <div class="contact_banner_text">
	    <p>Engage with our business consultant today Arrange for a free consultation with us</p>
	  </div>
	</div>
      </div>
    </div>
    <div class="contact_form">
      <div class="main_container clear">
        <div class="errorSuccess">
       <?php if(Session::has('errorMessage')): ?>
    
		  <div class="nNote nFailure">
			  <p><?php echo e(Session::get('errorMessage')); ?></p>
		  </div>
	  
	  
	  <?php endif; ?>
	 <?php if(Session::has('successMessage')): ?>
	  
		  <div class="nNote nSuccess">
			  <?php echo e(Session::get('successMessage')); ?>

		  </div>
	  
	  
	<?php endif; ?>
	 <?php if(isset($errors) && $errors->any()): ?>
 <div class="nNote nFailure">
 <?php foreach($errors->all() as $error): ?>
  <p><?php echo e($error); ?></p>
  <?php endforeach; ?>
</div>
 <?php endif; ?>
  </div>

	<div class="contact_left">
	  <h2>Contact us</h2>
	  <table border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="left" valign="middle">Call :</td>	      
	      <td align="left" valign="middle"><a href="tel:<?php if(isset($sitesettings[1]['sitesettings_value'])): ?> <?php echo e($sitesettings[1]['sitesettings_value']); ?><?php endif; ?>"><?php if(isset($sitesettings[1]['sitesettings_value'])): ?> <?php echo e($sitesettings[1]['sitesettings_value']); ?><?php endif; ?></a></td>
	    </tr>
	    <tr>
	      <td align="left" valign="middle">Email  :</td>	      
	      <td align="left" valign="middle"><a href="mailto:<?php if(isset($sitesettings[2]['sitesettings_value'])): ?> <?php echo e($sitesettings[2]['sitesettings_value']); ?><?php endif; ?>"><?php if(isset($sitesettings[2]['sitesettings_value'])): ?> <?php echo e($sitesettings[2]['sitesettings_value']); ?><?php endif; ?></a></td>
	    </tr>
	    <tr>
	      <td align="left" valign="middle">Visit :</td>	      
	      <td align="left" valign="middle"><?php if(isset($sitesettings[3]['sitesettings_value'])): ?> <?php echo e($sitesettings[3]['sitesettings_value']); ?><?php endif; ?></td>
	    </tr>
	    <tr>
	      <td align="left" valign="middle">Social :</td>	      
	      <td align="left" valign="middle">
		<div class="social">
		  <a href="<?php if(isset($sitesettings[4]['sitesettings_value'])): ?> <?php echo e($sitesettings[4]['sitesettings_value']); ?><?php endif; ?>"><img src="<?php echo e(asset('front_assets/assets/images/social1.png')); ?>" alt="no img"></a>
		  <a href="<?php if(isset($sitesettings[5]['sitesettings_value'])): ?> <?php echo e($sitesettings[5]['sitesettings_value']); ?><?php endif; ?>"><img src="<?php echo e(asset('front_assets/assets/images/social2.png')); ?>" alt="no img"></a>
		  <a href="<?php if(isset($sitesettings[6]['sitesettings_value'])): ?> <?php echo e($sitesettings[6]['sitesettings_value']); ?><?php endif; ?>"><img src="<?php echo e(asset('front_assets/assets/images/social3.png')); ?>" alt="no img"></a>
		  <a href="<?php if(isset($sitesettings[7]['sitesettings_value'])): ?> <?php echo e($sitesettings[7]['sitesettings_value']); ?><?php endif; ?>"><img src="<?php echo e(asset('front_assets/assets/images/social4.png')); ?>" alt="no img"></a>
		</div>
	      </td>
	    </tr>
	  </table>
	</div>
	<div class="contact_right">
	  <?php echo Form::open(['route'=>'contact_email','method'=>'post','class' => 'form form-validate formRow ','id'=>'contact_email','enctype'=>'multipart/form-data', 'files'=>true]); ?>

<?php echo Form::hidden('action','Process',array('id'=>'action')); ?>

	    <?php echo Form::text('first_name','',array('id'=>'first_name','placeholder'=>'Name*','class'=>'form-control required error2','required' => 'required')); ?>

	    <?php echo Form::email('email','',array('id'=>'email','placeholder'=>'Email Address*','class'=>'form-control required error2','required' => 'required')); ?>

	    <span class="email_error"></span>
	    <?php echo Form::text('organisation_name','',array('id'=>'organisation_name','placeholder'=>'Organization Name*','class'=>'form-control required error2','required' => 'required')); ?>

	    <?php echo Form::textarea('enquiry','',array('id'=>'enquiry','placeholder'=>'Your Enquiry*','class'=>'form-control required error2','required' => 'required')); ?> 
	    <input type="submit" name="submit" value="Submit now">
	  <?php echo Form::close(); ?>    
	</div>
      </div>
    </div>
    <div id="googleMap"  class="full_image same_gap border_bot" style="width:100%;height:400px;"></div>
    
    <?php /**/
    $investor_id = Session::get('INVESTORS_ID');
    $buss_id     = Session::get('BUSINESS_ID');
    /**/ ?>
	
    <?php if($investor_id == '' && $buss_id == ''): ?>
    <div class="block5">
      <div class="main_container center">
	<div class="business businessGetStarted">
	  <h2>Get Started Now</h2>
	  <ul>
	    <li class="investors1"><a href="javascript:void(0);"><h2>Business Investors</h2><span>I want to invest</span></a></li>
	    <li class="start_up1"><a href="javascript:void(0);"><h2>Business Start Up</h2><span>Invest in me</span></a></li>
	  </ul>
	  <img src="<?php echo e(asset('front_assets/assets/images/img6.jpg')); ?>" alt="no img" class="img5">
	</div>
      </div>
    </div>
    <?php endif; ?>
    
    <span class="live_chat"><img src="<?php echo e(asset('front_assets/assets/images/live_chat.png')); ?>" alt="no img"></span>
  </div>
<script>
$(document).ready(function(){
		$("#contact_email").validate({
				rules: {		
						first_name: {
								required: true
						},
						email: {
								required: true,
								email: true
						},
						organisation_name: {
								required: true
						},
						enquiry: {
								required: true
						},

				},
				messages: {
						first_name: 	   "Please enter Name",
						email: 		   "Please enter a valid email address",
						organisation_name: "Please enter organisation_name",
						enquiry: 	   "Please enter enquiry",
				},
				submitHandler: function(form) {
				    form.submit();
				}
		});
		
		
});

   $(document).on('click', function (e) {
	if ($(e.target).parents('.investors1').length == 0 && $(e.target).attr('id')!='scrollbar1' && $(e.target).parents('#scrollbar1').length == 0 ) {
	   $("#scrollbar1").hide();$(".invester_signin").hide();
	}
	
	if ($(e.target).parents('.start_up1').length == 0 && $(e.target).attr('id')!='scrollbar2' && $(e.target).parents('#scrollbar2').length == 0 ) {
	   $("#scrollbar2").hide();$(".business_signin").hide();
	}
});
$(document).ready(function(){
$(".invester_signin").hide();
$(".business_signin").hide();
$(".start_up1").click(function(){
$('.business_signin').css('style','block');$(".invester_signin").css('style','none');
});
$(".investors1").click(function(){
$('.business_signin').css('style','none');$(".invester_signin").css('style','block');
});
});
</script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
  <script>
var amsterdam=new google.maps.LatLng(32.7677778,-117.0222222);
function initialize()
{
var mapProp = {
  center:amsterdam,
  zoom:7,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var myCity = new google.maps.Circle({
  center:amsterdam,
  radius:20000,
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:2,
  fillColor:"#0000FF",
  fillOpacity:0.4
  });

myCity.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>