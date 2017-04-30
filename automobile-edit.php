<?php
/* Open a connection */
$mysqli = new mysqli("localhost", "root", "", "tbl_automobiles");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST['btnsave'])) { //save button is clicked
	$c_model = $_POST['c_model'];
	$c_model_valid = false;
	$weight_valid = false;
	$m_year_valid = false;
	$s_mail_valid = false;
	
	//check for valid car model input
	if ((strcasecmp($c_model ,'mercedes')==0) or (strcasecmp($c_model ,'audi')==0) or (strcasecmp($c_model ,'ford')==0) or (strcasecmp($c_model ,'honda')==0) or (strcasecmp($c_model,'toyota')==0) or (strcasecmp($c_model ,'chevrolet')==0)){ 
		$c_model_valid = true;
	}else{
		echo"Car model entered is: " . ($_POST['c_model']) . ". We've never heard of that car before."."<br>";
	}
	//check for valid weight input
	if ($_POST['weight']>5 && ($_POST['weight']<10)){
		$weight_valid = true;
	}else{
		echo"Weight entered is: " . ($_POST['weight']) . ". Valid range for weight is between 5 and 10."."<br>";
	}
	//check for valid manufacture year input
	if ($_POST['m_year']>1950){
		$m_year_valid = true;
	}else{
		echo"Manufacture year entered is: " . ($_POST['m_year']) . ". Manufacture year must be greater than 1950"."<br>";
	}
	//check for valid sales email input
	if (preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i', $_POST['s_mail'])){
		$s_mail_valid = true;
	}else{
		echo"Please enter a valid email address!";
	}
		
	//if no automobile id is provided, then insert new values to database if all inputs are valid
	if (empty($_POST['auto_id']) and $c_model_valid and $weight_valid and $m_year_valid and $s_mail_valid){
		$car_model = $_POST['c_model'];
		$weight = $_POST['weight'];
		$manu_year = $_POST['m_year'];
		$s_mail = $_POST['s_mail'];
		
		$sql = "INSERT INTO cars (car_model,weight,manufacture_year,sales_email) values ('$car_model','$weight','$manu_year,$s_mail')";
		if(mysqli_query($mysqli, $sql)){
			echo "Records inserted successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
		}
		mysqli_close($mysqli); //close database connection
	}
	//if automobile id is provided then we are update the values in the database
	if ((isset($_POST['auto_id'])) and $s_mail_valid and $_POST['auto_id']>0){ //id greater than 0 to prevent blank values and make sure email is valid
		$auto_id = $_POST['auto_id'];
		$car_model = $_POST['c_model'];
		$weight = $_POST['weight'];
		$manu_year = $_POST['m_year'];
		$s_mail = $_POST['s_mail'];
		
		$sql = "UPDATE cars SET car_model = '".$car_model."', weight = '".$weight."', manufacture_year = '".$manu_year."', sales_email = '".$s_mail."' WHERE automobile_id = '".$auto_id."'";
		if ($mysqli->query($sql)==TRUE){
			echo "Record updated successfully";
		} else{
			echo "Error updating record: " . $mysqli->error;
		}
	}	
}
//if query button is clicked, then get the data from that row 
if (isset($_POST['btnquery'])){
	$auto_idq = $_POST['auto_id'];
	$sql = "SELECT * from cars where automobile_id = '".$auto_idq."'";
	$result = $mysqli->query($sql);
	if ($result->num_rows>0){
		$row=$result->fetch_assoc();
		$car_modelq = $row["car_model"];
		$weightq = $row["weight"];
		$m_yearq = $row["manufacture_year"];
		$s_mailq = $row['sales_email'];		
	}
}
?>

<form action="" method="post"">
	<table>
		<tr>
			<td>Automobile ID</td>
			<td><input type="number" name="auto_id" value ="<?php if (isset($auto_idq)) echo $auto_idq;?>"></td>
		</tr>
		<tr>
			<td>Car Model</td>
			<td><input type="text" name="c_model" required value ="<?php if (isset($car_modelq)) echo $car_modelq;?>"></td>
		</tr>
		<tr>
			<td>Weight</td>
			<td><input type="number" name="weight" required value ="<?php if (isset($weightq)) echo $weightq;?>""></td>
		</tr>
		<tr>
			<td>Manufacture Year</td>
			<td><input type="number" name="m_year" required value ="<?php if (isset($m_yearq)) echo $m_yearq;?>""></td>
		</tr>
		<tr>
			<td>Sales email</td>
			<td><input type="text" name="s_mail" required value ="<?php if (isset($s_mailq)) echo $s_mailq;?>""></td>
		</tr>
		<tr>
			<td><input type="submit" value="Query" name="btnquery" formnovalidate></td>
			<td><input type="submit" value="Save" name="btnsave"></td>
		</tr>
	</table>	
</form>