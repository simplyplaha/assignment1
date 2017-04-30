<table cellpadding="5" cellspacing="0" border="1">
	<tr>
		<th>automobile_id</th>
		<th>car_model</th>
		<th>weight</th>
		<th>manufacture_year</th>
		<th>sales_email</th>
		<th>Action</th>
	</tr>
<?php
/* Open a connection */
$mysqli = new mysqli("localhost", "root", "", "tbl_automobiles");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql="SELECT * FROM cars";
$result=$mysqli->query($sql);

if ($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		//echo "id: " . $row["automobile_id"]. " - Name: " . $row["car_model"]. " Weight: " . $row["weight"]. " Year: " . $row["manufacture_year"]. "<br>";
		echo "<tr><td>" . $row["automobile_id"] . "</td><td>" . $row["car_model"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["manufacture_year"]. "</td><td>" . $row["sales_email"]. "</td><th><a href='automobile-edit.php'>Edit </a></th></tr>";
   }
} else {
    echo "0 results";
}
?>
</table>