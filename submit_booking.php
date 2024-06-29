<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$guests = $_POST['guests'];
	$date = $_POST['date'];
	$time_slot = $_POST['time_slot'];

	// Database connection
	$conn = new mysqli('demo','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into table(name,phone,guests,date,time_slot) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("siiii", $name, $phone, $guests, $date, $time_slot);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
