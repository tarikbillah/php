<?php	
$servername="localhost";
$username="root";
$password="";
$dbname="bcmc";
$tablename="student";
//cheack connection with out database
$con=new mysqli($servername,$username,$password);

//cheack connection with database
$con_db=new mysqli($servername,$username,$password,$dbname);

?>