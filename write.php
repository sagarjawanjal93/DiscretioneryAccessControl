<?php
// Initialize the session
session_start();
$sagar=$_SESSION['username'];
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']);?>
		
		</b> Welcome to our DAC Polices.</h1>
    </div>
	
	
 <?php  
$filename = $_GET['compna'];
global $filename;

if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['inputText']; //get input text
     
 
print "<h2>Appending to $filename</h2><br>";

echo "<textarea rows='16' cols='90'>";
 $fp = fopen( $filename, "a" ) or die("Couldn't open $filename");
 fputs( $fp, $input );
 
$fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
 //fputs( $fp, "And sagar\n" );
 echo fread($fp,filesize("$filename"));
 fclose( $fp );
  
}    
?>
</textarea>

<html>
<body>    
<form action="#" method="post">


  <input type="text" name="inputText"/>
  
<input type="submit" value = "Enter Data" name="SubmitButton"/></form>    
</body>
</html>
 
 
 
 
 
 
</br>
</br>
</br></br></br>

    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>