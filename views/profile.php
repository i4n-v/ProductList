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
require_once '../dataBase/conectDatabase.php';
loggedToAcess();
validateMessage();

try{
    $query = "SELECT `USER_NAME`, `USER_EMAIL` FROM `USERS` WHERE (`USER_ID` = ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e;
    exit();
}
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
                            <a href="profile.php"><li>Perfil</li></a>
                            <a href="password.php"><li>Alterar senha</li></a>
                            <a href="dashboard.php"><li>Seus produtos</li></a>
                            <a href="../actions/logout.php"><li>Sair</li></a>
                       </ul> 
                    </div>
                </nav>
            </div>
        </header>
        <main id="main">
            <div id="profile-container">
                <div id="profile-form" class="flex-container">
                    <h1>Atualize seus dados!</h1>
                    <div>
                        <?php if ($GLOBALS['success'] != null) : ?>
                            <div class="validate success validate-dashboard">
                                <p><?= $GLOBALS['success'] ?></p>
                                <span onclick="closeValidate()">x</span>
                            </div>
                        <?php elseif ($GLOBALS['error'] != null) : ?>
                            <div class="validate error validate-dashboard">
                                <p><?= $GLOBALS['error'] ?></p>
                                <span onclick="closeValidate()">x</span>
                            </div>
                        <?php endif ?>
                    </div>
                    <form action="../actions/update-profile.php" method="POST">
                        <div class="flex-container">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" value="<?= $user['USER_NAME'] ?>" placeholder="Seu nome" required>
                        </div>
                        
                        <div class="flex-container">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?= $user['USER_EMAIL'] ?>" placeholder="Seu e-mail" required>
                        </div>

                        <div>
                            <button class="btn" type="submit">Salvar</button>
                        </div> 
                    </form>
                </div>
            </div>
        </main>
        <footer class="flex-container">
            <div id="footer">
                <div id="icons" class="flex-container">
                    <div>
                        <a href="https://github.com/i4n-v" target="_blank"><?php require_once '../images/icons/github.svg' ?></a>
                    </div>

                    <div>
                        <a href="https://www.linkedin.com/in/i4n-v/" target="_blank"><?php require_once '../images/icons/linkedin.svg' ?></a>
                    </div>

                    <div>
                        <a href="https://www.instagram.com/i4n_v/" target="_blank"><?php require_once '../images/icons/instagram.svg' ?></a>
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