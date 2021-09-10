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
                <?php require_once '../images/organize.svg' ?>
            </div>

            <div class="flex-container">
                <h1>Cadastre-se e aproveite!</h1>

                <form action="#" method="post" class="flex-container login-register-form">
                    <div class="flex-container">
                        <label for="name">Nome</label>
                        <input type="name" id="name" name="name" placeholder="Digite seu nome" required>
                    </div>

                    <div class="flex-container">
                        <label for="login">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="flex-container">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="passwd" placeholder="Digite sua senha" required>
                    </div>

                    <div class="flex-container">
                        <label for="confirm">Confirmar senha</label>
                        <input type="password" id="confirm" name="confirm-passwd" placeholder="Confirme sua senha" required>
                    </div>

                    <div>
                        <button class="btn" type="submit">Cadastrar-se</button>
                    </div>
                </form>
                <div class="links-redirect flex-container">
                    <p>Já possui uma conta? Basta <a href="login-page.php">entrar</a>!</p>
                    <div>
                        <a href="../index.php">Voltar para home</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>