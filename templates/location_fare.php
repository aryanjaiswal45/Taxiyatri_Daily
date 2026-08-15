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
$cityFacts = getCityFacts($parentCity['id']);
require_once __DIR__ . '/../includes/location_fare_faq.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<link rel="canonical" href="https://www.taxiyatri.com/taxi-fare-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>" />

<title>Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> – Fixed Cab Rates from ₹9/km | TaxiYatri</title>

<meta name="description" content="Check transparent taxi fares in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>. Find local cab packages, airport transfer rates, outstation prices, and book 24/7 with zero hidden charges.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index,follow">

<link rel="icon" href="/images/favicon.ico">

<link href="/css/main.min.css" rel="stylesheet">
<link href="/css/media.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.min.css">
<link rel="stylesheet" href="cssmenu/styles.min.css">
<link rel="stylesheet" href="/css/style2.min.css">

<link rel="stylesheet" href="/css/components/common.css">
<link rel="stylesheet" href="/css/components/faq.css">
<link rel="stylesheet" href="/css/components/routes.css">
<link rel="stylesheet" href="/css/components/vehicle.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/cssmenu/script.min.js" defer></script>

<!-- Google Tag Manager -->
<script defer>
(function(w,d,s,l,i){
w[l]=w[l]||[];
w[l].push({
'gtm.start': new Date().getTime(),
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

<!-- LocalBusiness + TaxiService Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": ["LocalBusiness","TaxiService"],
  "@id": "https://www.taxiyatri.com/taxi-fare-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#business",
  "name": "TaxiYatri - Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "url": "https://www.taxiyatri.com/taxi-fare-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "image": "https://www.taxiyatri.com/images/taxiyatri_bg.webp",
  "logo": "https://www.taxiyatri.com/images/logo.png",
  "telephone": "+91-8377809809",
  "description": "Get transparent, pre-confirmed taxi fares in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>. Book budget local, outstation, and airport cab services online.",
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
  }
}
</script>

<!-- WebPage Schema -->
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebPage",
  "@id":"https://www.taxiyatri.com/taxi-fare-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#webpage",
  "url":"https://www.taxiyatri.com/taxi-fare-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "name":"Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> | TaxiYatri",
  "headline":"Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "description":"Check transparent taxi fares in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Local, airport, and outstation cab rates.",
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

<!-- Breadcrumb Schema -->
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
      "name":"Taxi Fare in <?= esc($location['location_name']); ?>",
      "item":"https://www.taxiyatri.com/taxi-fare-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>"
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Taxi Service in <?= esc($location['location_name']); ?>",
  "provider": {
    "@type": "LocalBusiness",
    "name": "TaxiYatri",
    "telephone": "+91-8377809809",
    "priceRange": "₹₹",
    "image": "https://www.taxiyatri.com/images/taxiyatri_bg.webp"
  },
  "areaServed": {
    "@type": "Place",
    "name": "<?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>"
  },
  "serviceType": "Taxi Service",
  "offers": {
    "@type": "Offer",
    "priceCurrency": "INR",
    "price": "9",
    "description": "Taxi fare starting from ₹9/km"
  }
}
</script>

</head>
<body>

<!-- GTM -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGSJ3JJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<?php include 'layout/navbar.php'; ?>

<!-- 1. Hero with CTA and call button -->
<div class="main_col_wrap paddingzero" id="hero-booking">
    <img src="images/taxiyatri_bg.webp" class="hide-class" alt="Taxi Fare in <?= esc($location['location_name']); ?>" width="100%" height="521">
    <div class="main_inn_col_wrap positionabsolute">
        <div class="crs_ibe_box">
            <iframe scrolling="no" frameborder="0" class="iframeibebox" src="https://taxiyatri.easyets.com/blankdefault.aspx?Tab=2&OutFrom=<?= urlencode($location['location_name'] . ', ' . $parentCity['name']); ?>&outto=&LocalFrom=<?= urlencode($location['location_name'] . ', ' . $parentCity['name']); ?>&LocalPackage=8Hrs%2080Kms&TransferFrom=&TransferLocation=&IsOneWay=1"></iframe>
        </div>
    </div>
</div>

<div class="outer-wrapper">
    <div class="inner-wrapper">
        <div class="p-sm mb-sm rounded-sm text-secondary font-medium">
            <a href="/">Home</a> » 
            <a href="/taxi-service-in-<?= esc($parentCity['slug']); ?>">Taxi Service in <?= esc($parentCity['name']); ?></a> » 
            Taxi Fare in <?= esc($location['location_name']); ?>
        </div>

        <?php include 'components/menu.php'; ?>

        <div class="seo-content">
            <h1>Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> – Fixed Rates, No Surge</h1>
            <p>     
TaxiYatri offers a reliable, affordable, and transparent taxi service in <?= esc($location['location_name']); ?>, connecting travelers to every part of <?= esc($parentCity['name']); ?> with professional drivers and well-maintained vehicles. As a trusted part of our <a href="/taxi-service-in-<?= esc($parentCity['slug']); ?>">taxi service in <?= esc($parentCity['name']); ?></a> network, we provide local cabs, airport transfers, railway station pickups, one-way taxis, round trips, and outstation taxi services at competitive prices. Fares start from just ₹9/km for hatchbacks and sedans and ₹14/km for SUVs, with no hidden charges, surge pricing, or last-minute surprises. Every booking includes a verified chauffeur, clean and sanitized cab, transparent billing, and 24/7 customer support to ensure a smooth travel experience. Whether you're commuting within <?= esc($location['location_name']); ?>, heading to Kempegowda International Airport, traveling to another part of <?= esc($parentCity['name']); ?>, or planning an outstation journey, TaxiYatri provides a safe, punctual, and comfortable ride.
            </p>

         <h2>Taxi Fare Calculator for <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>
            <p>Use our fare calculator to estimate your taxi fare in <?= esc($location['location_name']); ?>. select your vehicle type, and get an instant fare estimate for local, airport, or outstation trips.</p>
            <?php include 'components/taxi-fare-calculator.php'; ?>
            
            <h2>Detailed Taxi Fare Chart in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>
            <p>Select from a diverse fleet of hatchbacks, sedans, SUVs, and Tempo Travellers to match your seating requirements, luggage space, and budget preferences.</p>
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
                            'Hatchback' => ['seats' => '4', 'luggage' => '2 Bags'],
                            'Sedan' => ['seats' => '4', 'luggage' => '3 Bags'],
                            'SUV' => ['seats' => '6', 'luggage' => '4 Bags'],
                            'Innova' => ['seats' => '7', 'luggage' => '5 Bags'],
                            'Innova Crysta' => ['seats' => '7', 'luggage' => '5 Bags'],
                            'Crysta' => ['seats' => '7', 'luggage' => '5 Bags'],
                            'Tempo Traveller' => ['seats' => '12–26', 'luggage' => '10+ Bags']
                        ];

                        foreach ($pricing as $vehicle):
                            $info = $vehicleInfo[$vehicle['vehicle_type']] ?? ['seats' => '-', 'luggage' => '-'];
                        ?>
                        <tr class="seo-table">
                            <td data-label="Vehicle Type"><strong><?= esc($vehicle['vehicle_type']); ?></strong></td>
                            <td data-label="Seats"><?= esc($info['seats']); ?></td>
                            <td data-label="Luggage Capacity"><?= esc($info['luggage']); ?></td>
                            <td data-label="Local Fare">₹<?= esc($vehicle['local_price']); ?>/km</td>
                            <td data-label="Round Trip">₹<?= esc($vehicle['round_trip_price']); ?>/km</td>
                            <td data-label="One Way">₹<?= esc($vehicle['one_way_price']); ?>/km</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="info-box">

    <h2>How Your Taxi Fare is Calculated</h2>

    <p>
        TaxiYatri follows a transparent pricing model for every booking from
        <strong><?= esc($location['location_name']); ?></strong>. Your final fare is calculated using the following formula:
    </p>

    <p>
        <strong>Total Fare = (Distance × Per Km Rate) + Driver Charges</strong>
    </p>

    <p>
        The total fare is confirmed before booking, ensuring complete price transparency with no hidden charges. Parking fees, toll charges are Paid Upfront.
    </p>

