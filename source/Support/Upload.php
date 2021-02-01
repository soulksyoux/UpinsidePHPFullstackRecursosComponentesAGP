<?php

namespace Source\Support;

use Source\Core\Message;

/**
 * Class Upload
 * @package Source\Support
 */
class Upload
{

    /**
     * @var Message
     */
    private $message;

    /**
     * Upload constructor.
     */
    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * @return Message
     */
    public function message(): Message {
        return $this->message;
    }

    /**
     * @param array $image
     * @param string $name
     * @param int $width
     * @return string|null
     * @throws \Exception
     */
    public function image(array $image, string $name, int $width = CONF_IMAGES_SIZE): ?string
    {
        $upload = new \CoffeeCode\Uploader\Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);

        if(empty($image['type']) || !in_array($image['type'], $upload::isAllowed())) {
            $this->message->error("Imagem inválido");
            return null;
        }

        return $upload->upload($image, $name, $width, CONF_IMAGES_QUALITY);
    }

    /**
     * @param array $file
     * @param string $name
     * @return string|null
     * @throws \Exception
     */
    public function file(array $file, string $name): ?string
    {
        $upload = new \CoffeeCode\Uploader\File(CONF_UPLOAD_DIR, CONF_UPLOAD_FILE_DIR);

        var_dump($file, $upload::isAllowed());

        if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())) {
            $this->message->error("Ficheiro inválido");
            return null;
        }

        return $upload->upload($file, $name);
        
    }

    /**
     * @param array $media
     * @param string $name
     * @return string|null
     * @throws \Exception
     */
    public function media(array $media, string $name): ?string
    {
        $upload = new \CoffeeCode\Uploader\Media(CONF_UPLOAD_DIR, CONF_UPLOAD_MEDIA_DIR);

        var_dump($media, $upload::isAllowed());

        if(empty($media['type']) || !in_array($media['type'], $upload::isAllowed())) {
            $this->message->error("Ficheiro de média inválido");
            return null;
        }

        return $upload->upload($media, $name);
    }

    /**
     * @param string $fileLink
     */
    public function remove(string $fileLink): void
    {
        if(file_exists($fileLink) && is_file($fileLink)) {
            unlink($fileLink);
        }
    }

}