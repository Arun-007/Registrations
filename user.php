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
session_start();
$_SESSION['uid'];
if(isset($_SESSION['uid']))
{
	$uid = $_SESSION['uid'];
	$udetails = $obj->profile($uid);
	while($udet = mysql_fetch_array($udetails))
	{ 
	echo "<h2>User Name:".$udet['fname']."</h2>";
	
	?>
    
    <table>
    	<tr>
        	<td>Name</td>
            <td><?php echo $udet['fname']; ?></td>
        </tr>
        
        <tr>
        	<td>Email</td>
            <td><?php echo $udet['email']; ?></td>
        </tr>
        
        <tr>
        	<td>Telephone</td>
            <td><?php echo $udet['tel']; ?></td>
        </tr>
        
        <tr>
        	<td>password</td>
            <td><?php echo $udet['password']; ?></td>
        </tr>
        
        <tr>
        	<td>Image</td>
            <td><img src="<?php echo $udet['avatar']; ?>" width="200"/></td>
        </tr>
        
       
    
    </table>
		
	<?php
    } ?>
    
    <?php if(isset($_POST['upload']))
	{
		$dir = "uploads/";
		$image = $dir.basename($_FILES['photo']['name']).date('y.md,s').'jpg';
		if(move_uploaded_file($_FILES['photo']['tmp_name'],$image))
		{
		}
		$udetails = $obj->update($uid,$image);
		echo $udetails;
		
	}
	
	?>
    
    
	
	 <form method="POST" enctype="multipart/form-data">
     <table>
        	<tr>
        	<td>Change Image</td>
            <td><input type="file" name="photo" /></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" name="upload" value="update"/></td>
        </tr>
        </table>
        </form>
        
        
        
      
        
	
<?php }else
{
	header("location:index.php");
}
?>

    <?php if(isset($_POST['Logout']))
	{
		session_destroy();
		header("location:index.php");
	}
	
	?>

 <form method="POST" enctype="multipart/form-data">
     <table>
        	
        <tr>
        	<td></td>
            <td><input type="submit" name="Logout" value="Logout"/></td>
        </tr>
        </table>
        </form>

 
</body>
</html>