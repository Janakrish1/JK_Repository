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
$name = $_POST['name'];


$sql = "DELETE FROM aadhar WHERE aadhar = $aadhar";
$result = mysqli_query($conn,"SELECT * FROM aadhar where aadhar = $aadhar");

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
    $check_name =  $row['name'];
    $check_aadhar = $row['aadhar'];
}
}

if($name != $check_name || $aadhar != $check_aadhar){
    session_start();
    header('Location:cannot_update.php');
}
else if(($name == $check_name || $aadhar == $check_aadhar) && (mysqli_query($conn,$sql))){
    
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #1133cc;
  color: #000000;
  font-size:300px;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #33b5e5;
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #0099cc;
}

.aside {
  background-color: #33b5e5;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  background-color: #0099cc;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 15px;
}


[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
</style>



<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    
    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }

    img.avatar {
      width: 15%;
      border-radius: 15%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    
    .modal {
      display: none;
      
      position: fixed;
      
      z-index: 1;
      
      left: 0;
      top: 0;
      width: 100%;

      height: 100%;
      
      overflow: auto;
      
      background-color: rgb(0, 0, 0);
      
      background-color: rgba(0, 0, 0, 0.4);
      
      padding-top: 60px;
    }

    
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto;
      
      border: 1px solid #888;
      width: 80%;
      
    }

    
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
    .bor{
      border: 5px solid greenyellow;
    }


    .button
    {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      text-decoration:none;
      color:initial;
    }


    .button
    {
      -webkit-appearance:button;
      text-decoration:none;
      color:initial;
    }

  </style>
        <script> 
          
          
          var head = document.getElementsByTagName('HEAD')[0];  
    
          
          var link = document.createElement('link'); 
    
            
          link.rel = 'stylesheet';  
        
          link.type = 'text/css'; 
        
          link.href = 'style.css';  

          head.appendChild(link);  
      </script>


</head>
<body>
    
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">UPDATE CREDIT CARD DETAILS</button>

  <div id="id01" class="modal">

<form class="modal-content animate" action="insert.php" method="POST">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close"
      title="Close Modal">&times;</span>
    <img src="mucalogo1.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">

<table cellpadding="2" width="100%" align="center" height="100%"
cellspacing="2">

    <tr>
        <td colspan=2>
        <center><font size=4><b>AADHAR DETAILS</b></font></center>
        </td>
    </tr>

    <tr>
        <td>Name</td>
        <td><input type="text" name="name" id="name" size="30"></td>
    </tr>
    <tr>
        <td>Aadhar Number</td>
        <td><input type="number" name="aadhar" id="aadhar"></td>
    </tr>
    <tr>
        <td>Father Name</td>
        <td><input type="text" name="fname" id="fname"
        size="30"></td>
    </tr>
    <tr>
        <td>Father Aadhar NUmber</td>
        <td><input type="number" name="faadhar" id="faadhar" ></td>
    </tr>
    <tr>
        <td>Postal Address</td>
        <td><input type="text" name="postal_address" id="postal_address" size="30"></td>
    </tr>

    <tr>
        <td>Personal Address</td>
        <td><input type="text" name="personal_address"id="personal_address" size="30">
        </td>
    </tr>
    
    <tr>
        <td>Date Of Birth</td>
        <td><input type="date" name="dob" id="dob" required pattern="\d{4}-\d{2}-\d{2}"></td>
    </tr>
    <tr>
        <td>Age</td>
        <td><input type="number" name="age" id="age" min="0" max="90"></td>
    </tr>
    <tr>	
        <td>Sex</td>
        <td>
            <input type="radio" name="sex" value="male" size="10">Male
            <input type="radio" name="sex" value="Female" size="10">Female
        </td>
    </tr>

    <tr>
    <td>State</td>
        <td>
        <select name="state">
            <option value="-1" selected>select</option>
            <option value="TAMIL NADU">Tamil Nadu</option>
            <option value="KERALA">Kerala</option>
            <option value="ANDHARA PRADESH">Andhara Pradesh</option>
            <option value="KARNATAKA">Karnataka</option>
        </select></td>
    </tr>

    

    <tr>
    <td>Capital</td>
        <td><select name="capital">
        <option value="-1" selected>select</option>
        <option value="New Delhi">New Dekhi</option>
        <option value="Chennai">Chennai</option>
        <option value="Goa">Goa</option>
        <option value="Bihar">Bihar</option>
        </select></td>
    </tr>
    <tr>
        <td>District</td>
        <td><select name="district">
        <option value="-1" selected>select</option>
        <option value="Chennai">Chennai</option>
        <option value="Coimbatore">Coimbatore</option>
        <option value="Kangayam">Kangayam</option>
        <option value="Karur">Karur</option>
    </select></td>

    </tr>
    <tr>
        <td>PinCode</td>
        <td><input type="text" name="pincode" id="pincode" size="30"></td>
    </tr>
    <tr>
        <td>EmailId</td>
        <td><input type="text" name="email" id="email" size="30"></td>
    </tr>


    <tr>
        <td>MobileNo</td>
        <td><input type="text" name="mob_no" id="mob_no" ></td>
    </tr>
    
    
    <tr>
        <td>Personal photo</td>
        <td><input type="file" accept="image/*" capture></td>
    </tr>
    <tr>
        <td>
            <input type="reset">
        </td>
    </tr>
    <div class="container" style="background-color:#f1f1f1">
    <input type="submit" value="Submit">
  </div>
</table>

</form>
</div>

<script>

var modal = document.getElementById('id01');


window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>