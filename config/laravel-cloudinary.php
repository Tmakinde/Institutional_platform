<?php

return [

    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),

    'api_url' => 'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME'),

    'base_url' => env('CLOUDINARY_BASE_URL', 'http://res.cloudinary.com/' . env('CLOUDINARY_CLOUD_NAME')),
    'secure_url' => env('CLOUDINARY_SECURE_URL', 'https://res.cloudinary.com/' . env('CLOUDINARY_CLOUD_NAME')),

    'key' => env('CLOUDINARY_API_KEY'),
    'secret' => env('CLOUDINARY_API_SECRET'),

];
