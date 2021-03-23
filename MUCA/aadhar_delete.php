<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";


$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$aadhar = $_POST['aadhar_no'];

$sql = "DELETE FROM aadhar WHERE aadhar = $aadhar";

$result = mysqli_query($conn,"SELECT * FROM aadhar where aadhar = $aadhar");
$check_aadhar_no = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
    $check_name =  $row['name'];
    $check_aadhar_no = $row['aadhar'];
}
}

if($check_aadhar_no == $aadhar){
  if(mysqli_query($conn,$sql)) {
    echo "Record deleted successfully";
  }
}
 else {
  echo "Error deleting record or record not present";
}
mysqli_close($conn);
?>