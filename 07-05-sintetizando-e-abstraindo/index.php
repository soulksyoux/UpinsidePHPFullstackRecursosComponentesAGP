<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$emailInit = new \Source\Core\Email();
$email = $emailInit->bootstrap(
    "Teste de envio 1",
    "<p>Testando o envio de uma mensagem do obj Mail</p>",
    "",
    ""
);

$email->attach(__DIR__ . "/img/111.jpg", "Logo1.jpg");
$email->attach(__DIR__ . "/img/222.png", "Logo2.png");

if($email->send()) {
    echo message()->success("Envio de email com sucesso!");
}else{
    echo message()->error("Falha no envio de email:");
    var_dump($email);
}