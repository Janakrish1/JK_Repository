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

body{
    
}


</style>
</head>
<body style="background-image: url('lic.jpg');background-repeat:no-repeat;background-size: cover;">

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



$bno = $_POST['bno'];
$result = mysqli_query($con,"SELECT * FROM license where bno = $bno");
if(mysqli_num_rows($result) > 0){
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Relation's Name</th>
    <th>Date of Birth</th>
    <th>Age</th>
    <th>Issue date</th>
    <th>Validity</th>
    <th>Blood Group</th>
    <th>Badge Date</th>
    <th>Badge Number</th>
    <th>Vehicle</th>
    <th>Sex</th>
    <th>Address</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['rname'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['issuedate'] . "</td>";
    echo "<td>" . $row['validity'] . "</td>";
    echo "<td>" . $row['bg'] . "</td>";
    echo "<td>" . $row['bdate'] . "</td>";
    echo "<td>" . $row['bno'] . "</td>";
    echo "<td>" . $row['vehicle'] . "</td>";
    echo "<td>" . $row['sex'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
  
}
else{
    echo "Your License is incorrect or not registered yet, if so please register.";
}
mysqli_close($con);
?>

</body>
</html>