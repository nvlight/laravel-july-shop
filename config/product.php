<?php

return [
    'gallery' => [
        'max_upload_image_count' => 5,
        'max_image_upload_size'  => 5120,
        'paths' => [
            'products_path' => 'product_images',
            'products_show_path' => 'storage/product_images',
            'orig_path'     => 'orig/',
            'big' => 'big/',
            'c516x688' => 'c516x688/',
            'c246x328' => 'c246x328/',
        ],
        'convert_presets' => [
            'big/'      => ['width' => 900, 'height' => 1200],
            'c516x688/' => ['width' => 516, 'height' => 688],
            'c246x328/' => ['width' => 246, 'height' => 328],
        ]
    ],
];
