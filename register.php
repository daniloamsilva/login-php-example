<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    
    <div class="header">
        <h2>Cadastro</h2>
    </div>

    <form action="register.php" method="post">
        <!-- Mostra os error aqui -->
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label for="username">Usuário</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label for="password_1">Senha</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirmar senha</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn">Cadastrar</button>
        </div>
        <p>
            Já tem um cadastro? <a href="login.php">Entrar</a>
        </p>
    </form>

</body>
</html>