</div>

            <!-- 7. Airport Fare Guide -->
            <?php if (!empty($parentCity['airport_name'])): ?>
            <h2>Airport Taxi Fare Guide from <?= esc($location['location_name']); ?></h2>
            <p>Book reliable airport transfers from <strong><?= esc($location['location_name']); ?></strong> to <strong><?= esc($parentCity['airport_name']); ?> (<?= esc($parentCity['airport_code']); ?>)</strong>. Enjoy transparent, pre-negotiated travel rates:</p>
            <div class="grid grid-2">
                <div class="card">
                    <div class="flex items-center gap-sm mb-3">
                        <div class="trust-icon-box" style="width: 44px; height: 44px; font-size: 20px; margin-bottom: 0; flex-shrink: 0;">
                            <i class="fa-solid fa-plane-departure"></i>
                        </div>
                        <h3 class="card-title" style="margin: 0;">Hatchback / Sedan (Dzire)</h3>
                    </div>
                    <div class="card-text">
                        Starting from <strong>₹<?= 9; ?>/km</strong> (Estimated ₹1,200 for approx 40-45 km).
                        <p style="margin-top: 10px; font-size:12px; color:#777;"><i class="fa-solid fa-clock"></i> Travel time: 60 - 90 minutes (traffic dependent)</p>
                    </div>
                </div>
                <div class="card">
                    <div class="flex items-center gap-sm mb-3">
                        <div class="trust-icon-box" style="width: 44px; height: 44px; font-size: 20px; margin-bottom: 0; flex-shrink: 0;">
                            <i class="fa-solid fa-plane-arrival"></i>
                        </div>
                        <h3 class="card-title" style="margin: 0;">SUV (Ertiga / Innova)</h3>
                    </div>
                    <div class="card-text">
                        Starting from <strong>₹<?= 14; ?>/km</strong> (Estimated ₹1,800 for spacious travel).
                        <p style="margin-top: 10px; font-size:12px; color:#777;"><i class="fa-solid fa-clock"></i> Travel time: 60 - 90 minutes</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
       

    <h2>Local Taxi Rental Packages in <?= esc($location['location_name']); ?></h2>

    <p>Choose from flexible hourly taxi rental packages for local travel in <?= esc($location['location_name']); ?>. Perfect for office visits shopping, meetings, sightseeing, and multiple stops.
    </p>
