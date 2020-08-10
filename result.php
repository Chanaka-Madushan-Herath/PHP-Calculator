<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	
</head>
<body>
<div style="background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.4);   
    font-weight: bold;          
    position: relative; 
    color: black; 
    font-size: 40px;  
    width: auto;
    margin: 20px;
    padding: 50px;">
 <center>
 <?php
	session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   echo $_SESSION['answer'];


 ?></center> <center style="color: red; 
    font-size: 70px;" ><?php echo $_SESSION['answer1']; ?></center> </div> 
</body>
</html>