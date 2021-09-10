<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Product List</title>
</head>
<body>
    <div class="wrapper">
        <?php require_once 'views/components/navbar.php' ?>
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
            <section class="apresentation flex-container">
                <div class="ilustration">
                    <?php require_once 'images/visionarie.svg' ?>
                </div>
                <div class="apresentation-content">
                    <h1>Venha criar!</h1>
                    <p>Seja simples em cada produto, e demonstre seu potêncial em novas ideais com sua criatividade.</p>
                </div>
            </section>
            <div id="new-features" class="flex-container">
                <p>Receba as novas atualizações do sistema e fique por dentro de qualquer novidades!</p>
                <div class="flex-container">
                    <form action="#">
                        <input type="email" placeholder="Seu e-mail aqui">
                    </form>
                    <button type="submit">Assinar</button>
                </div>
            </div>
        </main>
        <?php require_once 'views/components/footer.php' ?>
    </div>
</body>
</html>