<div class="newsList table-responsive">

    <table class="table table-bordered">

        <thead>
            <tr class="seo-table">
                <th>Vehicle Type</th>
                <th>8 Hr / 80 Km</th>
                <th>12 Hr / 120 Km</th>
                <th>Extra Km</th>
                <th>Extra Hour</th>
                <th>Book Now</th>
            </tr>
        </thead>

        <tbody class="seo-table">

            <tr>
                <td><strong>Hatchback</strong></td>
                <td>₹1,950</td>
                <td>₹2,200</td>
                <td>₹10/km</td>
                <td>₹140/hr</td>
                <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Hatchback from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
            </tr>

            <tr>
                <td><strong>Sedan</strong></td>
                <td>₹2,100</td>
                <td>₹2,500</td>
                <td>₹13/km</td>
                <td>₹160/hr</td>
                <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Sedan from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
            </tr>

            <tr>
                <td><strong>SUV</strong></td>
                <td>₹2,900</td>
                <td>₹3,500</td>
                <td>₹14/km</td>
                <td>₹180/hr</td>
                <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a SUV from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
            </tr>

            <tr>
                <td><strong>Innova Crysta</strong></td>
                <td>₹3,700</td>
                <td>₹4,100</td>
                <td>₹19/km</td>
                <td>₹220/hr</td>
                <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
            </tr>

        </tbody>

    </table>

</div>

    <p class="small text-muted mt-3">
        <strong>Note:</strong> Package fares are indicative. Parking, toll charges, and additional waiting time may apply where applicable.
    </p>
          
            <?php if (!empty($parentCity['railway_station_name'])): ?>
            <h2>Railway Station Taxi Fare Guide from <?= esc($location['location_name']); ?></h2>
            <p>Ensure a timely departure or seamless pickup from <strong><?= esc($location['location_name']); ?></strong> to <strong><?= esc($parentCity['railway_station_name']); ?></strong>:</p>
            <div class="grid grid-2">
                <div class="card">
                    <div class="flex items-center gap-sm mb-3">
                        <div class="trust-icon-box" style="width: 44px; height: 44px; font-size: 20px; margin-bottom: 0; flex-shrink: 0;">
                            <i class="fa-solid fa-train"></i>
                        </div>
                        <h3 class="card-title" style="margin: 0;">Hatchback / Sedan (Dzire)</h3>
                    </div>
                    <div class="card-text">
                        One-way station transfer starts from <strong>₹700</strong>.
                        <p style="margin-top: 10px; font-size:12px; color:#777;"><i class="fa-solid fa-clock"></i> Est. Travel time: 30 - 50 minutes (depending on traffic)</p>
                    </div>
                </div>
                <div class="card">
                    <div class="flex items-center gap-sm mb-3">
                        <div class="trust-icon-box" style="width: 44px; height: 44px; font-size: 20px; margin-bottom: 0; flex-shrink: 0;">
                            <i class="fa-solid fa-train-subway"></i>
                        </div>
                        <h3 class="card-title" style="margin: 0;">SUV (Ertiga / Innova)</h3>
                    </div>
                    <div class="card-text">
                        One-way station transfer starts from <strong>₹1,100</strong>.
                        <p style="margin-top: 10px; font-size:12px; color:#777;"><i class="fa-solid fa-clock"></i> Est. Travel time: 30 - 50 minutes</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
 <h2>Popular Outstation Taxi Fares from <?= esc($location['location_name']); ?></h2>

