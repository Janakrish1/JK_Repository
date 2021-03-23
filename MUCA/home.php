<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

.zip {
  position: relative;
  width: 100%;
  max-width: 400px;
}

.zip img {
  width: 100%;
  height: auto;
}

.zip .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: left;
}

.zip .btn:hover {
  background-color: black;
}


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
    
     
      
      background: linear-gradient(to right, #1c87c9, #ffcc00);
   
      
      padding-top: 60px;
    }

    
    .modal-content {
      background: linear-gradient(to right, #1c87c9, #ffcc00);
      margin: 5% auto 15% auto;
      
      border: 1px solid #888;
      width: 80%;
      background-image: url('muca_card.png');
      background-repeat: no-repeat;
      background-size: cover;
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
  
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }

    
.tcontainer {
    width: 100%;
    overflow: hidden; 
    color:white;
    font-weight:bold;
  }
   

  .ticker-wrap {
    width: 100%;
    padding-left: 100%; 
 
  }
  
  
  @keyframes ticker {
    0% { transform: translate3d(0, 0, 0); }
    100% { transform: translate3d(-100%, 0, 0); }
  }
  .ticker-move {
    
    display: inline-block;
    white-space: nowrap;
    padding-right: 100%;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    animation-name: ticker;
    animation-duration: 10s;
  }
  .ticker-move:hover{
    animation-play-state: paused;
  }


  .ticker-item{
    display: inline-block; 
    padding: 0 2rem;
  }

  <style>
      * {
        box-sizing: border-box;
      }
      .slider {
        width: 300px;
        text-align: center;
        overflow: hidden;
      }
      .slides {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
      }
      .slides::-webkit-scrollbar {
        width: 10px;
        height: 10px;
      }
      .slides::-webkit-scrollbar-thumb {
        background: #666;
        border-radius: 10px;
      }
      .slides::-webkit-scrollbar-track {
        background: transparent;
      }
      .slides > div {
        scroll-snap-align: start;
        flex-shrink: 0;
        width: 300px;
        height: 300px;
        margin-right: 50px;
        border-radius: 10px;
        background: linear-gradient(to right, #1c87c9, #ffcc00);
        transform-origin: center center;
        transform: scale(1);
        transition: transform 0.5s;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100px;
      }
      .slider > a {
        display: inline-flex;
        width: 8rem;
        height: 3rem;
        background:white;
        text-decoration: none;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 0 0.5rem 0;
        position: relative;
        color:red;
      }
      .slider > a:active {
        top: 1px;
        color: #1c87c9;
      }
      .slider > a:focus {
       | background: linear-gradient(to right, #1c87c9, #ffcc00);
      }
      /* Don't need button navigation */
      @supports (scroll-snap-type) {
        .slider > a {
          display: none;
        }
      }
      html,
      body {
        height: 100%;
        overflow: hidden;
      }
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to right, #1c87c9, #ffcc00);
        font-family: 'Ropa Sans', sans-serif;
      }
      .modal-body {
   background-image: url('muca_card.png');
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
<div id="particles-js">
<div style="color:cyan;font-size: 50px;">
        <b><MARQUEE WIDTH="25%">
          <p>Multi Cards</p>
        </MARQUEE>
        <MARQUEE HSPACE=10 WIDTH="25%">
          <p>Multi Cards</p>
        </MARQUEE>
        <MARQUEE HSPACE=50 WIDTH="25%">
          <p>Multi Cards</p>
        </MARQUEE>
        </b>
        </div>
<div class="header">
  <h1 style="text-align:center;color:red;font-size:40px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">MuCa</h1>
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
  <u><center> <h1 style="color:red;font-size:50px;font-family:'Times New Roman', Times, serif;">ADMIN PAGE</h1></center></u>
<div class="zip">
<img id="myImg" src="muca_card.png" alt="Snow" style="width:130%">
</div>
</div>




    
   
 

  <div class="col-6 col-s-9">
   
    <p style="color:chartreuse;font-size:25px;">Only those who have the privilege can access this site if accessed illegaly it is reported as a crime</p>
  </div>

  <div class="col-3 col-s-12">
    <div class="aside">
      <h2 style="color:black;">What?</h2>
      <p>This page is to add or modify a different cards based on user requirement</p>
      <h2 style="color:black;">Where?</h2>
      <p>This page blogs to MC's a young developer,who only has the privilege to do so</p>
      <h2 style="color:black;">How?</h2>
      <p>The link at the left enables you to do the necessary works</p>
    </div>
  </div> 
</div>



<div class="tcontainer"><div class="ticker-wrap"><div class="ticker-move">
    <div class="ticker-item">INSERT</div>
    <div class="ticker-item">MODIFY</div>
    <div class="ticker-item">DISPLAY</div>
    <div class="ticker-item">DELETE</div>
    <div class="ticker-item">INSERT</div>
    <div class="ticker-item">MODIFY</div>
    <div class="ticker-item">DISPLAY</div>
    <div class="ticker-item">DELETE</div>
    <div class="ticker-item">INSERT</div>
    <div class="ticker-item">MODIFY</div>
    <div class="ticker-item">DISPLAY</div>
    <div class="ticker-item">DELETE</div>
  </div></div></div>

  <div class="footer">
  <p style="font-weight:bold;color:yellow">MuCa from Mulitple cards to a single one</p>
</div>
  </div>

  
  <div id="id01" class="modal">

<form class="modal-content animate" action="insert.php" method="POST">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close"
      title="Close Modal">&times;</span>
    <img src="mucalogo1.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">

  <div class="slider">
<center>
<div class="slider">

      <a href="#slide-1">AADHAR</a>
      <a href="#slide-2">BANK</a>
      <a href="#slide-3">VOTER</a>
      <a href="#slide-4">RATION</a>
      <a href="#slide-5">LICENSE</a>
      
      <div class="slides">
        
        <div id="slide-1"><a href="card_home.html" class="button" style="width:auto; color:white">AADHAR CARD</a></div>
        <div id="slide-2"><a href="bank_home.html" class="button" style="width:auto; color:white">BANK CARD</a></div>
        <div id="slide-3"><a href="voter_home.html" class="button" style="width:auto; color:white">VOTER ID</a></div>
        <div id="slide-4"><a href="family_home.html" class="button" style="width:auto; color:white">FAMILY CARD</a></div>
        <div id="slide-5"> <a href="license_home.html" class="button" style="width:auto; color:white">DRIVING LICENSE</a></div>
        
      </div>
      
    </div>
    

</form>
</div>


  <script>
  var modal = document.getElementById("id01");
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("imgcontainer");

  img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  
}

var modal = document.getElementById('id01');


window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>