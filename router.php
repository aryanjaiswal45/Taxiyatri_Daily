<?php
if (php_sapi_name() === 'cli-server') {

    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (is_file($file)) {
        return false;
    }
}
define('TAXIYATRI', true);

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($url === '') {
    header('Location: https://www.taxiyatri.com');
    exit;
}
//  EXISTING PAGE
$legacyRedirects = [

    // Existing Taxi Service Pages
    'taxi-service-in-kanpur'    => '/taxi-service-in-kanpur',
    'taxi-service-in-agra'      => '/taxi-service-in-agra',
    'taxi-service-in-mirzapur'  => '/taxi-service-in-mirzapur',
    'taxi-service-in-jaunpur'   => '/taxi-service-in-jaunpur',
    'taxi-service-in-mau'       => '/taxi-service-in-mau',
    'taxi-service-in-azamgarh'  => '/taxi-service-in-azamgarh',
    'taxi-service-in-chitrakoot'   => '/taxi-service-in-chitrakoot',
    'taxi-service-in-bangalore'   => '/taxi-service-in-bangalore',

    

    // Existing Pillar Pages
    'taxi-service-in-noida'      => '/noida',
    'taxi-service-in-lucknow'    => '/lucknow',
    'taxi-service-in-ghaziabad'  => '/ghaziabad',
    'taxi-service-in-varanasi'   => '/varanasi',
    'taxi-service-in-allahabad'  => '/allahabad',
    'taxi-service-in-ayodhya'    => '/cab-services-in-ayodhya',

];

if (isset($legacyRedirects[$url])) {

    header("Location: https://www.taxiyatri.com{$legacyRedirects[$url]}", true, 301);
    exit;

}

$routes = [
  

    [
    'pattern' => '#^taxi-service-in-([a-z0-9-]+)-bangalore$#i',
    'template' => __DIR__ . '/templates/location.php',
    'params' => ['locationSlug']
    ],
    [
        'pattern' => '#^taxi-fare-in-([a-z0-9-]+)-bangalore$#i',
        'template' => __DIR__ . '/templates/location_fare.php',
        'params' => ['locationSlug']
    ],
      [
    'pattern' => '#^dzire-taxi-in-([a-z0-9-]+)-bangalore$#i',
    'template' => __DIR__ . '/templates/dzire.php',
    'params' => ['locationSlug'] 
],

   
 [
        'pattern' => '#^taxi-service-in-([a-z0-9-]+)$#i',
        'template' => __DIR__ . '/templates/city.php',
        'params' => ['citySlug']
    ],
    // [
    //     'pattern' => '#^taxi-near-me-in-([a-z0-9-]+)-([a-z0-9-]+)$#i',
    //     'template' => __DIR__ . '/templates/location.php',
    //     'params' => ['locationSlug', 'citySlug']
    // ],
    [
    'pattern' => '#^([a-z0-9-]+)-to-([a-z0-9-]+)-dzire-cab$#i',
    'template' => __DIR__ . '/templates/dzire.php',
    'params' => ['fromSlug', 'toSlug'] // 
],

[
    'pattern' => '#^([a-z0-9-]+)-to-([a-z0-9-]+)-taxi$#i',
    'template' => __DIR__ . '/templates/route.php',
    'params' => ['fromSlug', 'toSlug'] // 
],

    // [
    //     'pattern' => '#^tempo-traveller-in-([a-z0-9-]+)$#i',
    //     'template' => __DIR__ . '/templates/tempo.php',
    //     'params' => ['citySlug']
    // ],

    // [
    //     'pattern' => '#^airport-taxi-in-([a-z0-9-]+)$#i',
    //     'template' => __DIR__ . '/templates/airport.php',
    //     'params' => ['citySlug']
    // ],

    // [
    //     'pattern' => '#^railway-station-taxi-in-([a-z0-9-]+)$#i',
    //     'template' => __DIR__ . '/templates/railway.php',
    //     'params' => ['citySlug']
    // ]

];


foreach ($routes as $route) {

    if (preg_match($route['pattern'], $url, $matches)) {

        array_shift($matches);

        foreach ($route['params'] as $index => $name) {
            $$name = $matches[$index] ?? null;
        }

        require $route['template'];
        exit;
    }
}

header("Location: https://www.taxiyatri.com/", true, 301);
exit;