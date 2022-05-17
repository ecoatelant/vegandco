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


    <!-- Google Font Montserrat -->
    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Normalize.css -->
    <link rel="stylesheet" href="<?=PATHBASE?>/styles/normalize.css">
    <!-- lien css -->
    <link rel="stylesheet" href="<?=PATHBASE?>/styles/style.min.css">
    <!-- lien Splide -->
    <link rel="stylesheet" href="<?=PATHBASE?>/styles/splide.min.css">

    <link rel="stylesheet" href="<?=PATHBASE?>/styles/recettes.css">
    <link rel="stylesheet" href="<?=PATHBASE?>/styles/espace-utilisateur.css">
    
</head>

<body>
    
    <?php require 'includes/header.php' ?>

    <?= (isset($pageContent)) ? $pageContent : $error = '403'; ?>

    <?php require 'includes/footer.php' ?> 

    <!-- j'ai mis ca en attendant -Aline -->
    <?php require 'includes/javascript.php' ?> 

    <?= $pageJavaScripts ?? '' ?> 
</body>

</html>