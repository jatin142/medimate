<?php
require 'conn.php';
require 'access.html';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reportPath = $row['Report'];
            $fileName = basename($reportPath);
            echo "<p><strong>File Name:</strong> $fileName - <a href='$reportPath' download>Download</a></p>";
        }
    } else {
        echo "Invalid credentials. Please try again.";
    }
}

$conn->close();
?>