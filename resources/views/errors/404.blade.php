@extends('front')  
@section('content')
<div class="page innerPage">
@include('front.layout.header')
<div class="main">

    <div class="innerBanner glbCls">
      <div class="innerBannerImg glbCls"><img src="{{asset('images/banner-img22.jpg')}}" alt="inner-banner"></div>
      <div class="capTitle"><span>404 <strong>Page Not Found</strong></span></div>
    </div>
    <div class="blockSection glbCls aboutUsSec">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox innerTitleBox glbCls"> <span class="glbCls titleBox1">404 <strong>page not found</strong></span></div>
        <div class="aboutContent glbCls clearfix">
          <div class="aboutContentLt leftCls">
           Sorry! Page not found. Unfortunately the page you are looking for has been moved or deleted.
           </div>
          <div class="aboutContentRt rightCls alignCenter"> <img src="{{asset('images/broken-down-car.png')}}" alt="404"> </div>
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

@include('front.layout.footer-404')

</div>      
@endsection