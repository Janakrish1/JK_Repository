<?php

$name = $_POST['name'];
$mob_no = $_POST['mob_no'];
$acc_no = $_POST['acc_no'];
$acc_bal = $_POST['acc_bal'];
$acc_type = $_POST['acc_type'];
$username = $_POST['username'];
$password = $_POST['password'];
$cvv = $_POST['cvv'];
$expiry_date = $_POST['expiry_date'];


if (!empty($name) || !empty($mob_no) || !empty($acc_no) || 
!empty($acc_bal) || !empty($acc_type) ||
!empty($username) || !empty($password) || !empty($cvv) || 
!empty($expiry_date)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "phplogin";

	
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
	} else {
		$SELECT = "SELECT acc_no From bank Where acc_no = ? Limit 1";
		$INSERT = "INSERT Into bank (name,mob_no,acc_no,acc_bal,acc_type,username,password,cvv,expiry_date) values(?,?,?,?,?,?,?,?,?)";
		
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$acc_no);
		$stmt->execute();
		$stmt->bind_result($acc_no);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("siiisssis",$name,$mob_no,$acc_no,$acc_bal,$acc_type,$username,$password,$cvv,$expiry_date);
			$stmt->execute();
			echo "New record inserted successfully";
		} else {
			echo "Someone already register using this account number";
		}
		$stmt->close();
		$conn->close();
	}
}
?>