<?php
session_start();
$conn = mysqli_connect("localhost","root","","libdb")or die ("could not connect to mysql"); 


define('HOST','localhost');
define('DATABASE','libdb');
define('USERNAME','root');
define('PASSWORD','');