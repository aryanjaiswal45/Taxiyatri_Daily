<?php

require_once 'includes/db.php';
require_once 'includes/functions.php';

$parentCity = getCityBySlug('bangalore');

if (!$parentCity) {
    redirectHome();
}


$location = getAreaBySlug($parentCity['id'], $locationSlug);

if (!$location) {
    redirectHome();
}

/*
|--------------------------------------------------------------------------
| Fetch Dynamic Data
|--------------------------------------------------------------------------
*/
$pricing = getPricing();
$travelTips = getTravelTips($parentCity['id']);

$areas = getAreas($parentCity['id']);
$routes = getRoutesFromCity($parentCity['id']);

$faqs = getFaqs($parentCity);
$cityFacts = getCityFacts($parentCity['id']);
require_once __DIR__ . '/../includes/location_faq.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="canonical" href="https://www.taxiyatri.com/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>" />

<title>Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> @ ₹9/km</title>

<meta
    name="description"
    content="Book reliable taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Local, outstation, airport transfers, railway station pickup, one-way and round-trip cabs at affordable fares.">

<meta
    name="keywords"
    content="Taxi Service in <?= esc($location['location_name']); ?>, Taxi in <?= esc($location['location_name']); ?>, Cab Service in <?= esc($location['location_name']); ?>, Airport Taxi <?= esc($location['location_name']); ?>, Outstation Taxi <?= esc($location['location_name']); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="robots" content="index,follow">

<link rel="icon" href="/images/favicon.ico">

<link href="/css/main.min.css" rel="stylesheet">
<link href="/css/media.min.css" rel="stylesheet">

<link rel="stylesheet" href="/css/style.min.css">
<link rel="stylesheet" href="cssmenu/styles.min.css">
<link rel="stylesheet" href="/css/style2.min.css">

<link rel="stylesheet"
href="/css/components/common.css">

<link rel="stylesheet"
href="/css/components/faq.css">

<link rel="stylesheet"
href="/css/components/routes.css">

<link rel="stylesheet"
href="/css/components/near-me.css">

<link rel="stylesheet"
href="/css/components/urbania-packages.css">

<link rel="preconnect"
href="https://fonts.googleapis.com">

<link rel="preconnect"
href="https://fonts.gstatic.com"
crossorigin>

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
rel="stylesheet">


<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
</script>

<script src="/cssmenu/script.min.js"></script>

<!-- Google Tag Manager -->

<script defer>
(function(w,d,s,l,i){

w[l]=w[l]||[];

w[l].push({

'gtm.start':

new Date().getTime(),

event:'gtm.js'

});

var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),

dl=l!='dataLayer'?'&l='+l:'';

j.async=true;

j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;

f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-TGSJ3JJ');
</script>

<!-- LocalBusiness + TaxiService -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": ["LocalBusiness","TaxiService"],
  "@id": "https://www.taxiyatri.com/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#business",
  "name": "TaxiYatri - Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "url": "https://www.taxiyatri.com/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "image": "https://www.taxiyatri.com/images/taxiyatri_bg.webp",
  "logo": "https://www.taxiyatri.com/images/logo.png",
  "telephone": "+91-8377809809",
  "description": "Book taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. We provide local taxi, airport transfers, railway station pickups and outstation cabs at transparent prices.",
  "priceRange": "₹₹",
  "currenciesAccepted": "INR",
  "paymentAccepted": "Cash, UPI, Credit Card, Debit Card",
  "openingHours": "Mo-Su 00:00-23:59",

  "address": {
    "@type": "PostalAddress",
    "addressLocality": "<?= esc($location['location_name']); ?>",
    "addressRegion": "<?= esc($parentCity['state']); ?>",
    "postalCode": "<?= esc($parentCity['pincode']); ?>",
    "addressCountry": "IN"
  },

  "geo": {
    "@type": "GeoCoordinates",
    "latitude": <?= $parentCity['latitude']; ?>,
    "longitude": <?= $parentCity['longitude']; ?>
  },

  "areaServed": {
    "@type": "Place",
    "name": "<?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>"
  },

  "serviceArea": {
    "@type": "Place",
    "name": "<?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>"
  }
}
</script>

