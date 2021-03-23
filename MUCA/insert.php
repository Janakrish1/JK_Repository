<?php

$name = $_POST['name'];
$aadhar = $_POST['aadhar'];
$fname = $_POST['fname'];
$faadhar = $_POST['faadhar'];
$postal_address = $_POST['postal_address'];
$personal_address = $_POST['personal_address'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$state = $_POST['state'];
$capital = $_POST['capital'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$email = $_POST['email'];
$mob_no = $_POST['mob_no'];

if (!empty($name) || !empty($aadhar) || !empty($fname) || 
!empty($faadhar) || !empty($postal_address) ||
!empty($personal_address) || !empty($dob) || !empty($age) || 
!empty($sex) || !empty($state) || !empty($capital) || !empty($district)
|| !empty($pincode) || !empty($email) || !empty($mob_no)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "phplogin";

	//create connection
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	
	$result = mysqli_query($conn,"SELECT * FROM aadhar where aadhar = $aadhar");
$check_aadhar_no = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
    $check_name =  $row['name'];
    $check_aadhar_no = $row['aadhar'];
}
}

	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
	} else {
	
		if($check_aadhar_no != $aadhar){
		$SELECT = "SELECT email From aadhar Where email = ? Limit 1";
		$INSERT = "INSERT Into aadhar (name,aadhar,fname,faadhar,postal_address,personal_address,dob,age,sex,state,capital,district,pincode,email,mob_no) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		
		//Prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sisisssissssisi",$name,$aadhar,$fname,$faadhar,$postal_address,$personal_address,$dob,$age,$sex,$state,$capital,$district,$pincode,$email,$mob_no);
			$stmt->execute();
			echo "New record inserted successfully";
		}
		$stmt->close();
	 } else {
			echo "Someone already register using this email";
		}
		
		$conn->close();
	}
}
?>