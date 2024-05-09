<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the form data
    $my_state = $_POST['my_state'];
    $decl_status = isset($_POST['decl_status']) ? $_POST['decl_status'] : '';

    // Prepare and bind SQL insert statement
    $stmt = $conn->prepare("INSERT INTO login9 (my_state, decl_status) VALUES (?, ?)");

    // Bind parameters
    $stmt->bind_param("ss", $my_state, $decl_status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}

?>
