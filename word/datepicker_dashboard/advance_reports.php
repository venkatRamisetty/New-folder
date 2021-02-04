<?php
   include('header.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con2,"select name from users where name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location: login.php");
      exit;
   }
    if($_SESSION['login_user']!='APSRTC_FIN'){
    	header("Location: login.php");
    	exit;   	
   }
   
 
?>



<div class="content_wrapper">
<div class="header">

<div class="header_info"><h3>Welcome ,<?php echo $_SESSION['name']; ?></h3><span style="float: right;font-size: 15px;font-weight: bold;"><a href='logout.php'>Logout<a></span></div>

<div class="clear"></div>
<div class="logo"><img src="images/logo.jpg" width="261" height="116" alt="SMSGRP" /></div>

<div class="body">
	<?php //$setClass="tracking";include('menu.php'); ?>
	<div class="menu">
	<ul><li><a href="http://mobismart.in/gwreports_customer/finance.php"> Finance Reports</a></li>
	<li><a href="http://mobismart.in/gwreports_customer/advance_reports.php">Finance Advance Reports</a></li>
	</ul>
            
	</div>
	
	 
 <?php 
    $dbh = new mysqli("192.168.0.198","root","Reset123","apsrtc");
	//print_r($_REQUEST);
	$year=date('Y');
	if($_REQUEST['datereports']!=''){
		?>
		
		<div class="content_box" id="content_box">
		<?php
		
		
			$daterepors=$_REQUEST['datereports'];
			$qr = $dbh->query("CALL nxl_proc_UICnts_Accountwise('".$daterepors."')");
		
		?>
			<div class="content_data" id="content_data">
			<table width="90%"  class ="mytable" cellpadding="0" cellspacing="0">
			<caption>
			<strong>Monthly Data</strong>
			</caption>
			<span><a href="http://mobismart.in/gwreports_customer/advance_reports.php">Back</a></span>
			<tr>
			<th scope="col">Sno</th>
			<th scope="col" width='100px'>ACCOUNT NAME</th>
			<th scope="col">Submit Count</th>
			<th scope="col">Submit Failed</th>
			<th scope="col">Actual Submit</th>
			<th scope="col">Delivered Count</th>
			<th scope="col">Delivery %</th>
		
			<th scope="col">Delivery % (0 TO 30 SEC)</th>
			
			<th scope="col">Delivery % (>30 SEC)</th>
			</tr>
			<?php 
			
			
				while($row = $qr->fetch_assoc()) {
				//print_r($row);
				$date=$row['tdate'];
				?>
				       
				       <tr>
				            <td><?php echo $row['Sl_No']; ?></td>
				            <td><a href="download.php?datereports=<?php echo $date ?>&acc=<?php echo $row['systemid']; ?>"><?php echo $row['systemid']; ?></a></td> 
				            <td><?php echo number_format($row['submitted_cnt']); ?></td>
				            <td><?php echo number_format($row['submitfailed']); ?></td>
				            <td><?php echo number_format($row['actual_submit']); ?></td>
				           <td><?php echo number_format($row['delivered_Cnt']); ?></td>
				            <td><?php echo $row['dly_perc']; ?></td>							
							 <td><?php echo $row['dly_perc_0to30']; ?></td>							
							 <td><?php echo $row['dly_perc_greater30']; ?></td>
							
				          </tr>  
				        <?php
				          
			     }
				
			?>
		 
			</div>
		</div>
		<?php 
	}else{
		?>
<div id="search_box" style='width:1200px !important;margin-top:20px;' class="search_box" align="center">
    <table width="90%"  class ="mytable" cellpadding="0" cellspacing="0">
      <tr>
      <?php $smode=isset($_REQUEST['smode'])?$_REQUEST['smode']:''; ?>
<form action="advance_reports.php" method="post" name="sform" id="sform">
      	
     
      <td width="10%" class='sdate_1'>Report Month </td>
	
        <td width="10%" class='sdate_1'>
        <select size="1" name="month">
			<option  value="<?php echo date('m') ;?>" <?php if ( date('m') == $_REQUEST['month']) echo ' selected="selected"'; ?> ><?php echo date('m'); ?></option>
			<option  value="<?php echo date('m') -1 ;?>" <?php if ( date('m')-1 == $_REQUEST['month']) echo ' selected="selected"'; ?>><?php echo date('m') -1; ?></option>
			<option  value="<?php echo date('m') -2 ;?>" <?php if ( date('m')-2 == $_REQUEST['month']) echo ' selected="selected"'; ?>><?php echo date('m') -2; ?></option>
			
		</select>
	
        <td width="10%"><input name="Submit" type="submit" value="Search"  id='submit'/></td>
      </form>
      </tr>
      
    </table>
   
    <br/>
    <span class='error_text'> </span>
	</div><?php //}?>
	
    <div class="content_box" id="content_box">
	<?php 
	
	
	if($_REQUEST['month']){
		
		$month=$_REQUEST['month'];
		$qr = $dbh->query("CALL nxl_proc_UICnts_datewise('".$month."','".$year."')");
	}else{
		$month=date('m');
		$qr = $dbh->query("CALL nxl_proc_UICnts_datewise('".$month."','".$year."')");
	}
	
	
	 
	//echo "<pre>";print_r ($qr);
	?>
	<div class="content_data" id="content_data">
	<table width="90%"  class ="mytable" cellpadding="0" cellspacing="0">
	<caption>
	<strong>Monthly Data</strong>
	</caption>
	<tr>
	<th scope="col">Sl_No</th>
	<th scope="col" width='100px'>Date</th>
	<th scope="col">Submit Count</th>
	<th scope="col">Submit Failed</th>
	<th scope="col">Actual Submit</th>
	<th scope="col">Delivered Count</th>
	<th scope="col">Delivery %</th>

	<th scope="col">Delivery % (0 TO 30 SEC)</th>
	
	<th scope="col">Delivery % (>30 SEC)</th>
	</tr>
	<?php 
		while($row = $qr->fetch_assoc()) {
		//print_r($row);
		$date=$row['tdate'];
		?>
		       
		       <tr>
		            <td><?php echo $row['Sl_No']; ?></td>
		            <td><a href="?datereports=<?php echo $date;?>"><?php echo $row['tdate']; ?></a></td> 
		            <td><?php echo number_format($row['submitted_cnt']); ?></td>
		            <td><?php echo number_format($row['submitfailed']); ?></td>
		            <td><?php echo number_format($row['actual_submit']); ?></td>
		           <td><?php echo number_format($row['delivered_Cnt']); ?></td>
		            <td><?php echo $row['dly_perc']; ?></td>
					
					 <td><?php echo $row['dly_perc_0to30']; ?></td>
					 
					 <td><?php echo $row['dly_perc_greater30']; ?></td>
					
		          </tr>  
		        <?php
		          
	     }
		
	?>
 
	</div>
</div>

<br/>
<?php }

