<?php

class myfunction
{
	function reg($fname,$email,$tel,$pass,$path)
	{
		$sql ="insert into Reg (fname,email,tel,password,avatar) values ('$fname','$email','$tel','$pass','$path')";
		$insert  = mysql_query($sql);
		if(!$insert)
		{
			$html = "<div class='sucess'>Registration Fail</div>";
			
			
		}else
		{
			$html = "<div class='sucess'>Registration Sucess</div>";
		}
		return $html;
		
	}
	
		function log($fname,$pass)
		{
			
			$sql ="Select * from Reg where fname='$fname' and password ='$pass'";
			
			$sql = mysql_query($sql);
			print_r($sql);
		    
			$reg  = mysql_num_rows($sql);
			
			
			if($reg == 1 )
			{
				$html = "<div class='sucess'>Login Sucess</div>";
				while($val = mysql_fetch_array($sql))
				{
					
					 $uid = $val['id'];
					
					
				}
				
				session_start();
				$_SESSION['uid'] = $uid;
				if(isset($_SESSION['uid']))
				{
				
					
				header("location:user.php");
				}else
				{
					header("location:index.php");
				}
				
				
			}else
			{
				$html = "<div class='sucess'>Login Fail</div>";
				
			}
			return $html;
			
		}
		
		function profile($uid)
		{
			$sql ="Select * from Reg where id='$uid'";
			//echo $sql;
			$res = mysql_query($sql);
			//print_r($res);
			return $res;
			
		}
		
		function update($uid,$image)
		{
			$sql ="update Reg set avatar='$image' where id='$uid'";
			//echo $sql;
			$res = mysql_query($sql);
			if(!$res)
			{
			$html = "<div class='sucess'>Fail</div>";
			
			
			}else
			{
			$html = "<div class='sucess'> Sucess</div>";
			}
			//print_r($res);
			return $html;
			
		}
	
}

?>