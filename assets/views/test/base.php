<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title><?= $title; ?></title>

    <style>
        .paginator {
            display: block;
            text-align: center;
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .paginator_item {
            display: inline-block;
            margin: 0 10px;
            padding: 4px 12px;
            background: #A287E7;
            color: #fff;
            text-decoration: none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .paginator_item:hover {
            background: #8A6ED5;
        }

        .paginator_active,
        .paginator_active:hover {
            background: #cccccc;
        }
    </style>

</head>
<body>

<header>
    <h3 class="trigger accept"><?= $title; ?></h3>
</header>


<?php if ($v->section("nav")): ?>
    <nav class="trigger info"><?= $v->section("nav"); ?></nav>
<?php else: ?>
    <p class="trigger info">Lista de usuários</p>
<?php endif; ?>

<?= $v->section("content"); ?>

<?php var_dump($v->section("content")); ?>

</body>
</html>