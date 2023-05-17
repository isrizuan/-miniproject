<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Record</title>
    <style>
{
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
}

body {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  line-height: 1.6;
  color: #333;
  background-color: #f7f7f7;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

h1 {
  font-size: 36px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

form {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

label {
  font-size: 18px;
  margin-right: 10px;
  color: #333;
}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin-bottom: 10px;
  border: none;
  border-radius: 4px;
  background-color: #f7f7f7;
}

button[type=submit] {
  background-color: #333;
  color: #fff;
  padding: 14px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type=submit]:hover {
  background-color: #666;
}

button {
  background-color: #fff;
  color: #333;
  padding: 14px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-right: 10px;
}

button:hover {
  background-color: #f7f7f7;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  font-weight: 700;
  background-color: #333;
  color: #fff;
  text-transform: uppercase;
}

td {
  background-color: #fff;
}

tr:hover td {
  background-color: #f7f7f7;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Search Record</h1>
        <form method="post">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Enter name, email, or age...">
            <button type="submit" name="submit">Search</button>
        </form>
        <div><button onclick="window.location.href='formstudent.html';">Back</button></div>
       <?php
include 'dbcon.php';

if(isset($_POST['submit'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM student WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR age LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Gender</th></tr></thead><tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["age"] . "</td><td>" . $row["gender"] . "</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No results found.";
    }
}

mysqli_close($conn);
?>

