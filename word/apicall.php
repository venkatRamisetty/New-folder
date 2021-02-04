<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN: Head -->
  
    <!-- END: Head -->
    <body class="login">
     <form id="uploadForm" action="upload.php" method="post">
<label>Upload Image File:</label><br/>
<input name="file" type="file" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit" />
<input name="upload" type="hidden" value='upload' class="text" id='text' />
</form>
        <!-- BEGIN: JS Assets-->
        <script src="./css_js/script.js"></script>
        <!-- END: JS Assets-->
    </body>

	<script src="./css_js/jquery.min.js"></script> 
<script src="./css_js/bootstrap.min.js"></script> 
</body>


<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "upload.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
	alert(data);
	return false;
//$("#targetLayer").html(data);
},
error: function(){} 	        
});
}));
});
</script>


</html>