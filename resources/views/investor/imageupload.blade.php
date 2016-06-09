@extends('app')
@section('content')
    <style>
        .thumb-image{
            border:solid 8px grey;
            padding: 5px;
            margin: 5px;
            width: 100px;
            height: 100px;
        }
        .thumb-image_cross{
            width: 16px;
            height: 16px;
        }
    </style>
    <form enctype="multipart/form-data" action="" method="post" class="putImages" id="formId">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="action" value="Process">
        <input name="media[]" type="file" id="media" multiple/>
        <div id="image-holder"></div>
        <div id="imgmsgdiv" style="color:red;"></div>
        <div id="loader" style="display:none;"><img src="{{asset('front_assets/img/ajax-loader.gif')}}"></div> 
        <input class="button" type="submit" alt="Upload" value="Upload" />
    </form>
    
    <script>
        $("input[type='file']").change(function () {
            var countfileno = $(this)[0].files.length;
            var base_url_suffix	= '';
            var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
            var pfolderimg = "{{asset('front_assets/img/cross.png')}}"; 
            if (countfileno <= 5) {
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {
                        for (var i = 0; i < countfileno; i++){
                            var reader = new FileReader();
                            
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                                $("<img />", {
                                    "src": pfolderimg,
                                    "class": "thumb-image_cross",
                                    "click": function(e){
                                        e.target.previousElementSibling.value = '';
                                    }
                                }).appendTo(image_holder);
                            }
                            
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    }
                    else{
                        alert("This browser does not support FileReader.");
                    }
                }
                else{
                    alert("Pls select only images");
                }
            
                $("#imgmsgdiv").html("");
                $('#formId').submit(function( e ) { 
                    var base_url_suffix	= '';
                    var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
                    //var csrf_token = $('meta[name="csrf-token"]').attr('content'); 
                    var FormSubmitUrl= base_url + 'uploadimage'; 
                    $.ajax({
                        url: FormSubmitUrl,
                        type: 'POST',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $("#loader").css('display','block');
                        },
                        success: function (response) { 
                            if (response == 'ok') {
                                $('#imgmsgdiv').html("upload Successfull");
                                $("#loader").css('display','none');
                                $("#image-holder").hide();
                                $("#image-holder").html("");
                                $("#media").val("");
                                setTimeout(function(){ $('#imgmsgdiv').html(""); }, 7000); 
														}
                        }
                    });
                    e.preventDefault();
                });
            }
            else{
                $("#imgmsgdiv").html("Upload only 5 files");
                $("#image-holder").hide();
                $("#media").val('');
            }
        });
        
        
    </script>
@endsection