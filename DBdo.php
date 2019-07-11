<?php


$namem = $_GET["name"];
$emailm = $_GET["emailadress"];


$servername = "localhost";
$username = "Vasi";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Players (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
flname VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,

)";

$sql = "INSERT INTO Players (id, flname, email)
VALUES ('id', '$namem', '$emailm')";

$sql = "SELECT id, flname, email FROM Players";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["flname"]. " " . $row["emailadress"]. "<br>";
    }

$conn->close();

?>