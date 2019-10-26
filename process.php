<?php
    # Connect to the server and select database
    $connect = mysqli_connect("localhost", "root", "");
    mysqli_select_db($connect, "login");

    # Get values
    $username = $_POST['username'];
    $password = $_POST['password'];

    # Prevent mysql injection
    $username = stripcslashes($username);
    $username = mysqli_real_escape_string($connect, $username);
    $password = stripcslashes($password);
    $password = mysqli_real_escape_string($connect, $password);

    # Query the database
    // Ideal é ser tratado com try/catch e não die()
    $result = mysqli_query($connect, 
        "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password';")
        or die("Falha ao consultar o bando de dados" . mysqli_error($connect));
    $row = mysqli_fetch_array($result);

    # Result
    if ($row['username'] == $username && $row['password'] == $password) {
        echo 'Login success!!! Welcome ' . $row['username'];
    } else {
        echo 'Failed to login!';
    }

?>