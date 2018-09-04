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
$dir = "C:/xampp/htdocs/dac/$sagar/";
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['inputText']; //get input text
     
 
print "<h2>Appending to $filename</h2><br>";
 $fp = fopen( $dir.$filename, "a" ) or die("Couldn't open $filename");
 fputs( $fp, $input );
 echo "File Updated<br>";
}
 ?>
 <textarea rows="20" cols="80">
 <?php
 $dir = "C:/xampp/htdocs/dac/$sagar/";
 
$fp = fopen( $dir.$filename, "r" ) or die("Couldn't open $filename");
 //fputs( $fp, "And sagar\n" );
 //echo "<textarea rows="4" cols="50">;

 if(filesize("C:/xampp/htdocs/dac/$sagar/$filename") > 0){
 echo fread($fp,filesize("C:/xampp/htdocs/dac/$sagar/$filename"));
 
}


 fclose( $fp );
     
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