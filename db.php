<?php 
	
	$conn = mysql_connect("localhost","root","");
	if(empty($conn))
	{
		echo "Connection Error";
	}
	
	$select_db = mysql_select_db("test_db",$conn);
	if(empty($select_db))
	{
		echo "Connection Error";
	}

?>