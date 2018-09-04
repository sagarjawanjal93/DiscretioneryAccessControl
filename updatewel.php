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
	
<center>
MENU:
<a href=grant.php> GRANT PERMISSION</a>
<a href=revoke.php> REVOKE PERMISSION</a>

<form action="#" method="post">

  <p><font color = "red"> <h7> To Create Owner Files </h7></font></p>
  <input type="text" name="inputText"/>
  
  <input type="submit" value = "Create " name="SubmitButton"/>
 </form> 
<?php
$dir = "C:/xampp/htdocs/dac/$sagar/";

if(isset($_POST['SubmitButton']) )
{
$my_file = $_POST['inputText'];
$fp = fopen( $dir.$my_file, "a" ) or die("Couldn't open $my_file");
 
 fclose( $fp );
}

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
	  echo "<p><font color = 'red'> <h2>Owner Files</h2></font></p>"; 
    while (($file = readdir($dh)) !== false){
      echo "<a href=write1.php?compna=",urlencode($file),">$file</a>";
	  echo "<br>";
    }
    closedir($dh);
  }
}
?>

<p><font color = "red"> <h2> Access Files </h2></font></p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nitk";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select filename,access,objid from object INNER JOIN acm ON acm.oid = object.objid where objid IN (SELECT oid from acm where uid=(SELECT id from users where username = '$sagar')) group by objid";
$result = mysqli_query($conn, $sql) or die("Bad Query:$sql");
//echo"<html>"
//echo"<body background='imp.jpg'>";

//echo"<table border='1' align='center' bgcolor='white' bordercolor='blue'>";
//echo"<tr><td></td></tr>";


if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
//echo "<br> <br> <br>";
    while($row = mysqli_fetch_assoc($result)) {
	
	
      // echo "<tr><td>  <a href='write.php'>{$row["filename"]}</td><br>";
	 
	  // echo "<a href=write.php?compna=",urlencode($row["filename"]),">{$row["filename"]}</a><br>";
		$a1=$row["access"];
		//$a2=$row["faculty"];
		//$a3=$row["department"];
		
		echo $a1;
	if($a1==0)
	{
	  echo "<a href=write.php?compna=",urlencode($row["filename"]),">{$row["filename"]}</a><br>";
	
	}else{
	  echo "<a href=read.php?compna=",urlencode($row["filename"]),">{$row["filename"]}</a><br>";
	}
	
/*	if($a2=="read" ||$a2== "readwrite" ||  $a2=="write" )
	{
	$a2="enable";}
	else{
		
		$a2="disabled";}
		
	if($a3=="read" ||$a3== "readwrite" ||  $a3=="write" )
	{
		$a3="enable";
	}else{
		
		$a3="disabled";
		
	}
	
	
	$sgr ="<form ><br><a href='abcd3.php'><button type='button'".$a1.">STUDENTS</button></a>&nbsp<a href='abcd.php'><button type='button' ".$a2.">FACULTY</button></a>&nbsp<a href='abcd1.php'><button type='button' ".$a3.">DEPARTMENT</button></a></form>";
	
		echo $sgr;
	
	*/
	}
}else {
    echo "0 results";
}

echo"</table>";

$conn->close();
?> 

</center>
</br>
</br>
</br></br></br>

    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>

