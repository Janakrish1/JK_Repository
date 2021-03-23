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
<body style="background-image: url('vote.png');background-repeat:no-repeat;background-size: cover;">

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

$voter_id = $_POST['voter_id'];
$result = mysqli_query($con,"SELECT * FROM vote where voter_id = $voter_id");
if(mysqli_num_rows($result) > 0){
    echo "<table border='1'>
    <tr>
    <th>Voter ID</th>
    <th>Name</th>
    <th>Father's Name</th>
    <th>Date of Birth</th>
    <th>Age</th>
    <th>Sex</th>
    <th>Address</th>
    <th>Issue date</th>
    <th>Permanent address</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['voter_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['rname'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['sex'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['issuedate'] . "</td>";
    echo "<td>" . $row['par_add'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
  
}
else{
    echo "Your Voter ID is incorrect or not registered yet, if so please register.";
}
mysqli_close($con);
?>

</body>
</html>