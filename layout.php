<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/images/favicon.ico">
    <title><?= $pageTitle ?? 'Veg&Co' ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="media/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="media/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="media/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="media/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="media/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="media/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="media/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="media/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="media/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="media/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="media/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="media/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="media/favicon/favicon-16x16.png">
    <link rel="manifest" href="media/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="media/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font Montserrat -->
    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Normalize.css -->
    <link rel="stylesheet" href="<?= PATHBASE ?>/styles/normalize.css">
    <!-- lien css -->
    <link rel="stylesheet" href="<?= PATHBASE ?>/styles/style.min.css">
    <!-- lien Splide -->
    <link rel="stylesheet" href="<?= PATHBASE ?>/styles/splide.min.css">

    <link rel="stylesheet" href="<?= PATHBASE ?>/styles/recettes.css">
    <link rel="stylesheet" href="<?= PATHBASE ?>/styles/espace-utilisateur.css">

</head>

<body>

    <?php require 'includes/header.php' ?>

    <?= (isset($pageContent)) ? $pageContent : $error = '403'; ?>

    <?php require 'includes/footer.php' ?>

    <?php require 'includes/javascript.php' ?>
    
</body>

</html>