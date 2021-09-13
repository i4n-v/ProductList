<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <script src="../js/functions.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Product List</title>
</head>
<?php
require_once 'actions/init.php';
?>
<body>
    <div class="wrapper">
        <header>
            <div class="flex-container" id="header">
                <div id="logo">
                    <a href="index.php"><sup>Product</sup> List</a>
                </div>
                <nav class="flex-container" id="menu">
                    <?php if (isLogged()) : ?>
                        <div class="flex-container" onclick="togleDropdown()">
                            <?= userNameView($_SESSION['user']) ?>
                            <?php require_once 'images/icons/user.svg'; ?>
                        </div>
                        <div id="dropdown">
                            <ul class="flex-container">
                                <a href="views/profile.php">
                                    <li>Perfil</li>
                                </a>
                                <a href="password.php">
                                    <li>Alterar senha</li>
                                </a>
                                <a href="views/dashboard.php">
                                    <li>Seus produtos</li>
                                </a>
                                <a href="../actions/logout.php">
                                    <li>Sair</li>
                                </a>
                            </ul>
                        </div>
                    <?php else : ?>
                        <div><a href="views/signin-page.php">Entrar</a></div>
                        <div><a href="views/signup-page.php">Registrar-se</a></div>
                    <?php endif ?>
                </nav>
            </div>
        </header>
        <main id="main">
            <section class="apresentation flex-container">
                <div class="apresentation-content">
                    <h1>
                        Cadastre e gerencie seus produtos de forma simples e fácil!
                    </h1>

                    <p>Temos como objetivo te auxiliar na gerência dos seus produtos, te deixando livre para criar e inovar!</p>
                </div>

                <div class="ilustration">
                    <?php require_once 'images/create-products.svg' ?>
                </div>
            </section>
            <section class="apresentation flex-container wrap-reverse">
                <div class="ilustration">
                    <?php require_once 'images/visionarie.svg' ?>
                </div>

                <div class="apresentation-content">
                    <h1>Venha criar!</h1>
                    <p>Seja simples em cada produto, e demonstre seu potêncial em novas ideais com sua criatividade.</p>
                </div>
            </section>
            <div id="new-features" class="flex-container">
                <div>
                    <h2>Novidades!</h2>
                    <p>Receba as novas atualizações do sistema e fique por dentro de qualquer novidades</p>
                </div>

                <div class="flex-container register-email">
                    <form action="#">
                        <input type="email" placeholder="Seu e-mail aqui">
                    </form>
                    <button type="submit">Assinar</button>
                </div>
            </div>
        </main>
        <footer class="flex-container">
            <div id="footer">
                <div id="icons" class="flex-container">
                    <div>
                        <a href="https://github.com/i4n-v"><?php require_once './images/icons/github.svg' ?></a>
                    </div>

                    <div>
                        <a href="https://www.linkedin.com/in/i4n-v/"><?php require_once './images/icons/linkedin.svg' ?></a>
                    </div>

                    <div>
                        <a href="https://www.instagram.com/i4n_v/"><?php require_once './images/icons/instagram.svg' ?></a>
                    </div>
                </div>

                <div>
                    <p>Product List &copy Todos os direitos reservados</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>