<!-- WebPage -->
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebPage",
  "@id":"https://www.taxiyatri.com/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#webpage",
  "url":"https://www.taxiyatri.com/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "name":"Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> | TaxiYatri",
  "headline":"Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "description":"Book taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Reliable local, airport, railway station and outstation taxi services.",
  "inLanguage":"en-IN",

  "isPartOf":{
    "@type":"WebSite",
    "name":"TaxiYatri",
    "url":"https://www.taxiyatri.com"
  },

  "primaryImageOfPage":{
    "@type":"ImageObject",
    "url":"https://www.taxiyatri.com/images/taxiyatri_bg.webp"
  },

  "about":{
    "@type":"Place",
    "name":"<?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>"
  }
}
</script>

<!-- Breadcrumb -->
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"BreadcrumbList",
  "itemListElement":[
    {
      "@type":"ListItem",
      "position":1,
      "name":"Home",
      "item":"https://www.taxiyatri.com"
    },
    {
      "@type":"ListItem",
      "position":2,
      "name":"Taxi Service in <?= esc($parentCity['name']); ?>",
      "item":"https://www.taxiyatri.com/taxi-service-in-<?= esc($parentCity['slug']); ?>"
    },
    {
      "@type":"ListItem",
      "position":3,
      "name":"Taxi Service in <?= esc($location['location_name']); ?>",
      "item":"https://www.taxiyatri.com/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>"
    }
  ]
}
</script>



</head>

<body>


<!-- GTM -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGSJ3JJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php include 'layout/navbar.php'; ?>


<!-- HERO -->

<div class="main_col_wrap paddingzero">

<img src="images/taxiyatri_bg.webp" class="hide-class" alt="Taxi Service in <?= esc($location['location_name']); ?>" width="100%" height="521">

<div class="main_inn_col_wrap positionabsolute">

<div class="crs_ibe_box">

<iframe

scrolling="no" frameborder="0" class="iframeibebox"

src="https://taxiyatri.easyets.com/blankdefault.aspx?Tab=2&OutFrom=<?= urlencode($location['location_name']); ?>&outto=&LocalFrom=<?= urlencode($location['location_name']); ?>&LocalPackage=8Hrs%2080Kms&TransferFrom=&TransferLocation=&IsOneWay=1">

</iframe>

</div>

</div>

</div>

<div class="outer-wrapper">

<div class="inner-wrapper">

  <div class="p-sm mb-sm rounded-sm text-secondary font-medium">
                <a href="/">Home</a> » 
                <a href="/taxi-service-in-bangalore">Taxi Service in <?= esc($parentCity['name']); ?></a> »
                <a href="/taxi-service-in-<?= esc($location['slug']);?>" ?>Taxi Service in <?= esc($location['location_name']); ?></a>
            </div>

<?php include 'components/menu.php'; ?>

<div class="seo-content">

<h1>Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> – Fixed Fares from ₹9/km, 24/7 Booking</h1>

<p>
TaxiYatri makes booking a taxi in <?= esc($location['location_name']); ?> simple, transparent, and affordable. Fares start from just ₹9 per km for a sedan and ₹14 per km for an SUV, with no hidden charges after booking. Whether you need a local ride, an airport transfer, a railway station pickup, or an outstation cab, you'll find a wide range of vehicles including hatchbacks, sedans, SUVs, Innova, tempo travellers, and minibuses. Every booking includes toll, GST, and driver allowance upfront, so you know exactly what you'll pay before your journey begins. As part of our <a href="/taxi-service-in-bangalore" style="color:#007bff;">Taxi Service in Bangalore</a> network, we provide dependable cab services across every major locality with verified drivers, clean vehicles, and 24×7 customer support. If you'd like to check the latest fare or book a ride, simply call <strong>8377809809</strong>, and our team will help you get on the road quickly.
</p>
<h2>Taxi Fare & Cab Options in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<p>TaxiYatri offers transparent pricing across a wide range of vehicles, from budget-friendly sedans to spacious SUVs and premium cars. Whether you need a local taxi, airport transfer, or outstation cab, choose the vehicle that best suits your travel needs and budget.</p>

<?php include 'components/vehicle.php'; ?>



<h2><?= $location['location_name']; ?>, <?= esc($parentCity['name']); ?> – Taxi Fare & Vehicle Details</h2>

<div class="newsList table-responsive">

<table class="table table-bordered">

<thead>

