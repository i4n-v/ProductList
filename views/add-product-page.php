<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/functions.js" defer></script>
    <title>Product List</title>
</head>
<?php
require_once '../actions/init.php';
loggedToAcess();
?>
<body>
    <div class="wrapper">
        <header>
            <div class="flex-container" id="header">
                <div id="logo">
                    <a href="/index.php"><sup>Product</sup> List</a>
                </div>
                <nav class="flex-container" id="menu">
                    <div class="flex-container" onclick="togleDropdown()">
                        <?= userNameView($_SESSION['user']) ?>
                        <?php require_once '../images/icons/user.svg'; ?>
                    </div>
                    <div id="dropdown">
                       <ul class="flex-container">
                            <a href="#"><li>Perfil</li></a>
                            <a href="dashboard.php"><li>Seus produtos</li></a>
                            <a href="../actions/logout.php"><li>Sair</li></a>
                       </ul> 
                    </div>
                </nav>
            </div>
        </header>
        <main id="main">
            <div id="add-product-container">
                <div id="add-product-form">
                    <h1>Adicione um novo produto!</h1>

                    <form action="../actions/add-product.php" method="POST">
                        <div class="flex-container">
                            <label for="desc">Descrição</label>
                            <input type="text" id="desc" name="desc" placeholder="Descrição do produto"  required>
                        </div>
                        
                        <div class="flex-container">
                            <label for="quantity">Quantidade</label>
                            <input type="number" id="quantity" name="quantity" placeholder="Quantidade do produto" required>
                        </div>

                        <div class="flex-container">
                            <label for="value">Preço</label>
                            <input type="number" id="value" name="value" placeholder="Preço do produto" step="0.01" required>
                        </div>

                        <div class="flex-container div-btn">
                            <a href="dashboard.php" class="min-btn btn-cancel">Cancelar</a>
                            <button class="min-btn btn-confirm" type="submit">Adicionar</button>
                        </div>                
                    </form>
                </div>
            </div>
        </main>
        <footer class="flex-container">
            <div id="footer">
                <div id="icons" class="flex-container">
                    <div>
                        <a href="https://github.com/i4n-v"><?php require_once '../images/icons/github.svg' ?></a>
                    </div>

                    <div>
                        <a href="https://www.linkedin.com/in/i4n-v/"><?php require_once '../images/icons/linkedin.svg' ?></a>
                    </div>

                    <div>
                        <a href="https://www.instagram.com/i4n_v/"><?php require_once '../images/icons/instagram.svg' ?></a>
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