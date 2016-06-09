@extends('app')
@section('content')
		<style>
				body{font-family: 'Segoe UI'; font-size: 12pt;}
				header h1{font-size:12pt; color: #fff; background-color: #1BA1E2; padding: 20px;}
				article{width: 80%; margin:auto; margin-top:10px;}
				.thumbnail{border:solid 8px grey;padding: 5px; margin: 5px; height: 100px; width: 100px; }
		</style>
</head>
<body>
    <header>
        <h1>File API - FileReader</h1>
    </header>
    <article>
				<form enctype="multipart/form-data" action="" method="post" class="putImages" id="formId">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="action" value="Process">
						<label for="files">Select multiple files: </label>
						<input id="files" type="file" name="media[]" multiple/>
						<div id="imgmsgdiv" style="color:red;"></div>
						<input class="button" type="submit" alt="Upload" value="Upload" />
						<output id="result" />
						
						<div id="loader" style="display:none;"><img src="{{asset('front_assets/img/ajax-loader.gif')}}"></div> 
						
				</from>
    </article>
</body>
</html>
<script>
window.onload = function(){
		if(window.File && window.FileList && window.FileReader){
				var filesInput = document.getElementById("files");
				filesInput.addEventListener("change", function(event){
						var files = event.target.files; 
						var output = document.getElementById("result");
						var countfileno = files.length; 
						
						if (countfileno <= 5) { 
								
								for(var i = 0; i< files.length; i++){
										var file = files[i];
										
										if(!file.type.match('image'))
												continue;
										var picReader = new FileReader();
										picReader.addEventListener("load",function(event){
												var picFile = event.target;
												var div = document.createElement("div");
												div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" + "title='" + picFile.name + "'/><a href='#' class='remove_pict'><img src='{{asset('front_assets/img/cross.png')}}'></a>";
												output.insertBefore(div,null);   
												div.children[1].addEventListener("click", function(event){
														div.parentNode.removeChild(div);
												});         
										});
										picReader.readAsDataURL(file);
								}
								
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
                                $("#result").hide();
                                $("#image-holder").html("");
                                $("#files").val("");
                                setTimeout(function(){ $('#result').html(""); }, 7000); 
														}
                        }
                    });
                    e.preventDefault();
                });
						}
						else{ 
								alert("Upload only 5 files");
						}
				});
		}
		else{
				console.log("Your browser does not support File API");
		}
}
</script>
@endsection