<tr class="seo-table">
    <th>Vehicle Type</th>
    <th>Seats</th>
    <th>Luggage Capacity</th>
    <th>Local Fare (8hr/80Km)</th>
    <th>Round Trip</th>
    <th>One Way</th>
</tr>

</thead>

<tbody class="seo-table">

<?php

$vehicleInfo = [
    'Hatchback' => [
        'seats'   => '4',
        'luggage' => '2 Bags'
    ],
    'Sedan' => [
        'seats'   => '4',
        'luggage' => '3 Bags'
    ],
    'SUV' => [
        'seats'   => '6',
        'luggage' => '4 Bags'
    ],
    'Innova' => [
        'seats'   => '7',
        'luggage' => '5 Bags'
    ],
    'Innova Crysta' => [
        'seats'   => '7',
        'luggage' => '5 Bags'
    ],
    'Crysta' => [
        'seats'   => '7',
        'luggage' => '5 Bags'
    ],
    'Tempo Traveller' => [
        'seats'   => '12–26',
        'luggage' => '10+ Bags'
    ]
];

foreach ($pricing as $vehicle):

    $info = $vehicleInfo[$vehicle['vehicle_type']] ?? [
        'seats' => '-',
        'luggage' => '-'
    ];

?>

<tr>

    <td><strong><?= $vehicle['vehicle_type']; ?></strong></td>

    <td><?= $info['seats']; ?></td>

    <td><?= $info['luggage']; ?></td>

    <td> ₹<?= $vehicle['local_price']; ?>/km</td>

    <td> ₹<?= $vehicle['round_trip_price']; ?>/km</td>

    <td> ₹<?= $vehicle['one_way_price']; ?>/km</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>


<p><strong>Note:</strong> Toll tax, parking charges, state tax and driver allowance (if applicable) are extra.</p>
<?php if (!empty($cityFacts)): ?>

<div class="info-box">
    <h2>About <?= esc($location['location_name']); ?></h2>

    <p class="mb-md">
        <strong>Overview:</strong>
        <?= esc($cityFacts['one_liner']); ?>
    </p>

    <div class="grid grid-4 mt-md mb-md">
        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-monument text-primary" style="margin-right: 8px;"></i>
                Famous For
            </div>
            <div class="card-text">
                <?= esc($cityFacts['famous_for']); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-utensils text-primary" style="margin-right: 8px;"></i>
                Local Cuisine
            </div>
            <div class="card-text">
                <?= esc($cityFacts['local_cuisine']); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-calendar-day text-primary" style="margin-right: 8px;"></i>
                Best Time to Visit
            </div>
            <div class="card-text">
                <?= esc($cityFacts['best_time_to_visit']); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-heart text-primary" style="margin-right: 8px;"></i>
                Ideal For
            </div>
            <div class="card-text">
                <?= esc($cityFacts['popular_attractions']); ?>
            </div>
        </div>
    </div>

    <?php if (!empty($parentCity['airport_name']) || !empty($parentCity['railway_station_name'])): ?>
        <div class="flex flex-wrap gap-md mt-md pt-sm" style="border-top: 1px dashed var(--color-gray-300);">
            <?php if (!empty($parentCity['airport_name'])): ?>
                <div style="flex: 1; min-width: 250px;">
                    <i class="fa-solid fa-plane text-primary" style="margin-right: 8px;"></i>
                    <strong>Nearest Airport:</strong>
                    <?= esc($parentCity['airport_name']); ?> (<?= esc($parentCity['airport_code']); ?>)
                </div>
            <?php endif; ?>
            <?php if (!empty($parentCity['railway_station_name'])): ?>
                <div style="flex: 1; min-width: 250px;">
                    <i class="fa-solid fa-train text-primary" style="margin-right: 8px;"></i>
                    <strong>Nearest Railway Station:</strong>
                    <?= esc($parentCity['railway_station_name']); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php endif; ?>

<div class="info-box">
  <p>
    <strong>Note:</strong> The above fares are indicative for Swift Dzire one-way travel. SUV and premium vehicle pricing varies by category. Final fare is confirmed before booking.
  </p>
</div>

<div style="text-align:center;margin:10px;">

<a
href="tel:8377-809-809"
class="ui-btn ui-btn-primary ui-btn-lg">

<i class="fa-solid fa-phone"></i>

Book Your Ride Now

</a>

