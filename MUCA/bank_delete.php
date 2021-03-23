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

$account_no = $_POST['account_no'];

$sql = "DELETE FROM bank WHERE acc_no = $account_no";


$result = mysqli_query($conn,"SELECT * FROM bank where acc_no = $account_no");
$check_acc_no = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
    $check_name =  $row['name'];
    $check_acc_no = $row['acc_no'];
}
}

if($check_acc_no == $account_no){

if(mysqli_query($conn,$sql)) {
  echo "Record deleted successfully";
}
} else {
  echo "Error deleting record or record not present ";
}
mysqli_close($conn);
?>