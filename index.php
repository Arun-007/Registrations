<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include_once('db.php');
include_once('function.php');

$obj = new myfunction;


	if(isset($_POST['submit'])) 
	{
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$pass = $_POST['pass'];
		$upl ="uploads/";
		$path = $upl.basename($_FILES['photo']['name']).date('y,m,d,s')."a.jpg";
		
		if(move_uploaded_file($_FILES['photo']['tmp_name'],$path))
		{
		}
		
		$reg = $obj->reg($fname,$email,$tel,$pass,$path);
		echo $reg;
		
	}

?>

		<div class="registration">
        	<h2>Registration</h2>
        	<form method="POST" enctype="multipart/form-data">
            	
                <table>
                	<tr>
                    <td>Name</td>
                    <td><input type="text" name="fname" /></td>
                    </tr>
                    
                    <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" /></td>
                    </tr>
                    
                    <tr>
                    <td>Telephone</td>
                    <td><input type="text" name="tel" /></td>
                    </tr>
                    <tr>
                    <td>Password</td>
                    <td><input type="text" name="pass" /></td>
                    </tr>
                    
                    <tr>
                    <td>Image</td>
                    <td><input type="file" name="photo" /></td>
                    </tr>
                    
                    <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit" /></td>
                    </tr>
                </table>
                
            </form>
        </div>

<?php



	if(isset($_POST['login'])) 
	{
		$fname = $_POST['fname'];
		$pass = $_POST['pass'];
		
		$log = $obj->log($fname,$pass);
		echo $log;
		
	}

?>        
        
        
        <div class="Login">
        	<h2>Login</h2>
        	<form method="POST" enctype="multipart/form-data">
            	
                <table>
                	<tr>
                    <td>User Name</td>
                    <td><input type="text" name="fname" /></td>
                    </tr>
                    
                   
                    <td>Password</td>
                    <td><input type="text" name="pass" /></td>
                    </tr>
                    
                    <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="login" /></td>
                    </tr>
                    
                   
                </table>
                
            </form>
        </div>
  
</body>
</html>