</div>
<h2>Taxi Services We Offer in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<h3>Local Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>
<p>
Book reliable local taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> for daily travel, office trips, 
airport transfers, railway station pickup, and sightseeing. Get comfortable rides from 
<?= esc($parentCity['railway_station_name']); ?> and across <?= esc($location['location_name']); ?> with TaxiYatri.
</p>

<h3>Outstation Taxi from <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>
<p>
Book an <a href="/outstation-taxi-service-in-<?= esc($parentCity['slug']); ?>" style="color:#007bff;">outstation taxi from <?= esc($parentCity['name']); ?></a> for one-way or round-trip travel. TaxiYatri offers comfortable cabs, experienced drivers, transparent fares, and convenient doorstep pickup from <?= esc($location['location_name']); ?>.
</p>





<h3>Airport Taxi for <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>
<p>
Get hassle-free airport taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> for pickup and drop at 
<?= esc($parentCity['airport_name']); ?> (<?= esc($parentCity['airport_code']); ?>) with comfortable cabs and reliable drivers.
</p>

<h3>Railway Station Taxi for <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>
<p>
Get reliable railway station taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> for pickup and drop at 
<?= esc($parentCity['railway_station_name']); ?> with comfortable cabs and experienced drivers.
</p>

<h2>Travel Guide & Tips for <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<div class="info-box">
    

    <?php if (!empty($travelTips)): ?>
        <ul class="list-theme" style="list-style: none; padding-left: 0;">
            <?php foreach($travelTips as $tip): ?>
                <li style="margin-bottom: 20px;">
                    <!-- Renders the sub-heading (e.g., "Best Time to Visit") -->
                    <strong style="display: block; font-size: 1.1em; color: #333;">
                        <?= htmlspecialchars($tip['title']); ?>:
                    </strong>
                    <!-- Renders the descriptive paragraph text -->
                    <p style="margin: 5px 0 0 0; color: #555; line-height: 1.6;">
                        <?= htmlspecialchars($tip['description']); ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No travel tips available for this destination yet.</p>
    <?php endif; ?>

    <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
    
    <p style="font-size: 0.9em; color: #888; margin: 0;">
        Recently Updated: <?= date('F Y'); ?>
    </p>
</div>
<h2>Popular Pickup Locations in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="seo-table">
                <th colspan="3">Popular Pickup Locations in <?= esc($parentCity['name']); ?></th>
            </tr>
        </thead>
<tbody class="seo-table">
<?php
$filteredAreas = array_filter($areas, function ($area) use ($location) {
    return $area['slug'] !== $location['slug'];
});

usort($filteredAreas, function ($a, $b) use ($location) {
    return crc32($a['slug'] . $location['slug'])
        <=> crc32($b['slug'] . $location['slug']);
});

$filteredAreas = array_slice(array_values($filteredAreas), 0, 15);

$count = count($filteredAreas);

if ($count > 0):

    $chunkSize = ceil($count / 3);
    $chunks = array_chunk($filteredAreas, $chunkSize);
    $maxRows = max(array_map('count', $chunks));

    for ($i = 0; $i < $maxRows; $i++):
?>
<tr>
    <td><?= esc($chunks[0][$i]['location_name'] ?? ''); ?></td>
    <td><?= esc($chunks[1][$i]['location_name'] ?? ''); ?></td>
    <td><?= esc($chunks[2][$i]['location_name'] ?? ''); ?></td>
</tr>
<?php
    endfor;

else:
?>
<tr>
    <td colspan="3">
        No popular pickup locations available for <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>.
    </td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>

<div class="info-box">

<p>
TaxiYatri provides reliable taxi service across <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> and nearby areas, covering major locations, residential areas, railway stations, airports, and popular destinations.
</p></div>

<section class="fleet-section trust-section">
    <h2 class="section-title">Why Thousands of Customers Trust TaxiYatri</h2>

    <div class="fleet-grid">

        <div class="fleet-card">
            <div class="trust-icon-box">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <div class="fleet-content">
                <h3>Verified Drivers</h3>
                <span class="badge-vehicle">KYC Verified & Licensed</span>
            </div>
        </div>

        <div class="fleet-card">
            <div class="trust-icon-box">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <div class="fleet-content">
                <h3>GPS Tracked Cabs</h3>
                <span class="badge-vehicle">Live Trip Monitoring</span>
            </div>
        </div>

        <div class="fleet-card">
            <div class="trust-icon-box">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="fleet-content">
                <h3>Transparent Pricing</h3>
                <span class="badge-vehicle">No Hidden Charges</span>
            </div>
        </div>

        <div class="fleet-card">
            <div class="trust-icon-box">
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="fleet-content">
                <h3>4.2★ Customer Rating</h3>
                <span class="badge-vehicle">5,000+ Completed Trips</span>
            </div>
        </div>

    </div>
