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

$bno = $_POST['bno'];

$sql = "DELETE FROM license WHERE bno = $bno";


$result = mysqli_query($conn,"SELECT * FROM license where bno = $bno");
$check_bno = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
    $check_bg =  $row['bg'];

    $check_bno = $row['bno'];
}
}

if($check_bno == $bno){

if(mysqli_query($conn,$sql)) {
  echo "Record deleted successfully";
}
} else {
  echo "Error deleting record or record not present ";
}
mysqli_close($conn);
?>