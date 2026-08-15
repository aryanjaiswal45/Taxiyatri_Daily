<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

echo "<h1>Location Debug Test</h1>";
echo "<hr>";

/*--------------------------------------------------
| STEP 1 : Router Variables
--------------------------------------------------*/

echo "<h2>STEP 1 - Router</h2>";

echo "<strong>REQUEST_URI:</strong><br>";
echo $_SERVER['REQUEST_URI'] . "<br><br>";

echo "<strong>locationSlug:</strong><br>";
var_dump($locationSlug);

echo "<hr>";

/*--------------------------------------------------
| STEP 2 : Parent City
--------------------------------------------------*/

echo "<h2>STEP 2 - Parent City</h2>";

$parentCity = getCityBySlug('lucknow');

echo "<strong>Parent City:</strong><br>";
var_dump($parentCity);

if (!$parentCity) {
    die("<h2 style='color:red'>❌ Parent city not found.</h2>");
}

echo "<hr>";

/*--------------------------------------------------
| STEP 3 : Area Lookup
--------------------------------------------------*/

echo "<h2>STEP 3 - Area Lookup</h2>";

$location = getAreaBySlug($parentCity['id'], $locationSlug);

echo "<strong>Location:</strong><br>";
var_dump($location);

if (!$location) {
    die("<h2 style='color:red'>❌ Area not found.</h2>");
}

echo "<hr>";

/*--------------------------------------------------
| STEP 4 : Other Queries
--------------------------------------------------*/

echo "<h2>STEP 4 - Other Data</h2>";

$pricing     = getPricing();
$travelTips  = getTravelTips($parentCity['id']);
$areas        = getAreas($parentCity['id']);
$routes       = getRoutesFromCity($parentCity['id']);
$cityFacts    = getCityFacts($parentCity['id']);

echo "Pricing: " . count($pricing) . "<br>";
echo "Travel Tips: " . count($travelTips) . "<br>";
echo "Areas: " . count($areas) . "<br>";
echo "Routes: " . count($routes) . "<br>";

echo "<br>";

echo "<strong>City Facts:</strong><br>";
var_dump($cityFacts);

echo "<hr>";

echo "<h2 style='color:green'>✅ Everything Loaded Successfully</h2>";