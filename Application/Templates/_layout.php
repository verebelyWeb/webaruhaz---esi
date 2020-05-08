<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?=APPPATH?>Style/style.css">
</head>
<body>
    <?php require_once APPPATH."Templates/header.php" ?>
    <?php require_once APPPATH."Templates/{$view}View.php" ?>
</body>
</html>