<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.07 - Uma fachada para arquivos");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ image ] Fachada para envio de imagens (jpg, png, gif)
 */
fullStackPHPClassSession("image", __LINE__);

$upload = new \Source\Support\Upload();
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


if($post && $post["send"] == "image") {
    echo "teste";
    var_dump($post, $_FILES ?? "");
    $u = $upload->image($_FILES['file'], $post['name'], 500);
    if($u) {
        echo "<img src='{$u}' style='width: 100%'>";
    }else{
        echo $upload->message();
    }

}

$formSend = "image";
require __DIR__ . "/form.php";



/*
 * [ file ] Fachada para envio de arquivos (pdf, docx, zip, etc)
 */
fullStackPHPClassSession("file", __LINE__);


if($post && $_POST["send"] == 'file') {
    var_dump($post, $_FILES ?? "");
    $u = $upload->file($_FILES['file'], $post['name']);
    if(!empty($u)){
        echo "<a target='_blank' href='{$u}'>Ver arquivo!</a>";
    }else{
        echo $upload->message();
    }
}



$formSend = "file";
require __DIR__ . "/form.php";


/*
 * [ media ] Fachada para envio de midias (audio/video)
 */
fullStackPHPClassSession("media", __LINE__);


if($post && $_POST["send"] == 'media') {
    var_dump($post, $_FILES ?? "");
    $u = $upload->media($_FILES['file'], $post['name']);
    if(!empty($u)){
        echo "<p class='trigger info'><a target='_blank' href='{$u}'>Ver arquivo!</a></p>";
    }else{
        echo $upload->message();
    }
}

$formSend = "media";
require __DIR__ . "/form.php";





/*
 * [ remove ] Um método adicional
 */
fullStackPHPClassSession("remove", __LINE__);

$upload->remove(__DIR__ . "/../storage/uploads/images/2021/01/nome-do-arquivo-1611770437.jpg");