<?
#####################################################################
### Do not Modified any Below Values, until you are known to that.###
#####################################################################
## myclass for the Mysql Database Connectivity.

class myclass 
{
	var $DBASE="";
	var $CONN="";
	// //////////////////////////////////////////////////// 
	//	*************************************************** 
	//	PHP and MySQL Connection and Error Specific methods 
	//	*************************************************** 
	
	
	// Call Below function to make a connection with the database
	function myclass($server="",$dbase="", $user="", $pass="") 
	{
		$this->DBASE = $dbase;
		$conn = mysql_connect($server,$user,$pass);
		if(!$conn) {
			$this->error("Connection attempt failed");
		}
		if(!mysql_select_db($dbase,$conn)) {
			$this->error("Dbase Select failed");
		}
		$this->CONN = $conn;
		return true;
	}
	// Call Below function to close a connection with the database
	function close()
	{
		$conn = $this->CONN ;
		$close = mysql_close($conn);
		if(!$close)
		{
			$this->error("Connection close failed");
		}
		return true;
	}
	function error($text)
	{
		$no = mysql_errno();
		$msg = mysql_error();
		exit;
	}
	// Call Below function to get the Results for a Query. It will return Two Dimesional Array.
	function select ($sql="", $fetch=mysql_fetch_assoc)
	{
		if(empty($sql)) { return false; }
		if(!eregi("^select",$sql))
		{
			echo "wrongquery<br>$sql<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn);
		if( (!$results) or (empty($results)) ) {
			return false;
		}
		$count = 0;
		$data = array();
		while ( $row = $fetch($results))
		{
			$data[$count] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}		
	// Call Below function to insert Query. It will returns the Id of Last Inserted Records.
	function insert($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("^insert",$sql))
		{
			return false;
		}
		if(empty($this->CONN))
		{
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		if(!$results) 
		{
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$id = mysql_insert_id();
		return $id;
	}
	function delete($sql){
      $sql=trim($sql);
      $result = mysql_query($sql);
      if (!$result) {
        return 0;
      }else{
        return $result;
      }
    }
	function  edit($sql){
      $sql=trim($sql);
      $result = mysql_query($sql,$this->CONN);
      if (!$result)
      {
         return 0;
      }else{
        return $result;
      }
      mysql_free_result($result);
   }
	// Call Below function to get the Results for a Query. It will return Two Dimesional Array.
	function sql_query($sql="")
	{	
		if(empty($sql)) { return false; }
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn) or die("query fail".mysql_error());
		if(!$results)
		{   $message = "Query went bad!";
			$this->error($message);
			return false;
		}		
		if(!eregi("^select",$sql)){
			return true; }
		else {
			$count = 0;
			$data = array();
			while ( 
				$row = mysql_fetch_array($results))	{
				$data[$count] = $row;
				$count++;
			}
			mysql_free_result($results);
			return $data;
	 	}
	}	
	// Call Below function to get the Field for a perticular Table.
	function getfields($table)
	{
		$fields = mysql_list_fields($this->DBASE, $table, $this->CONN); 
		$columns = mysql_num_fields($fields); 

		for ($i = 0; $i < $columns; $i++) { 
		   $arr[]= mysql_field_name($fields, $i); 
		}
		return $arr;
	}
//ends the class over here
}
?>