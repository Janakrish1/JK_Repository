<?php


$name = $_POST['name'];
$rname = $_POST['rname'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$issuedate = $_POST['issuedate'];
$par_add = $_POST['par_address'];
$voter_id = $_POST['voter_id'];


if ( !empty($name) || !empty($rname) || !empty($dob) || !empty($sex) || 
!empty($voter_id) || !empty($address) || !empty($issuedate) || !empty($par_add) || 
!empty($expiry_date)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "phplogin";

	
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
	} else {
		$SELECT = "SELECT voter_id From vote Where voter_id = ? Limit 1";
		$INSERT = "INSERT Into vote (name,rname,dob,age,sex,address,issuedate,par_add,voter_id) values(?,?,?,?,?,?,?,?,?)";
		
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$voter_id);
		$stmt->execute();
		$stmt->bind_result($voter_id);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sssisssss",$name,$rname,$dob,$age,$sex,$address,$issuedate,$par_add,$voter_id);
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