<?php

$con=mysqli_connect("localhost","broadcast02","Wze31FUTZ5","tvmonitor");

$sql="SELECT * FROM checktv";
$result = $con->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<pre>";
		print var_dump($row);
		echo "</pre>";
	}
} else {
	echo "0 results";
}
$conn->close();

