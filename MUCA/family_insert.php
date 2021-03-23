<?php

$name = $_POST['name'];
$rname = $_POST['rname'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$mob_no = $_POST['mob_no'];
$address = $_POST['address'];
$nof = $_POST['nof'];
$fm = $_POST['fm'];



if (!empty($name) || !empty($rname) || !empty($dob) || 
!empty($age) || !empty($mob_no) ||
!empty($address) || !empty($nof) || !empty($fm)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "phplogin";

	
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
	} else {
		$SELECT = "SELECT mob_no From family Where mob_no = ? Limit 1";
		$INSERT = "INSERT Into family (name,rname,dob,age,mob_no,address,nof,fm) values(?,?,?,?,?,?,?,?)";
		
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("i",$mob_no);
		$stmt->execute();
		$stmt->bind_result($mob_no);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sssiisis",$name,$rname,$dob,$age,$mob_no,$address,$nof,$fm);
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