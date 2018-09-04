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


<form action="#" method="post">

  <p><font color = "red"> <h7> Grant Access To file </h7></font></p>
 Input File: <input type="text" name="inputText"/>
  
  <input type="submit" value = "Grant" name="SubmitButton1"/>
 </form> 
 
 <form action="#" method="post">

  <p><font color = "red"> <h7> Grant Access To User </h7></font></p>
userid: <input type="number" name="uid"/>
object id : <input type="number" name="oid"/>
  
  access :<input type="number" name="access"/>
  
  <input type="submit" value = "Grant" name="SubmitButton2"/>
 </form> 

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

if(isset($_POST['SubmitButton1'])){
$Name = $_POST['inputText'];
copy("C:/xampp/htdocs/dac/$sagar/$Name",$Name);
$sql = "insert into object(filename) values ('$Name')";
if(mysqli_query($conn, $sql))
{
	echo "query inserted";
	
}
else{
echo "query not inserted";
}

$sql = "select id from users ";
$result = mysqli_query($conn, $sql) or die("Bad Query:$sql");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
//echo "<br> <br> <br>";
    while($row = mysqli_fetch_assoc($result)) {
	
	
      
		$a1=$row["id"];
		echo "\n";
		echo $a1;
		//$a2=$row["faculty"];
		//$a3=$row["department"];
		
	
	}
}else {
    echo "0 results";
}

$sql = "select objid from object where filename='$Name'";
$result = mysqli_query($conn, $sql) or die("Bad Query:$sql");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
//echo "<br> <br> <br>";
    while($row = mysqli_fetch_assoc($result)) {
	
	
      
		$a1=$row["objid"];
		echo "<br>Oject id<br>\n";
		echo $a1;
		//$a2=$row["faculty"];
		//$a3=$row["department"];
		
	
	}
}else {
    echo "0 results";
}

}
	
if(isset($_POST['SubmitButton2']))
{
$oid = $_POST['oid'];
$uid = $_POST['uid'];
$access = $_POST['access'];
$sql = "insert into acm (uid,oid,access)values('$uid','$oid','$access')";


if(mysqli_query($conn, $sql))
{
	echo "query inserted";
	
}
else{
echo "query not inserted";
}

}
	
$dir = "C:/xampp/htdocs/dac/$sagar/";

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
	
	
		$a1=$row["access"];
		
		
	if($a1==0)
	{
	  echo "<a href=write.php?compna=",urlencode($row["filename"]),">{$row["filename"]}</a><br>";
	
	}else{
	  echo "<a href=read.php?compna=",urlencode($row["filename"]),">{$row["filename"]}</a><br>";
	}
	
	}
}else {
    echo "0 results";
}

//echo"</table>";

$conn->close();

?>
</center>
</br>
</br>
</br></br></br>

    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>



