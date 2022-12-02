<?php
$polaczenie = new mysqli("localhost","root","","cms4zsz");

if ($polaczenie -> connect_errno) {
  echo "Failed to connect to MySQL: " . $polaczenie -> connect_error;
  exit();
}
?>





