<?php
/* Database credentials.*/
const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'mssn-secure';
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if (!is_null($mysqli->connect_error))
{
   echo 'Connection failed<br>';
   echo 'Error number: ' . $mysqli->connect_errno . '<br>';
   echo 'Error message: ' . $mysqli->connect_error . '<br>';
   die();
}

?>