</section>


<div style="text-align:center;margin:20px;">

<a href="tel:8377-809-809" class="ui-btn ui-btn-primary ui-btn-lg">

Book Your Ride Now

</a>

</div>

<h2><?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> Taxi service Contact & WhatsApp Number</h2>

<p>
Need a taxi in <strong><?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></strong>? Contact TaxiYatri for instant cab booking, airport transfers, local rentals and outstation taxi services.
</p>

<table class="table table-bordered">
    <tbody class="seo-table">

        <tr class="seo-table">
            <th align="left"> <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> Taxi Booking Number</th>
            <td>
                <a href="tel:+918377809809">8377-809-809</a>
            </td>
        </tr>

        <tr>
            <th align="left"> <?= esc($location['location_name']); ?> WhatsApp Booking Number</th>
            <td>
                <a href="https://api.whatsapp.com/send?phone=919818022687" target="_blank" rel="noopener">
                    +91 98180 22687
                </a>
            </td>
        </tr>

        <tr>
            <th align="left">Booking Hours</th>
            <td>24×7 Available</td>
        </tr>
        <tr>
            <th align="left">Mail Support</th>
            <td>info@taxiyatri.com</td>
        </tr>

        <tr>
            <th align="left">Services Available</th>
            <td>Local Taxi, Airport Taxi, Railway Station Pickup, Outstation Taxi, One Way & Round Trip</td>
        </tr>

        <tr>
            <th align="left">Pickup Service</th>
            <td>Doorstep Pickup Anywhere in <?= esc($location['location_name']); ?></td>
        </tr>

    </tbody>
</table>
            

<?php include 'components/book.php'; ?>

<?php include 'components/testimonial.php'; ?>

<?php include 'components/why_choose_us.php'; ?>
            





            </div>

<section class="routes-section">

    <div class="routes-header">
       <h2>Nearby Taxi Service Areas Around <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<p>
Explore TaxiYatri's taxi services in nearby localities around
<?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>.
</p>
    </div>

    <div class="routes-grid">

   <?php
$filteredAreas = array_filter($areas, function ($area) use ($location) {
    return $area['slug'] !== $location['slug'];
});

usort($filteredAreas, function ($a, $b) use ($location) {
    return crc32($a['slug'] . $location['slug'])
        <=> crc32($b['slug'] . $location['slug']);
});

$filteredAreas = array_slice(array_values($filteredAreas), 0, 8);

foreach ($filteredAreas as $area):
?>

    <div class="route-col">
        <ul class="route-list">
            <li>
                <a href="/taxi-service-in-<?= esc($area['slug']); ?>-<?= esc($parentCity['slug']); ?>">
                    Taxi Service in <?= esc($area['location_name']); ?>
                </a>
            </li>
        </ul>
    </div>

<?php endforeach; ?>

    </div>

</section>

<section class="faq-section">

<h2>

Frequently Asked Questions About Taxi Service in 

<?= $location['location_name']; ?>

</h2>

<?php foreach ($location_faqs as $faq): ?>

<div class="faq-item">
    <h3 class="faq-question">
        <?= str_replace(
            ['{LOCATION}', '{CITY}', '{AIRPORT}', '{RAILWAY}'],
            [
                $location['location_name'], $parentCity['name'],
                $parentCity['airport_name'], $parentCity['railway_station_name']
            ],
            $faq['question']
        ); ?>
    </h3>

    <p class="faq-answer">
        <?= str_replace(
            ['{LOCATION}', '{CITY}', '{AIRPORT}', '{RAILWAY}'],
            [
                $location['location_name'],
                $parentCity['name'],
                $parentCity['airport_name'],
                $parentCity['railway_station_name']
            ],
            $faq['answer']
        ); ?>
    </p>
</div>

<?php endforeach; ?>

</section>







<?php include 'components/about.php'; ?>

</div>

</div>

<script src="css/components/faq.js"></script>

<?php include 'layout/footer.php'; ?>

</body>

</html>

