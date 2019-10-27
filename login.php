<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Entrar</title>
</head>
<body>
    
    <div class="header">
        <h2>Entrar</h2>
    </div>

    <form action="login.php" method="post">
        <!-- Mostra os error aqui -->
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label for="username">Usuário</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">Entrar</button>
        </div>
        <p>
            Não tem cadastro? <a href="register.php">Cadastrar</a>
        </p>
    </form>

</body>
</html>