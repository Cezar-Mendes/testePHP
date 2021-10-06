<?php

$hostname="localhost:3306";
	
	$username="root";
	$password="";
	$dbname="bdteste";
	
	$link=mysqli_connect($hostname,$username, $password,$dbname) or 
    ("html>script language='JavaScript'>alert(“Não foi possível se conectar ao banco de dados! 
    Tente novamente mais tarde.'),history.go(-1)/script>/html>");
    ?>