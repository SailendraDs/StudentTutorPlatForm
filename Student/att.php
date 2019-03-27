<?php
session_name('Chutiya');
session_start();
$study = $_SESSION["studname"];
$dbhost = "localhost";
$dbname = "srm";
$dbpass = "";
$dbshit = "root";



$conn = new mysqli($dbhost, $dbshit, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT regno FROM student WHERE name = '$study'";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $pam = $row['regno'];
    }
}


$pql = "SELECT * FROM attendance WHERE regno = '$pam'";
$result = $conn->query($pql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
     $_SESSION["value"] = $value;
$_SESSION["value1"] = $value1;
$_SESSION["value2"] = $value2;
        $value = $row["regno"];
        $value1 = $row["max"];
        $value2 = $row["pre"];
    }
}


$conn->close();

require_once("attendance.html");

?>