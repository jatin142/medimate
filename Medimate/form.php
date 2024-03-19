<?php
require 'conn.php';
require 'patient.html';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = $_POST["fullName"];
    $Number = $_POST["Number"];
    $dob = $_POST["date"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $doctor = $_POST["doctor"];
    $comments = $_POST["comments"];

   
    $uploadedFile = $_FILES["fil"];
    $fileName = $uploadedFile["name"];
    $fileTmpName = $uploadedFile["tmp_name"];
    $fileType = $uploadedFile["type"];
    $fileError = $uploadedFile["error"];
    $fileSize = $uploadedFile["size"];

  
    if (strlen($fileName) > 12) {
        echo "Error: File name should not be greater than 12 characters.";
        exit();
    }

   
    if ($fileError === UPLOAD_ERR_OK) {
        move_uploaded_file($fileTmpName, "uploads/" . $fileName);
    }

   
    $sql = "INSERT INTO info(fullName, Contact_Number, dob, age, gender, doctor, comments, fileName)
            VALUES ('$fullName', '$Number', '$dob', $age, '$gender', '$doctor', '$comments', '$fileName')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