<p>
Travel from <?= esc($location['location_name']); ?> to nearby cities with transparent fares, verified drivers, and comfortable cabs. Browse estimated starting fares for some of the most popular outstation routes.
</p>


<div class="newsList table-responsive">

<table class="table table-bordered">

<thead>
<tr class="seo-table">
    <th>Route</th>
    <th>Distance(approx.)</th>
    <th>Travel Time</th>
    <th>Starting Fare</th>
    <th>Book</th>
</tr>
</thead>

<tbody class="seo-table">

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-mysore-cab" target="_blank" rel="noopener noreferrer">Bangalore → Mysore</a></td>
    <td>145 km</td>
    <td>3 hrs</td>
    <td>Starting from ₹<?php echo number_format($fare=((145*10)*1.5)+500); ?></td>
    <td><a href=https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details." ); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
</tr>

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-coorg-cab-service" target="_blank" rel="noopener noreferrer">Bangalore → Coorg</a></td>
    <td>265 km</td>
    <td>4 hrs</td>
    <td>Starting from ₹<?php echo number_format($fare=((265*10)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
</tr>

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-ooty-cab-service" target="_blank" rel="noopener noreferrer">Bangalore → Ooty</a></td>
    <td>145 km</td>
    <td>2 hrs</td>
    <td>Starting from ₹<?php echo number_format($fare=((145*10)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
    </a></td>
</tr>

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-chikmagalur-taxi" target="_blank" rel="noopener noreferrer">Bangalore → Chikmagalur</a></td>
    <td>245 km</td>
    <td>5 hrs</td>
    <td>Starting from ₹<?php echo number_format($fare=((245*10)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
</tr>

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-hosur-cab" target="_blank" rel="noopener noreferrer">Bangalore → Hosur</a></td>
    <td>42 km</td>
    <td>1 hr</td>
    <td>Starting from ₹<?php echo number_format($fare=((42*10)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
</tr>

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-wonderla-cab" target="_blank" rel="noopener noreferrer">Bangalore → Wonderla</a></td>
    <td>38 km</td>
    <td>1 hr</td>
    <td>Starting from ₹<?php echo number_format($fare=((38*10)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Innova Crysta from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
</tr>

</tbody>

</table>

</div>

<div class="info-box">
    <p>
        <strong>Note:</strong> Outstation fares are indicative and may vary based on distance, vehicle type, and route. Toll charges, parking fees, and additional waiting time may apply where applicable.
    </p>
            </div>


<h2>
        Local Taxi Service Coverage in <?= esc($location['location_name']); ?>
    </h2>

    <p>
        TaxiYatri provides local taxi services across <?= esc($location['location_name']); ?> and nearby areas in <?= esc($parentCity['name']); ?>.
    </p>
    

    <div class="table-responsive">
        <table class="table table-bordered">

            <thead>
                <tr class="seo-table">
                    <th colspan="3">
                        Popular Areas We Cover Near <?= esc($location['location_name']); ?>
                    </th>
                </tr>
            </thead>

            <tbody class="seo-table">

            <?php

            $nearbyAreas = array_filter($areas, function ($area) use ($location) {
                return $area['slug'] !== $location['slug'];
            });

            usort($nearbyAreas, function ($a, $b) use ($location) {
                return crc32($a['slug'] . $location['slug'])
                    <=> crc32($b['slug'] . $location['slug']);
            });

            $nearbyAreas = array_slice(array_values($nearbyAreas), 0, 15);

            $chunkSize = ceil(count($nearbyAreas) / 3);
            $chunks = array_chunk($nearbyAreas, $chunkSize);
            $maxRows = max(array_map('count', $chunks));

            for ($i = 0; $i < $maxRows; $i++):
            ?>

                <tr>

                    <?php for ($j = 0; $j < 3; $j++): ?>

                        <td>

                        <?php if (isset($chunks[$j][$i])): ?>

                            <a href="/taxi-service-in-<?= esc($chunks[$j][$i]['slug']); ?>-<?= esc($parentCity['slug']); ?>">
                                <?= esc($chunks[$j][$i]['location_name']); ?>
                            </a>

                        <?php endif; ?>

                        </td>

                    <?php endfor; ?>

                </tr>

            <?php endfor; ?>

            </tbody>

        </table>



    </div>

    <h2>
            Why Travellers Prefer TaxiYatri in
            <?= esc($location['location_name']); ?>
        </h2>

<p>Compare TaxiYatri with typical local taxi operators to understand why thousands of customers choose us for reliable and transparent cab services.</p>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="seo-table">
            <tr>
                <th>Comparison</th>
                <th class="info-box-strong">🚖 TaxiYatri</th>
                <th>🚕 Local Cabs</th>
                <th>📱 App-Based Cabs</th>
            </tr>
        </thead>

        <tbody class="seo-table">
            <tr>
                <td>💰 Pricing</td>
                <td class="info-box--success">Transparent fare</td>
                <td>May vary by operator</td>
                <td>May vary due to surge pricing</td>
            </tr>

            <tr>
                <td>📅 Advance Booking</td>
                <td class="info-box--success">Easy pre-booking</td>
                <td>Limited availability</td>
                <td>Primarily on-demand</td>
            </tr>

            <tr>
                <td>🛣️ Outstation Travel</td>
                <td class="info-box--success">Designed for outstation trips</td>
                <td>May not always be available</td>
                <td>Availability varies by city</td>
            </tr>
        </tbody>
    </table>
</div>

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


  <div class="info-box" style="margin-top:30px;">
                <p>
                    Need comprehensive city-wide info? Explore our core <a href="/taxi-service-in-<?= esc($parentCity['slug']); ?>">Taxi Service in <?= esc($parentCity['name']); ?></a> page for detailed city facts, attractions, and local travel packages. We also provide direct <a href="/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>">Taxi Service in <?= esc($location['location_name']); ?></a>. You can also view popular outstation packages or hire an Airport Taxi or a Railway Taxi to catch your next transit without any delays.
                </p>
            </div>

<h2>Fare Inclusions & Exclusions</h2>

<div class="newsList table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="seo-table">
                <th style="background-color:#e8f5e9; color:#2e7d32; text-align:center;">
                    Included in Your Fare
                </th>
                <th style="background-color:#fce4e4; color:#c62828; text-align:center;">
                    Paid Separately
                </th>
            </tr>
        </thead>

        <tbody class="seo-table">
            <tr>
                <td>⛽ Fuel Cost for the Entire Journey</td>
                <td>Toll Charges (where applicable)</td>
            </tr>

            <tr>
                <td>👨‍✈️ Driver Allowance</td>
                <td>Parking Charges at Actuals</td>
            </tr>

            <tr>
                <td>📑 GST & Applicable Taxes</td>
                <td>Night Driver Allowance (if applicable)</td>
            </tr>

            <tr>
                <td>📞 24×7 Customer Support</td>
                <td>Extra Distance Beyond the Booked Package</td>
            </tr>

            <tr>
                <td>✨ Clean & Sanitized Vehicle</td>
                <td>Waiting Charges Beyond Free Time</td>
            </tr>

            <tr>
                <td>🧾 Transparent Billing & Digital Invoice</td>
                <td>Special State Permit Charges (if applicable)</td>
            </tr>

            <tr>
                <td>✅ Instant Booking Confirmation via SMS/WhatsApp</td>
                <td>Any Additional Stops Requested During the Trip</td>
            </tr>
        </tbody>
    </table>
</div>

            <?php include 'components/book.php'; ?>
            <?php include 'components/testimonial.php'; ?>
            <?php include 'components/why_choose_us.php'; ?>

        </div>

        <?php
        $filteredAreas = array_filter($areas, function ($area) use ($location) {
            return $area['slug'] !== $location['slug'];
        });

        usort($filteredAreas, function ($a, $b) use ($location) {
    return crc32($a['slug'] . $location['slug'])
        <=> crc32($b['slug'] . $location['slug']);
});

        $filteredAreas = array_slice(array_values($filteredAreas), 0, 8);
        ?>

        <!-- 15. Nearby Fare Pages -->
        <section class="routes-section">
            <div class="routes-header">
               <h2>Nearby Taxi Fare Pages around <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>
               <p>Check and compare local taxi fares in adjacent neighborhoods and suburbs:</p>
            </div>
            <div class="routes-grid">
            <?php foreach ($filteredAreas as $area): ?>
                <div class="route-col">
                    <ul class="route-list">
                        <li>
                            <a href="/taxi-fare-in-<?= esc($area['slug']); ?>-<?= esc($parentCity['slug']); ?>">
                                Taxi Fare in <?= esc($area['location_name']); ?>
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

<?php foreach ($pricing_faqs as $faq): ?>

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

<script src="css/components/faq.js" defer></script>
<script src="/components/taxi-calc.js" defer></script>

<?php include 'layout/footer.php'; ?>

</body>
</html>

