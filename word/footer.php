<?php


?><!-- Modal -->
   <div id="myModalp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <!-- BEGIN: JS Assets-->
 <script src="./css_js/script.js"></script> 
<script src="./css_js/jquery.min.js"></script> 
<script src="./css_js/bootstrap.min.js"></script> 
<script src="./css_js/mutliselect.js"></script>
        <!-- END: JS Assets-->
   <script> 
    


function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
	//alert(path);

    $(".side-nav ul li a").each(function () {
		 $(this).removeClass('side-menu--active');
        var href = '/whatsapp_dashboard/' + $(this).attr('href');
		//alert(href);
        if (path.substring(0, href.length) === href) {
            $(this).addClass('side-menu--active');
			$(this).parents('ul').prev('a').addClass('side-menu--active');
			 $(this).closest( "ul" ).addClass('side-menu__sub-open');

			

			//side-menu--active
			return false;
        }
    });
}

	$(document).ready(function() {


            ///
            $("#rssid").on('change',function(){
                var form = new FormData();
                var rid=$(this).val();
                
               // alert(password);
              
                form.append("rsid",rid);
                form.append("cmd", 'rsid');
                var settings = {
                "url": "api.php",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data":form
                };
               // $(".lprogress_bar").show();
               // $(".login_error").hide();
                $.ajax(settings).done(function (response) {
				//alert(response); return false;
                  location.reload(); 
                });
                   
            })
});
  </script>

</body>

</html>
