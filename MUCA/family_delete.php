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

$mob_no = $_POST['mob_no'];

$sql = "DELETE FROM family WHERE mob_no = $mob_no";


$result = mysqli_query($conn,"SELECT * FROM family where mob_no = $mob_no");
$check_mob_no = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
    $check_name =  $row['name'];
    $check_mob_no = $row['mob_no'];
}
}

if($check_mob_no == $mob_no){

if(mysqli_query($conn,$sql)) {
  echo "Record deleted successfully";
}
} else {
  echo "Error deleting record or record not present ";
}
mysqli_close($conn);
?>