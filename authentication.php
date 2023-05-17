<!DOCTYPE html>
<html>
<head>
    <title>Login Result</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        button {
            background-color: #3e8e41;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            display: block;
            font-size: 16px;
            margin: 20px auto;
            padding: 10px;
            width: 200px;
        }
        button:hover {
            background-color: #cc2d21;
        }
    </style>
</head>
<body>
    <?php      
        include('connection.php');  
        $username = $_POST['user'];  
        $password = $_POST['pass'];  
            
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
          
        $sql = "SELECT * FROM userpass WHERE username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<button type='button' onclick=\"window.location.href='formstudent.html';\">main page</button><br>"; 
        }  
        else{  
            echo "<h1>Login failed. Invalid username or password.</h1>";  
        }     
    ?>  
</body>
</html>