?>
<br/>
<?php
//include('footer.php'); ?>

<script>

jQuery(document).ready(function(){
	//alert('sd');
	jQuery("#stdate1").datepicker({
		 changeMonth: true,
		    changeYear: true,
		    dateFormat: "yy-mm",
		    showButtonPanel: true,
		    currentText: "This Month",
		    onChangeMonthYear: function (year, month, inst) {
		        $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month - 1, 1)));
		    },
		    onClose: function(dateText, inst) {
		        var month = $(".ui-datepicker-month :selected").val();
		        var year = $(".ui-datepicker-year :selected").val();
		        $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
		    }
		}).focus(function () {
		    $(".ui-datepicker-calendar").hide();
		}).after(
		    $("<a href='javascript: void(0);'>clear</a>").click(function() {
		        $(this).prev().val('');
		    }));
    
	
});

  </script>
  <style>
    .ui-datepicker-calendar {
        display: none;
    }
  

.menu li a {
    float: none !important;
    padding: 4px;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
    font-weight: bold;
    text-decoration: none;
    color: #FFF;
/*     background-image: url(images/menu_bg.png); */
    background-repeat: no-repeat;
    width: 102px;
    height: 47px;
    background:none!important;
 }
.menu li {
    float: left;
    padding: 10px;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
    font-weight: bold;
    text-decoration: none;
    color: #FFF;
/*     background-image: url(images/menu_bg.png);  */
    background-repeat: no-repeat;
    width: 100px;
    height: 27px;
background:#234990;
}
</style>
