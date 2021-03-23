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
$check_voter_id = 0;
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result))
{
   
   
    $check_voter_id = $row['voter_id'];
}
}

if($voter_id != $check_voter_id ){
    session_start();
    header('Location:cannot_update.php');
}
else if(($voter_id == $check_voter_id ) && (mysqli_query($conn,$sql))){
    
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
    
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">UPDATE VOTER ID DETAILS</button>

  <div id="id01" class="modal">

<form class="modal-content animate" action="voter_insert.php" method="POST">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close"
      title="Close Modal">&times;</span>
    <img src="mucalogo1.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
  <table cellpadding="2" width="100%" bgcolor="skyblue" align="center" height="100%"
    cellspacing="2">
        <tr>
            <tr>
                <td>Voter ID</td>
                <td><input type="number" name="voter_id" id="voter_id" ></td>
            </tr>
            <td>Name</td>
            <td><input type="text" name="name" id="name" size="30"></td>
        </tr>
        <tr>
            <td>Father's name</td>
            <td><input type="text" name="rname" id="rname" size="30"></td>
        </tr>

        <tr>
            <td>Date Of Birth</td>
            <td><input type="date" name="dob" id="dob" required pattern="\d{4}-\d{2}-\d{2}"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" id="age" ></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td><input type="text" name="sex" id="sex"></td>
        </tr>
        <tr>
            <td>Personal Address</td>
            <td><input type="text" name="address"id="address" size="30">
            </td>
        </tr>
    
        <tr>
            <td>Date Of issue</td>
            <td><input type="date" name="issuedate" id="issuedate" required pattern="\d{4}-\d{2}-\d{2}"></td>
        </tr>
        <tr>
            <td>Permanent Address</td>
            <td><input type="text" name="par_address"id="par_address" size="30">
            </td>
        </tr>   
      
      
        <tr>
            <td>
                <input type="reset">
            </td>
            <td colspan="2">
                <input type="submit" value="Submit Form" >
            </td>
        </tr>
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