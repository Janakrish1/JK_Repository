<?php


$name = $_POST['name'];
$rname =  $_POST['rname'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$issuedate = $_POST['issuedate'];
$validity = $_POST['validity'];
$bg = $_POST['bg'];
$bdate = $_POST['bdate'];
$bno = $_POST['bno'];
$vehicle = $_POST['vehicle'];
$sex = $_POST['sex'];
$address = $_POST['address'];


if ( !empty($name) || !empty($rname) || !empty($dob) || !empty($age) ||!empty($issuedate) ||!empty($validity) ||!empty($bg) 
|| !empty($bdate) ||!empty($bno) || !empty($vehicle) ||  !empty($sex) ||!empty($address)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "phplogin";

	
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
	} else {
		$SELECT = "SELECT name From license Where name = ?  Limit 1";
		$INSERT = "INSERT Into license (name,rname,dob,age,issuedate,validity,bg,bdate,bno,vehicle,sex,address) values(?,?,?,?,?,?,?,?,?,?,?,?)";
		
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$name);
		$stmt->execute();
		$stmt->bind_result($name);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sssissssisss",$name,$rname,$dob,$age,$issuedate,$validity,$bg,$bdate,$bno,$vehicle,$sex,$address);
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