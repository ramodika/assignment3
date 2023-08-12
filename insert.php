<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "connect";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user inputs
    $customername = $_POST["customername"];
    $theme = $_POST["theme"];
    $email = $_POST["email"];
    $tpnumber = $_POST["tpnumber"];

    // Insert data into the database
    $sql = "INSERT INTO contacts (customername, theme, email, tpnumber)
            VALUES ('$customername', '$theme', '$email', '$tpnumber')";

    if ($conn->query($sql) === true) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
