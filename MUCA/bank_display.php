<!doctype html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  background-color: #4CAF50 ;
}

th {
  text-align: left;
  padding: 16px;
  
}
td {
  background-color: #f2f2f2;
  color:
}



</style>
</head>
<body>

<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";

//create connection
$con = new mysqli($host,$dbUsername,$dbPassword,$dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$acc_no = $_POST['acc_no'];
$result = mysqli_query($con,"SELECT * FROM bank where acc_no = $acc_no");
if(mysqli_num_rows($result) > 0){
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Account Number</th>
    <th>Account Balance</th>
    <th>Account Type</th>
    <th>Username</th>
    <th>Password</th>
    <th>CVV</th>
    <th>Contact Number</th>
    <th>Expiry Date</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['acc_no'] . "</td>";
    echo "<td>" . $row['acc_bal'] . "</td>";
    echo "<td>" . $row['acc_type'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['cvv'] . "</td>";
    echo "<td>" . $row['mob_no'] . "</td>";
    echo "<td>" . $row['expiry_date'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
  
}
else{
    echo "Your Account number is incorrect or not registered yet, if so please register.";
}
mysqli_close($con);
?>


</body>
</html>