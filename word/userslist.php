
<?php
session_start();

include("api.php");
 //session_start();
$userd_services=user_services($_SESSION['uid']);

$uid=$_SESSION["uid"];
 if($uid==''){
  header('Location: login.php');
     exit();
 }

//print_r($_REQUEST);
$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

$userd_servicesa=user_services($_SESSION['uid']);

include('header.php');
 

$usrd_list=user_lists($_SESSION['uid']);

?> 
                
                <div class="grid grid-cols-12 gap-6 mt-5">
                   
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: User Form -->
                           <table id="example">
    <thead>
      <tr><th>s.no</th>
	  <th>UserName</th>
	  <th>Services</th>	   
	  <th>Status</th>
	   <th>Action</th>	
    </thead>
    <tbody>
     <?php echo $usrd_list; ?>
    </tbody>
  </table>
            </div>
            <!-- END: Content -->
        </div>
       <?php include('footer.php'); ?>
     <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable({
  "columnDefs": [{
    "defaultContent": "-",
    "targets": "_all"
  }]
});
  })
  </script>
