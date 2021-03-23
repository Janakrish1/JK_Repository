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
<center><img src="aadhar_logo.png" style="width: 200px; height: 125px;" alt="Avatar" class="avatar"></center>
<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";


$con = new mysqli($host,$dbUsername,$dbPassword,$dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$aadhar = $_POST['aadhar_no'];
$result = mysqli_query($con,"SELECT * FROM aadhar where aadhar = $aadhar");
if(mysqli_num_rows($result) > 0){
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Aadhar Number</th>
    <th>Father Name</th>
    <th>Father Aadhar Number</th>
    <th>Postal Address</th>
    <th>Personal Address</th>
    <th>Date of Birth</th>
    <th>Age</th>
    <th>Sex</th>
    <th>State</th>
    <th>Capital</th>
    <th>District</th>
    <th>Pincode</th>
    <th>Email</th>
    <th>Contact Number</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['aadhar'] . "</td>";
    echo "<td>" . $row['fname'] . "</td>";
    echo "<td>" . $row['faadhar'] . "</td>";
    echo "<td>" . $row['postal_address'] . "</td>";
    echo "<td>" . $row['personal_address'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['sex'] . "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['capital'] . "</td>";
    echo "<td>" . $row['district'] . "</td>";
    echo "<td>" . $row['pincode'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['mob_no'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";

  
}
else{
    echo "Your Aadhar number is incorrect or not registered yet, if so please register.";
}
mysqli_close($con);
?>
<img src="aadhar_outline.jpg" style="width:1000px; height: 500px;" alt="Avatar" class="avatar">
</body>
</html>