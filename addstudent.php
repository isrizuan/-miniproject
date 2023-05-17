<?php
include 'dbcon.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
  exit();
}

if (!ctype_digit($age)) {
  echo "Age must be a number";
  exit();
}

$sql = "INSERT INTO student (name, email, age, gender) VALUES ('$name', '$email', '$age', '$gender')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?><br><br>

 <button class="button" onclick="window.location.href='formstudent.html';">Back</button>
