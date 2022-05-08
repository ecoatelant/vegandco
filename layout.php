<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/images/favicon.ico">
    <title><?= $pageTitle ?? 'Veg&Co' ?></title>
    <link href="/styles/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require 'includes/inc_header.php' ?> 

    <?= (isset($pageContent)) ? $pageContent : $error = '403'; ?>

    <?php //require 'includes/inc_footer.php' ?> 

    <?= $pageJavaScripts ?? '' ?>
</body>

</html>