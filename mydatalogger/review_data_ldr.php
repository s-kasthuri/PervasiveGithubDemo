<?php
include("dbconnect.php");
$dblink = Connection();

$query = "SELECT * FROM ldr_logs ORDER BY timestamp ASC";

if($result = mysqli_query($dblink, $query)){
	echo "Reading records successfully from ldr_logs <br>";
} else {
	echo "Error: " . $query . "<br>" . mysqli_error($dblink);
}
?>

<html>
<body>
   <h1>Arduino Sensors Data</h1>
   <h3>Light Level</h3>
   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>Timestamp</td><td>Light Level</td>	
		</tr>
      <?php 
		  if(mysqli_num_rows($result) > 0){
		     while($row = mysqli_fetch_assoc($result)) {
		        printf("<tr>
							<td>%s</td><td>%s</td>
					   </tr>", 
		           $row["timestamp"], $row["lightlevel"]);
		     }
		  }
		  mysqli_close($dblink);
      ?>
   </table>
</body>
</html>