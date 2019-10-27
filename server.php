<?php
    session_start();

    $username = '';
    $email = '';
    $errors = [];

    # Conexão com o bando de dados
    $db = mysqli_connect('localhost', 'root', '', 'registration');

    # Se o botão de cadastrar for clicado
    if (isset($_POST['register'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        // Verifica se os campos foram preenchidos corretamente
        if (empty($username)) {
            $errors[] = 'Campo Usuário não foi preenchido';
        }
        if (empty($email)) {
            $errors[] = 'Campo E-mail não foi preenchido';
        }
        if (empty($password_1)) {
            $errors[] = 'Campo Senha não foi preenchido';
        }

        if ($password_1 != $password_2) {
            $errors[] = 'As duas senhas não são iguais';
        }

        # Se não existir erros, salve o usuário no banco de dados
        if (count($errors) == 0) {
            $password = md5($password_1); // Encriptar senha por seguraça
            $sql = "INSERT INTO users (username, email, password) 
                    VALUES ('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Agora você está logado.";
            header('location: index.php'); // Redireciona para a home
        }
    }

    // Login do usuário a partir da página de login
    if (isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // Verifica se os campos foram preenchidos corretamente
        if (empty($username)) {
            $errors[] = 'Campo Usuário não foi preenchido';
        }
        if (empty($password)) {
            $errors[] = 'Campo Senha não foi preenchido';
        }

        if (count($errors) == 0){
            $password = md5($password); // Encripitar senha antes de comparar com o banco
            $query = "SELECT * FROM users WHERE 
                    username = '$username' AND password = '$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Agora você está logado.";
                header('location: index.php'); // Redireciona para a home
            }else {
                $errors[] = 'O usuário ou senha estão incorretos';
            }
        }
    }

    // Logout
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>