<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/images/favicon.ico">
    <title><?= $pageTitle ?? 'Veg&Co' ?></title>
</head>

<body>
    <?php require 'includes/head.php'; ?>
    <?php /*require 'includes/header.php'*/ ?>

    <?= (isset($pageContent)) ? $pageContent : $error = '403'; ?>

    <?php //require 'includes/inc_footer.php' ?> 

    <?= $pageJavaScripts ?? '' ?>
</body>

</html>