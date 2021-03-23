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

$voter_id = $_POST['voter_id'];

$sql = "DELETE FROM vote WHERE voter_id = $voter_id";

$result = mysqli_query($conn,"SELECT * FROM vote where voter_id = $voter_id");
$check_aadhar_no = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
   
    $check_voter_id= $row['voter_id'];
}
}

if($check_voter_id == $voter_id){
  if(mysqli_query($conn,$sql)) {
    echo "Record deleted successfully";
  }
}
 else {
  echo "Error deleting record or record not present";
}
mysqli_close($conn);
?>