<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
        require __DIR__ . "/../vendor/autoload.php";

        $seo = new \Source\Support\Seo();
        $url = filter_var("https://upinside.com", FILTER_VALIDATE_URL) ? "https://upinside.com" : "";

        echo $seo->render(
            "Formacao PHP",
            "Formacao de desenvolvimento web em php",
            $url,
            "https://www.upinside.com.br/fsphp/images/cover.jpg"
        );
    ?>

</head>
<body>

    <h1><?= $seo->title; ?></h1>
    <p><?= $seo->description; ?></p>

    <pre> <?= print_r($seo->data("Novo titulo", "Qualquer uma"), true)?> <pre/>

</body>
</html>
