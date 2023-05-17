<?php
include 'dbcon.php';

$id = $_GET['id'];
$sql = "DELETE FROM student WHERE id = $id";

if (mysqli_query($conn, $sql)) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <div style="background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2); width: 400px;">
    <p style="font-weight: bold; font-size: 1.2rem;">Record deleted successfully</p>
    <div style="display: flex; justify-content: center;">
      <button style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1rem;" onclick="window.location.href='formstudent.html';">Back</button>
    </div>
  </div>
</div>

