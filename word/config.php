<?php


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
error_reporting(0);
//error_reporting(E_ERROR);

//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED);
define('DB_SERVER', '192.168.0.81');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Reset@123');
   define('DB_DATABASE', 'whatsapp_db');
   //define('EMAIL','sudheerreddy.p@netxcell.com');
   define('EMAIL','whatsapp.support@netxcell.com');
 $ms = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno())
   {
   	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	

  
   
   if (!function_exists('session_register')) {
     function session_register($name){
        global $name;
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $name;
          } 
          $name = &$_SESSION[$name]; 
      }
    }
	
  
    
   // $con2=mysqli_connect("192.168.0.198","root","Reset123","apsrtc");
    // Check connection


	
?>
