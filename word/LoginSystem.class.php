<?php session_start(); 
class LoginSystem
{
    var $db_host,
        $db_name,
        $db_user,
        $db_password,
        $connection,
        $key,
        $username,
        $password;

    /**
     * Constructor
     */
    function LoginSystem()
    {
        require('ConnSetting.php');
        
        $this->db_host = $dbhost;
        $this->db_name = $dbname;
        $this->db_user = $dbuser;
        $this->db_password = $dbpassword;
        
        $this->db_host1 = $dbhost_new;
        $this->db_name1 = $dbname_new;
        $this->db_user1 = $dbuser_new;
        $this->db_password1 = $dbpassword_new;
        //$this->key = md5($userkey);
    }
    
    /**
     * Check if the user is logged in
     * 
     * @return true or false
     */
    function isLoggedIn()
    {
        if($_SESSION['LoggedIn'])
           return true;                           
        else
           return false;
    }
    
    /**
    * @desc SAlogin
    */
    function DoSALogin($usr,$pwd)
    {               
        $_SESSION['LoggedIn'] = true;
        $_SESSION['level'] = "SA"; 
        $_SESSION['userName'] = $usr;
        $_SESSION['gwuser']= $_SESSION['userName'] ;     
        $_SESSION['gwpass']= $pwd;
        return true;
    }            
	
    function DoCLogin($usr,$pwd)
    {
        $_SESSION['LoggedIn'] = true;
        $_SESSION['level'] = "Client";
        $_SESSION['userName'] = $usr;
        $_SESSION['gwuser']= $_SESSION['userName'] ;
        $_SESSION['gwpass']= $pwd;
        return true;
    }
    
    /**
     * Check if the user logged in has access right
     * 
     * @return true or false
     */
    function hasAccess($role)
    {
        if(strcasecmp($_SESSION['level'],$role) == 0)
           return true;                           
        else
            return false;
    }              
    
    /**
     * Check username and password against DB
     *
     * @return true/false
     */
    function doLogin($username, $password)
    {
        $this->connect();
        
        $this->username = $this->clean($username);
        $this->password = $this->clean($password);
        
        // check db for user and pass here.
        $sql = "SELECT * FROM nxl.user_info WHERE BINARY UserName = '".$this->username."' and BINARY Password = '".$this->password."'";
                        
        $result = mysql_query($sql, $this->connection);
        
        // If no user/password combo exists return false
        if(mysql_affected_rows($this->connection) != 1)
        {
            $this->disconnect();
            return false;
        }
        else // matching login ok
        {
            $row = mysql_fetch_assoc($result);
            
            // more secure to regenerate a new id.
            session_regenerate_id();
            
            //set session vars up
            $_SESSION['LoggedIn'] = true;
            $_SESSION['userName'] = $row['UserName'];
            $_SESSION['userId'] = $row['UserId'] ;
            $_SESSION['level'] = $row['Role'];
            
        }
        
        $this->disconnect();
        return true;
    }
	
	/**
     * Check Customer login .
     */
    function custLogin($username, $password)
    {
     	$this->connect();
        
        $this->username = $this->clean($username);
        $this->password = $this->clean($password);
		   
	$sql = "SELECT * FROM nxl.esme WHERE BINARY SystemId= '".$this->username."' and BINARY Password = '".$this->password."'";
                        
        $result = mysql_query($sql, $this->connection);
        
        // If no user/password combo exists return false
        if(mysql_affected_rows($this->connection) != 1)
        {
            $this->disconnect();
            return false;
        }
        else // matching login ok
        {
            $row = mysql_fetch_assoc($result);
            
            // more secure to regenerate a new id.
            session_regenerate_id();
            
            //set session vars up
            $_SESSION['LoggedIn'] = true;
            $_SESSION['userName'] = $this->username;
            $_SESSION['CustomerId'] = $row['CustomerId'];
            $_SESSION['level'] = "User";
            
        }
        
        $this->disconnect();
        return true;
    }
    
    /**
     * Destroy session data/Logout.
     */
    function logout()
    {
        unset($_SESSION['LoggedIn']);
        unset($_SESSION['userName']);
        unset($_SESSION['level']);
        unset($_SESSION['CustomerId']);
        session_destroy();
    }
    
