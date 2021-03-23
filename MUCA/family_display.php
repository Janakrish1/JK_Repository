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

$mob_no = $_POST['mob_no'];
$result = mysqli_query($con,"SELECT * FROM family where mob_no = $mob_no");
if(mysqli_num_rows($result) > 0){
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Relation's Name</th>
    <th>Date of Birth</th>
    <th>Age</th>
    <th>Contact Number</th>
    <th>Address</th>
    <th>Number of family members</th>
    <th>Family members</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['rname'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['mob_no'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['nof'] . "</td>";
    echo "<td>" . $row['fm'] . "</td>";
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