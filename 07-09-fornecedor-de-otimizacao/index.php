<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.09 - Fornecedor de otimização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ optimizer ] https://packagist.org/packages/coffeecode/optimizer
 */
fullStackPHPClassSession("optimizer", __LINE__);

$seo = new \Source\Support\Seo();
$url = filter_var("https://upinside.com", FILTER_VALIDATE_URL) ? "https://upinside.com" : "";

$seo->render(
  "Formacao PHP",
  "Formacao de desenvolvimento web em php",
    $url,
    "https://www.upinside.com.br/fsphp/images/cover.jpg"
);

var_dump($seo->optimizer()->debug());