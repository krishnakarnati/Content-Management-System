<?php

$conn=mysqli_connect('localhost','root','','cms');
if(!$conn)
{
die("Connection Error" .mysqli_error($conn));
}

?>