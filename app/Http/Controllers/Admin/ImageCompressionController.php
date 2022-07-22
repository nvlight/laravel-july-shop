<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageCompressionController extends Controller
{
    /**
     * Получить разрешение картинки
     * @param $image
     * @return array
     */
    public static function getImageSize($image)
    {
        //dd($image);
        // check if src image file exists
        if (!file_exists($image)) {
            return [
                'success' => false,
                'message' => 'file is not exists!',
            ];
        }

        list($width, $height) = getimagesize($image);
        return [
            'success' => true,
            'message' => 'Размеры картинки получены',
            'width'  => $width,
            'height' => $height,
        ];
    }

    /**
     * Преобразование картинки в формат webP
     * @param $srcImg
     * @param $distImg
     * @param $newWidth
     * @param $newHeight
     * @param $compression_quality
     * @return array|false|string
     */
    public static function convertToWebp($srcImg, $distImg, $newWidth, $newHeight, $compression_quality = 80)
    {
        $file_type = exif_imagetype($srcImg);
        if (function_exists('imagewebp')) {
            switch ($file_type) {
                case '1': //IMAGETYPE_GIF
                    $image = imagecreatefromgif($srcImg);
                    break;
                case '2': //IMAGETYPE_JPEG
                    $image = imagecreatefromjpeg($srcImg);
                    break;
                case '3': //IMAGETYPE_PNG
                    $image = imagecreatefrompng($srcImg);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
                default:
                    return [
                        'success' => false,
                        'message' => 'image extension is undefined!',
                    ];
            }

            // prepare new img for resize
            $newImage = imagecreatetruecolor($newWidth, $newHeight);
            $color = imagecolorallocatealpha($newImage, 0, 0, 0, 127); //fill transparent back
            imagefill($newImage, 0, 0, $color);
            imagesavealpha($newImage, true);

            $imgSize = self::getImageSize($srcImg);
            if (!$imgSize['success']){
                return [
                    'success' => true,
                    'message' => $imgSize['message'],
                ];
            }
            // resize
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight,
                $imgSize['width'], $imgSize['height']);
            //dd($newImage);

            // Save the image
            $result = imagewebp(
                $newImage,
                $distImg,
                $compression_quality
            );
            if (false === $result) {
                return false;
            }
            // Free up memory
            imagedestroy($image);
            return [
                'success' => true,
                'message' => 'image success converted!',
                'image'   => $distImg,
            ];
        } elseif (class_exists('Imagick')) {
            $image = new Imagick();
            $image->readImage($srcImg);
            if ($file_type === "3") {
                $image->setImageFormat('webp');
                $image->setImageCompressionQuality($compression_quality);
                $image->setOption('webp:lossless', 'true');
            }
            $image->writeImage($distImg);
            return $distImg;
        }

        return [
            'success' => false,
            'message' => 'Something goes wrong',
        ];
    }
}
