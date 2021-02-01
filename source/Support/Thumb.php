<?php

namespace Source\Support;

use CoffeeCode\Cropper\Cropper;

/**
 * Class Thumb
 * @package Source\Support
 */
class Thumb
{
    /** @var Cropper */
    private $cropper;
    /** @var string */
    private $uploads;

    /**
     * Thumb constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->cropper = new Cropper(CONF_IMAGES_CACHE, CONF_IMAGES_QUALITY['jpg'], CONF_IMAGES_QUALITY['png']);
        $this->uploads = CONF_UPLOAD_DIR;
    }

    /**
     * @param string $image
     * @param int $width
     * @param null $height
     * @return string|null
     */
    public function make(string $image, int $width, $height = null): ?string {
        return $this->cropper->make($this->uploads . "/" . $image, $width, $height);
    }

    /**
     * @param string|null $image
     */
    public function flush(string $image = null): void {
        if($image) {
            $this->cropper->flush($this->uploads . "/" . $image);
            return;
        }

        $this->cropper->flush();
        return;
    }

    /**
     * @return Cropper
     */
    public function cropper(): Cropper {
        return $this->cropper;
    }
}