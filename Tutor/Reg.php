<?php
    $name = filter_input(INPUT_POST, 'name');
    $regno = filter_input(INPUT_POST, 'RegNo');
    $subject = filter_input(INPUT_POST, 'subject');
    $mail = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $dbhost = "localhost";
    $dbname = "root";
    $dbcode = "";
    $dbtab = "SRM";

    $conn = new mysqli($dbhost, $dbname, $dbcode, $dbtab);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tutreg VALUES('$name','$regno','$subject','$email','$password')";

    if($conn->query($sql)){
         require_once("Tutor-log.html");
    }
    else {
        echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();

?>