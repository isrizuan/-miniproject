<!DOCTYPE html>
<html>
<head>
  <title>Record List</title>
  <style>
table {
  border-collapse: separate;
  border-spacing: 0;
  width: 100%;
  max-width: 600px;
  margin: 20px auto;
  font-size: 16px;
  line-height: 1.4;
  color: #333;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

th {
  text-align: left;
  background-color: #f5f7fa;
  border-bottom: 1px solid #dfe3e8;
  padding: 10px;
  font-weight: 600;
  font-size: 0.85rem;
  text-transform: uppercase;
}

td {
  border-bottom: 1px solid #dfe3e8;
  padding: 10px;
}

tr:last-child td {
  border-bottom: none;
}

tr:hover {
  background-color: #f5f7fa;
}

.button {
  display: inline-block;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  color: #fff;
  background-color: #6c5ce7;
  padding: 12px 30px;
  border-radius: 30px;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  border: none;
  outline: none;
}

.button:hover {
  background-color: #5243AA;
}

  </style>
</head>
<body>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Gender</th>
    </tr>
    <?php
      include 'dbcon.php';

      $sql = "SELECT id, name, email, age, gender FROM student";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["age"] . "</td>";
              echo "<td>" . $row["gender"] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No records found</td></tr>";
      }

      mysqli_close($conn);
    ?>
  </table>
  <button class="button" onclick="window.location.href='formstudent.html';">Back</button>
</body>
</html>
