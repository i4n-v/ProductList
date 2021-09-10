<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Product List</title>
</head>
<body>
    <main id="register-login" class="flex-container">
        <div class="register-login-layout flex-container">
            <div class="image-layout">
                <?php require_once '../images/login.svg' ?>
            </div>
            <div class="flex-container">
                <h1>Seja bem vindo!</h1>

                <form action="#" method="post" class="flex-container login-register-form">
                    <div class="flex-container">
                        <label for="login">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                    </div>

                    <div class="flex-container">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="passwd" placeholder="Sua senha" required>
                    </div>

                    <div>
                        <button class="btn" type="submit">Entrar</button>
                    </div>
                </form>
                <div class="links-redirect flex-container">
                    <p>Ainda não está na nossas plataformas? <a href="register-page.php">Cadastre-se</a>!</p>
                    <div>
                        <a href="../index.php">Voltar para home</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>