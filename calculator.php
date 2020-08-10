<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calculator</title>
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
$buttons=['C','+/-','%','/',7,8,9,'*',4,5,6,'-',1,2,3,'+',0,'Del','.','='];
$pressed='';
if(isset($_POST['pressed']) && in_array($_POST['pressed'],$buttons)){
    $pressed=$_POST['pressed'];
}
$stored='';
if(isset($_POST['stored']) && preg_match('~^(?:[\d.]+[*/+-]?)+$~',$_POST['stored'],$out)){
    $stored=$out[0];    
}
$display=$stored.$pressed;
if($pressed=='C'){
    $display='';
}
if($pressed=='+/-'){
    $display=-$stored;
}
  if($pressed=='Del'){
  	$display= substr($display, 0, -4);

}elseif($pressed=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$stored)){
	session_start();
   $_SESSION['answer'] = $display;
   $_SESSION['answer1'] = eval("return $stored;");
     header("Location: result.php");

}

echo "<form action=\"\" method=\"POST\" >";
    echo "<table style=\"width:320px;heght:650px; border:solid thick black;background:lightsteelblue;display:grid;\">";
        echo "<tr>";
            echo "<td style=\"width: 500px; height: 100px; background-color: blue; \"colspan=\"4\">$display</td>";
        echo "</tr>";
        foreach(array_chunk($buttons,4) as $chunk){
            echo "<tr>";
                foreach($chunk as $button){
                    echo "<td",(sizeof($chunk)!=4?" colspan=\"4\"":""),"><button name=\"pressed\" style=\"padding:20px 20px;border-top:1px solid #262626;border-left:1px solid #262626;border-right:2px outset #262626;border-bottom:2px outset #262626;background: #eeeeee;font-family:arial,helvetica,sans-serif;font-weight:bold;font-size:20px;\" value=\"$button\">$button</button></td>";
                }
            echo "</tr>";
        }
    echo "</table>";
    echo "<input type=\"hidden\" name=\"stored\" value=\"$display\">";
echo "</form>";
?></center>
</body>
</html>