    /**
     * Connect to the Database
     * 
     * @return true/false
     */
    function connect()
    {
        $this->connection = mysql_connect($this->db_host, $this->db_user, $this->db_password) 
                                                        or die("Unable to connect to MySQL");
        
        mysql_select_db($this->db_name, $this->connection) or die("Unable to select DB!");
        
        // Valid connection object? everything ok?
        if($this->connection)
        {
            return true;
        }
        else return false;
    }
    
    
    function connect2()
    {
    	$this->connection1 = mysql_connect($this->db_host1, $this->db_user1, $this->db_password1)
    	or die("Unable to connect to MySQL2");
    
    	mysql_select_db($this->db_name1, $this->connection1) or die("Unable to select DB_2!");
    
    	// Valid connection object? everything ok?
    	if($this->connection)
    	{
    		return true;
    	}
    	else return false;
    }
    /**
     * Disconnect from the db
     */
    function disconnect()
    {
        mysql_close($this->connection);
    }
    
    function disconnect2()
    {
    	mysql_close($this->connection1);
    }
    
    /**
    * @desc Encode a string to protect data in url request
    * @return Ready string to be used in the url
    */
    function encode($str)
    {                          
        $iv_size = mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $cipher = mcrypt_encrypt(MCRYPT_3DES,$this->key,$str,MCRYPT_MODE_ECB,$iv);
        $url_ready_val = urlencode($cipher);
        return $url_ready_val;
    }
    
    /**
    * @desc Decode a string to protect data in url request
    * @return Ready string to be used in any processing
    */
    function decode($cipher)
    {                     
        $cipher = $this->clean(urldecode($cipher));  
        $iv_size = mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $actual_str = mcrypt_decrypt(MCRYPT_3DES,$this->key,$cipher,MCRYPT_MODE_ECB,$iv);
        return $actual_str;        
    }
    
    /**
     * Cleans a string for input into a MySQL Database.
     * Gets rid of unwanted characters/SQL injection etc.
     * 
     * @return string
     */
    function clean($str)
    {
        // Only remove slashes if it's already been slashed by PHP
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        // Let MySQL remove nasty characters.
        $str = mysql_real_escape_string($str);
        
        return $str;
    }
    
    /**
     * create a random password
     * 
     * @param    int $length - length of the returned password
     * @return    string - password
     *
     */
    function randomPassword($length = 8)
    {
        $pass = "";
        
        // possible password chars.
        $chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
               "k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
               "u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");
               
        for($i=0 ; $i < $length ; $i++)
        {
            $pass .= $chars[mt_rand(0, count($chars) -1)];
        }
        
        return $pass;
    }
    /**
    * Select all record from a table  
    */
    function select_all($tbl_name)
    {
        $rset = null ;
        $i=0;
        if(is_null($tbl_name)) 
            return  $rset;
            
        $this->connect();
        $sql = "SELECT * FROM ".$tbl_name;
        $res = mysql_query($sql,$this->connection);
        if(mysql_affected_rows($this->connection) < 0)
        {
            $this->disconnect();
            return $rset;
        }
        else
        {
            while($row = mysql_fetch_array($res, MYSQL_ASSOC))
            {
                $rset[$i] = $row;
                $i++;             
            }
        }
        $this->disconnect();
        return $rset;
    }
    
    /**
    * Delete a record from a table  
    */
    function del_record($tbl_name,$param,$val)
    {
        if(is_null($tbl_name))
            return  false;
            
        if(is_null($param))
            return  false;
            
        if(is_null($val))
            return  false;
                
        $this->connect();
        if(is_numeric($val))
            $sql = "DELETE FROM ".$tbl_name." WHERE ".$param." = ".$val;
        else
            $sql = "DELETE FROM ".$tbl_name." WHERE ".$param." = '".$val."'";
        
        $res = mysql_query($sql,$this->connection);
        if(mysql_affected_rows($this->connection) != 1)
        {
            $this->disconnect();
            return false;
        }
        else
        {
            $this->disconnect();
            return true;
        }
    }
       
    /**
    * Run a sql query   
    */
    function run_sql($sql)
    {
        $this->connect();
        
        $res = mysql_query($sql,$this->connection);
        $this->disconnect();
        return $res;
    }
    function run_sql_second($sql)
    {
    	$this->connect2();
    	//$this->connection2 = mysql_connect('192.168.0.198', 'root', 'Reset123')
    	//or die("Unable to connect to MySQL2");
    	//mysql_select_db('apsrtc') or die(mysql_error());
    	$res = mysql_query($sql,$this->connection1);
    	//print_r($res);
    	$this->disconnect2();
    	return $res;
    	
    	
    }

	function getrowcount_sql($sql)
    {
        $this->connect();
        $res = mysql_query($sql,$this->connection);
		$cnt = mysql_num_rows($res);
        $this->disconnect();
        return $cnt;
    }

}

?>
