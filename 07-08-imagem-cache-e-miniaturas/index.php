<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);

$t = new \Source\Support\Thumb();
var_dump($t);

/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);

echo "<img src='{$t->make(CONF_UPLOAD_IMAGE_DIR . "/2021/01/1.JPG", 400)}' alt='' title=''/>";
echo "<img src='{$t->make(CONF_UPLOAD_IMAGE_DIR . "/2021/01/1.JPG", 180, 180)}' alt='' title=''/>";

var_dump($t->make("image", 400));

echo "<img src='{$t->make(CONF_UPLOAD_IMAGE_DIR . "/2021/01/1.PNG", 400)}' alt='' title=''/>";
echo "<img src='{$t->make(CONF_UPLOAD_IMAGE_DIR . "/2021/01/1.PNG", 180, 180)}' alt='' title=''/>";

//$t->flush(CONF_UPLOAD_IMAGE_DIR . "/2021/01/1.JPG");
//$t->flush();