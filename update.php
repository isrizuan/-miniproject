<?php

include 'dbcon.php';

if (!empty($_POST)) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  $stmt = $conn->prepare("UPDATE record SET name=?, email=?, age=?, gender=? WHERE id=?");
  $stmt->bind_param("ssisi", $name, $email, $age, $gender, $id);

  if ($stmt->execute()) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Record</title>
  <style>
body {
  font-family: Verdana, sans-serif;
  background-color: #f8f8f8;
}

form {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 8px 2px rgba(0,0,0,0.2);
  max-width: 500px;
  margin: 50px auto;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="number"],
input[type="radio"] {
  padding: 10px;
  width: 100%;
  border-radius: 5px;
  border: 2px solid #ddd;
  box-sizing: border-box;
  margin-bottom: 20px;
}

input[type="radio"] {
  display: inline-block;
  width: auto;
  margin-right: 10px;
}

button[type="submit"],
button {
  background-color: #5cb85c;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

button[type="submit"]:hover,
button:hover {
  background-color: #4cae4c;
}

button[type="submit"]:active,
button:active {
  background-color: #398439;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 50px;
}

  </style>
</head>
<body>
  <h1>Update Record</h1>
  <form action="" method="POST">
    <label for="id">ID: </label>
    <input type="text" name="id" id="id" required><br><br>
    <label for="name">Name: </label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="age">Age: </label>
    <input type="number" name="age" id="age" required><br><br>
    <label for="gender">Gender: </label>
    <input type="radio" name="gender" id="male" value="Male" required>Male
    <input type="radio" name="gender" id="female" value="Female" required>Female<br><br>
    <button type="submit">Update Record</button><br><br>
    <div><button onclick="window.location.href='formstudent.html';">Back</button></div>
  </form>
</body>
</html>


