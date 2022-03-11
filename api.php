<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

/*$woocommerce = new Client(
    'https://littlebrandbox.com', 
    'ck_f721032cf7e11c9ad5dd451c2fd8553a1db7c814', 
    'cs_fb0a1f59f7de2c994d3dbc457e225f522e085bb2',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true //Force Basic Authentication as query string true and using under HTTPS
    ]
);


/*$woocommerce = new Client(
    'https://minoxidil.co.za', 
    'ck_1c8138a25d4223fdfca82508c143c0bb82cd8d04', 
    'cs_1465c06d4964d44033ebe797b1ada212a9128668',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true //Force Basic Authentication as query string true and using under HTTPS
    ]
);


*/
$woocommerce = new Client(
    'https://nordikbeauty.com', 
    'ck_baa9b968cb6a88c8638d228bdbb751fef1146409', 
    'cs_eabcf391463a9e00bbe190b87169781d2119b48c',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'timeout' => 600
       
    ]
);


/*
$woocommerce = new Client(
    'https://nordikbeauty.com', 
    'ck_baa9b968cb6a88c8638d228bdbb751fef1146409', 
    'cs_eabcf391463a9e00bbe190b87169781d2119b48c',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
    ]
);



$woocommerce = new Client(
    'https://biovea.co.za', 
    'ck_d6872f24294ea4d12abc750ad01e45fded8fdf6d', 
    'cs_22abb94fcb98b587a90aaeb7e5ccd88e4d443ba0',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
    ]
);


$woocommerce = new Client(
    'https://za.cuvvahairfibers.com', 
    'ck_88c90f5b4a4a28e550792684ced6e60525cf1e9c', 
    'cs_a5f76c9557450f3174ff6d04260db50ec4945c01',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
    ]
);

$woocommerce = new Client(
    'https://za.crownhairfibers.com', 
    'ck_79586de1a6528990c44b4f0977b935ce251e72fe', 
    'cs_3fee3297dc1477ac53abf4830d32f2b9caa4b10b',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
    ]
);
*/


$list = $woocommerce->get('orders');

echo '<pre>';
print_r($list);
echo'<p/re>';


/*$data = [
    'status' => 'shipped'
];

$response = $woocommerce->put('orders/5884', $data);

echo '<pre>';
print_r($response);
echo'<p/re>';
*/
?>