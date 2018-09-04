<html>
 <head>
 <title>Listing 10.13 Writing and appending to a file</title>
 </head>
 <body>
 <textarea rows="16" cols="90">
 <?php
  $filename = $_GET['compna'];
 
// print "Appending to $filename<br>";
 $fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
 //fputs( $fp, "And sagar\n" );
 echo fread($fp,filesize("$filename"));
 fclose( $fp );
 ?>
 </textarea>
 </body>
 </html>