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
                            <a href="../actions/logout.php">
                                <li>Sair</li>
                            </a>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main id="main">
            <div id="all-content">
                <div class="description-page flex-container">
                    <h1>Aqui estão seus produtos:</h1>
                    <a href="add-product-page.php" class="min-btn btn-confirm">Adicionar</a>
                </div>
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
                <div class="products-container">
                    <?php
                    $query = "SELECT * FROM `PRODUCTS` WHERE (`PROD_USER_ID` = ?)";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$_SESSION['id']]);
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <table class="products-table">
                        <thead>
                            <th>Descrição do produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th class="actions-th">Ações</th>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= $product['PROD_DESC'] ?></td>
                                    <td><?= $product['PROD_QUANTITY'] ?></td>
                                    <td><?= moneyFormat($product['PROD_VALUE'], 2) ?></td>
                                    <td class="flex-container table-actions">
                                        <div>
                                            <a href="update-product-page.php?product=<?= $product['PROD_ID'] ?>" class="btn-edit"><?php require '../images/icons/edit.svg'; ?></a>
                                        </div>
                                        <div>
                                            <a class="btn-delete" onclick="togleModalDelete(<?= $product['PROD_ID'] ?>)"><?php require '../images/icons/trash.svg'; ?></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <div class="modal-delete flex-container">
                                <div class="flex-container">
                                    <div class="flex-container">
                                        <p>Você tem certeza que deseja excluir esse produto?</p>
                                    </div>
                                    <div class="flex-container div-btn">
                                        <a class="min-btn btn-cancel" onclick="togleModalDelete()">Não</a>
                                        <a href="#" class="min-btn btn-confirm" id="url">Sim</a>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
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