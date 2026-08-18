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

$pricing = getPricing();
$areas = getAreas($parentCity['id']);
require_once __DIR__ . '/../includes/ertiga_faq.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="canonical" href="https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>" />

<title>Ertiga Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> – Book Ertiga @ ₹13/km | TaxiYatri</title>
<meta name="description"
    content="Book a reliable Ertiga taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Spacious 6-seater Ertiga cabs for local travel, airport transfers, railway station pickups, family trips, and outstation journeys at transparent fares.">
 
<meta
    name="keywords"
    content="Ertiga Taxi in <?= esc($location['location_name']); ?>, Ertiga in <?= esc($location['location_name']); ?>, Cab Service in <?= esc($location['location_name']); ?>, Airport Ertiga Taxi <?= esc($location['location_name']); ?>, Outstation Ertiga Taxi <?= esc($location['location_name']); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="Ertiga Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> | TaxiYatri">
<meta property="og:description" content="Book Swift Ertiga cab in <?= esc($location['location_name']); ?> for local, airport, and outstation travel. Fixed fares from ₹13/km. Call 8377809809.">
<meta property="og:image" content="images/taxiyatri_bg.webp">
<meta property="og:url" content="https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>">
<meta property="og:type" content="website">
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
<link rel="stylesheet"
href="/css/components/vehicle.css">


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
  "@id": "https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#business",
  "name": "TaxiYatri - Ertiga Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "url": "https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "image": "https://www.taxiyatri.com/images/taxiyatri_bg.webp",
  "logo": "https://www.taxiyatri.com/images/logo.png",
  "telephone": "+91-8377809809",
  "description": "Book Ertiga taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. We provide local Ertiga, airport transfers, railway station pickups and outstation cabs at transparent prices.",
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
  "@id":"https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#webpage",
  "url":"https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "name":"Ertiga Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> | TaxiYatri",
  "headline":"Ertiga Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "description":"Book Ertiga taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Reliable local, airport, railway station and outstation Ertiga taxi services.",
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
      "name":"Taxi service in <?= esc($parentCity['name']); ?>",
      "item":"https://www.taxiyatri.com/taxi-service-in-<?= esc($parentCity['slug']); ?>"
    },
    {
      "@type":"ListItem",
      "position":3,
      "name":"Ertiga Taxi in <?= esc($location['location_name']); ?>",
      "item":"https://www.taxiyatri.com/ertiga-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>"
    }
  ]
}
</script>
<style>
@media (max-width: 768px) {
    .usecase-panel {
        grid-template-columns: 1fr !important;
    }
    .usecase-panel img {
        max-height: 220px !important;
    }
    .usecase-tabs {
        -webkit-overflow-scrolling: touch;
    }
}
</style>
</head>

<body>


<!-- GTM -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGSJ3JJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php include 'layout/navbar.php'; ?>


<!-- HERO -->

<div class="main_col_wrap paddingzero">

<img src="images/taxiyatri_bg.webp" class="hide-class" alt="Ertiga Service in <?= esc($location['location_name']); ?>" width="100%" height="521">

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
                <a href="/ertiga-taxi-in-<?= esc($location['slug']);?>-<?= esc($parentCity['slug']); ?>">Ertiga Taxi in <?= esc($location['location_name']); ?></a>
            </div>

<?php include 'components/menu.php'; ?>

<div class="seo-content">

<h1>
Ertiga Taxi in <?= esc($location['location_name']); ?>,
<?= esc($parentCity['name']); ?> – 6/7 Seater Cab with Driver
</h1>

<p>
    TaxiYatri makes booking an Ertiga taxi from <?= esc($location['location_name']); ?>, Bangalore simple and convenient. 
    The Maruti Suzuki Ertiga is a spacious 6-passenger MPV designed for families, small groups, airport travel, 
    and comfortable outstation journeys. With three-row seating, air conditioning, and more passenger space than 
    a standard sedan, the Ertiga is particularly suitable when you need to travel with family members or additional luggage.
    You can book an Ertiga from <?= esc($location['location_name']); ?> for local travel, airport transfers, 
    railway station pickups, wedding travel, or outstation trips to destinations around Bangalore and Karnataka.
    The applicable fare is confirmed before booking based on your pickup location, destination, and selected trip type.
    As part of our 
    <a href="/taxi-service-in-bangalore" style="color:#007bff;">Taxi Service in Bangalore</a> 
    network, TaxiYatri provides Ertiga cab services across major Bangalore localities with verified drivers, 
    clean vehicles, and 24×7 customer support. To check the latest Ertiga fare or book an Ertiga taxi from 
    <?= esc($location['location_name']); ?>, call <strong>8377809809</strong>.
</p>
<h2>Maruti Suzuki Ertiga Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<p>Choose the Ertiga variant that suits your trip — all fully AC, verified drivers, transparent pricing.</p>

<section class="fleet-section">
    <div class="fleet-grid1"
         style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

    
        <div class="fleet-card">
            <div class="img-box">
                <img src="/images/ertiga.jpg"
                     alt="Ertiga Taxi in <?= esc($location['location_name']); ?>"
                     class="responsive-img"
                     loading="lazy">
            </div>

            <div class="fleet-content">
                <h3>Ertiga</h3>

                <div class="price-badge">From ₹13/km</div>

                <ul class="vehicle-features">
                    <li>👥 <strong>Capacity:</strong> 6 Passengers + Driver</li>
                    <li>🧳 <strong>Luggage:</strong> 2–3 Medium Bags</li>
                    <li>❄️ <strong>AC:</strong> Air Conditioned</li>
                    <li>⛽ <strong>Fuel:</strong> Petrol / CNG</li>
                    <li>✅ <strong>Best for:</strong> Family and local travel</li>
                </ul>

                <a href="https://wa.me/919818022687?text=<?= rawurlencode(
                    "Hi! I want to book an Ertiga from {$location['location_name']}. Please share fare details."
                ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="badge-vehicle">
                    <i class="fa-brands fa-whatsapp"></i> Book Ertiga
                </a>
            </div>
        </div>

        <div class="fleet-card"
             style="border: 2px solid #ffd54f; box-shadow: 0 4px 12px rgba(255,193,7,0.2); position: relative;">

            <div style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%);
                        background: #ffa803; color: #000; font-size: 11px; font-weight: 700;
                        padding: 3px 12px; border-radius: 20px; white-space: nowrap;">
                Most Popular
            </div>

            <div class="img-box">
                <img src="/images/ertiga.jpg"
                     alt="Ertiga VXi AT taxi in <?= esc($location['location_name']); ?>"
                     class="responsive-img"
                     loading="lazy">
            </div>

            <div class="fleet-content">
                <h3>Ertiga VXi AT</h3>

                <div class="price-badge">From ₹15/km</div>

                <ul class="vehicle-features">
                    <li>👥 <strong>Capacity:</strong> 6 Passengers + Driver</li>
                    <li>🧳 <strong>Luggage:</strong> 2–3 Medium Bags</li>
                    <li>❄️ <strong>AC:</strong> Rear AC Vents</li>
                    <li>🎵 <strong>Infotainment:</strong> Touchscreen</li>
                    <li>✅ <strong>Best for:</strong> Airport and outstation trips</li>
                </ul>

                <a href="https://wa.me/919818022687?text=<?= rawurlencode(
                    "Hi! I want to book an Ertiga VXi AT from {$location['location_name']}. Please share fare details."
                ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="badge-vehicle">
                    <i class="fa-brands fa-whatsapp"></i> Book Ertiga VXi AT
                </a>
            </div>
        </div>

       <div class="fleet-card">
            <div class="img-box">
                <img src="/images/ertiga.jpg"
                     alt="Ertiga ZXi Plus AT taxi in <?= esc($location['location_name']); ?>"
                     class="responsive-img"
                     loading="lazy">
            </div>

            <div class="fleet-content">
                <h3>Ertiga ZXi Plus AT</h3>

                <div class="price-badge">From ₹16/km</div>

                <ul class="vehicle-features">
                    <li>👥 <strong>Capacity:</strong> 6 Passengers + Driver</li>
                    <li>🧳 <strong>Luggage:</strong> 3 Medium Bags</li>
                    <li>❄️ <strong>AC:</strong> Automatic Climate Control</li>
                    <li>🔑 <strong>Comfort:</strong> Premium Interior</li>
                    <li>✅ <strong>Best for:</strong> Corporate and premium travel</li>
                </ul>

                <a href="https://wa.me/919818022687?text=<?= rawurlencode(
                    "Hi! I want to book an Ertiga ZXi Plus AT from {$location['location_name']}. Please share fare details."
                ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="badge-vehicle">
                    <i class="fa-brands fa-whatsapp"></i> Book Ertiga ZXi Plus AT
                </a>
            </div>
        </div>

    </div>


    <div class="info-box" style="margin-top: 20px;">
        <p>
            Need more space?
            <a href="/innova-car-rental-bangalore">
                Book an Innova
            </a>
            for larger groups or additional luggage from
            <?= esc($location['location_name']); ?>.
        </p>
    </div>

</section>
       

<h2>Ertiga Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<div class="newsList table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="seo-table">
                <th>Ertiga Taxi Service</th>
                <th>Fare</th>
                <th>Distance / Package</th>
                <th>Best For</th>
            </tr>
        </thead>

        <tbody class="seo-table">
            <tr>
                <td><strong>Local Hourly Package</strong></td>
                <td>₹2,500</td>
                <td>8 hrs / 80 km included</td>
                <td>Office visits, shopping, hospital, multiple stops</td>
            </tr>

            <tr>
                <td><strong>Local Hourly Package</strong></td>
                <td>₹3,200</td>
                <td>12 hrs / 120 km included</td>
                <td>Full-day city travel, sightseeing, long errands</td>
            </tr>

            <tr>
                <td><strong>Airport Transfer</strong></td>
                <td>₹1600</td>
                <td><?php echo esc($parentCity['airport_name']); ?></td>
                <td>Early morning flights, late-night arrivals, advance booking</td>
            </tr>

            <tr>
                <td><strong>Railway Station Transfer</strong></td>
                <td>₹1200</td>
                <td><?php echo esc($parentCity['railway_station_name']); ?></td>
                <td>Train departures, station pickup for guests</td>
            </tr>

            <tr>
                <td><strong>Outstation One Way</strong></td>
                <td>₹15/km</td>
                <td>Minimum 130 km billing</td>
                <td>Direct drop to another city, no return needed</td>
            </tr>

            <tr>
                <td><strong>Outstation Round Trip</strong></td>
                <td>₹13/km</td>
                <td>Both ways, per day minimum</td>
                <td>Weekend trips, pilgrimages, family outstation travel</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="info-box">
    <p>
        <strong>Note:</strong> For full fare breakdown including all vehicles, see our 
    <a href="/taxi-fare-in-<?= esc($location['slug']); ?>-bangalore"><?php echo esc($location['location_name']); ?> taxi fare guide</a>.
    </p>
</div>

<div style="text-align:center;margin:10px;">
<a href="tel:8377-809-809"
class="ui-btn ui-btn-primary ui-btn-lg">
<i class="fa-solid fa-phone"></i>Book Your Ride Now</a></div>

<section style="margin: 40px 0;">

    <div style="text-align: center; margin-bottom: 24px;">
        <h2 style="margin-top: 12px;">
            Ertiga Taxi Services in <?= esc($location['location_name']); ?>
        </h2>
    </div>

    <div class="usecase-tabs"
         style="display: flex; overflow-x: auto; border-bottom: 1px solid var(--color-gray-200); margin-bottom: 0; gap: 0;">

        <?php
        $usecases = [
            'airport'   => 'Airport Transfers',
            'family'    => 'Family Travel',
            'corporate' => 'Corporate Travel',
            'wedding'   => 'Wedding Travel',
            'outstation' => 'Outstation Trips',
        ];

        $first = true;

        foreach ($usecases as $key => $label):
        ?>

        <button
            class="usecase-tab-btn"
            data-tab="<?= $key ?>"
            style="
                flex-shrink: 0;
                padding: 14px 24px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.5px;
                text-transform: uppercase;
                border: none;
                border-bottom: 3px solid transparent;
                background: none;
                cursor: pointer;
                color: var(--color-text-secondary);
                transition: all 0.2s ease;
                <?= $first
                    ? 'border-bottom-color: var(--color-primary); color: var(--color-secondary);'
                    : '' ?>
            ">
            <?= esc($label) ?>
        </button>

        <?php
        $first = false;
        endforeach;
        ?>

    </div>


    <?php

    $cityName     = esc($parentCity['name'] ?? '');
    $locationName = esc($location['location_name'] ?? '');

    $airportName = esc($parentCity['airport_name'] ?? 'Bangalore Airport');
    $airportCode = esc($parentCity['airport_code'] ?? '');

    $railwayName = esc(
        $parentCity['railway_station_name'] ?? 'Bangalore railway station'
    );


    $panels = [

     

        'airport' => [

            'title' => "Ertiga Airport Taxi from {$locationName}",

            'image' => '/images/ertiga/ertiga_airport.webp',

            'alt' => "Ertiga airport taxi from {$locationName}, {$cityName}",

            'desc' =>
                "Book an Ertiga airport taxi from {$locationName} for comfortable family and group transfers to {$airportName}" .
                (!empty($airportCode) ? " ({$airportCode})" : "") .
                ". The 6-passenger MPV provides more cabin and luggage space than a standard sedan, making it suitable for families travelling with multiple bags.",

            'bullets' => [
                'Up to 6 passengers',
                '2–3 bags',
                '24×7 airport transfers',
                'Advance booking'
            ],

            'cta' => 'Book Ertiga Airport Taxi',

            'wa_text' =>
                "Hi! I want to book an Ertiga airport taxi from {$locationName} to {$airportName}. Please share the fare and availability."
        ],
        'family' => [

            'title' => "Ertiga Taxi for Family Travel in {$locationName}",

            'image' => '/images/ertiga/ertiga_family.webp',

            'alt' => "Ertiga family taxi in {$locationName}, {$cityName}",

            'desc' =>
                "An Ertiga is a practical choice for families travelling from {$locationName}. " .
                "With seating for up to 6 passengers, flexible luggage space and air conditioning, " .
                "it works well for family outings, shopping trips, hospital visits, sightseeing and local travel across {$cityName}.",

            'bullets' => [
                '6 passenger capacity',
                'Family-friendly seating',
                'Air conditioned',
                'Extra luggage space'
            ],

            'cta' => 'Book Ertiga for Family',

            'wa_text' =>
                "Hi! I want to book an Ertiga for family travel from {$locationName}. Please share the fare and availability."
        ],
        'corporate' => [

            'title' => "Ertiga Corporate Taxi in {$locationName}",

            'image' => '/images/ertiga/ertiga_corporate.webp',

            'alt' => "Ertiga corporate taxi in {$locationName}, {$cityName}",

            'desc' =>
                "Book an Ertiga for corporate travel from {$locationName} for team transfers, client visits, office travel, conferences and business meetings. " .
                "Its larger seating capacity makes it useful when several employees need to travel together.",

            'bullets' => [
                'Up to 6 passengers',
                'Professional drivers',
                'Multiple-stop travel',
                'Corporate billing available'
            ],

            'cta' => 'Book Corporate Ertiga',

            'wa_text' =>
                "Hi! I want to book an Ertiga for corporate travel from {$locationName}. Please share the fare and availability."
        ],


        'wedding' => [

            'title' => "Ertiga Wedding Taxi from {$locationName}",

            'image' => '/images/ertiga/ertiga_wedding.webp',

            'alt' => "Ertiga wedding taxi from {$locationName}, {$cityName}",

            'desc' =>
                "Use an Ertiga for wedding guest transfers, family transportation, venue transfers and multiple trips during wedding functions in {$locationName} and across {$cityName}. " .
                "The larger cabin is suitable for small groups travelling together.",

            'bullets' => [
                'Up to 6 passengers',
                'Wedding guest transfers',
                'Multiple bookings',
                'Advance scheduling'
            ],

            'cta' => 'Book Ertiga for Wedding',

            'wa_text' =>
                "Hi! I want to book an Ertiga for wedding travel from {$locationName}. Please share the available packages."
        ],

        'outstation' => [

            'title' => "Ertiga Outstation Taxi from {$locationName}",

            'image' => '/images/ertiga/ertiga_vacation.webp',

            'alt' => "Ertiga outstation taxi from {$locationName}, {$cityName}",

            'desc' =>
                "Travel from {$locationName} to nearby cities and tourist destinations in an Ertiga. " .
                "The MPV is particularly useful for families and small groups who need more seating and luggage capacity than a sedan. " .
                "One-way and round-trip bookings are available.",

            'bullets' => [
                'One-way & round trips',
                'Up to 6 passengers',
                'Highway-friendly MPV',
                'More luggage capacity'
            ],

            'cta' => 'Book Ertiga Outstation Taxi',

            'wa_text' =>
                "Hi! I want to book an Ertiga outstation taxi from {$locationName}. Please share the fare and available destinations."
        ],

    ];

    ?>
    <?php

    $first = true;

    foreach ($panels as $key => $panel):

    ?>

    <div
        class="usecase-panel"
        id="panel-<?= esc($key) ?>"
        style="
            display: <?= $first ? 'grid' : 'none' ?>;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            padding: 40px 0;
            border-bottom: 1px solid var(--color-gray-100);
        ">
<div>
            <img
                src="<?= esc($panel['image']) ?>"
                alt="<?= esc($panel['alt']) ?>"
                loading="lazy"
                decoding="async"
                style="
                    width: 100%;
                    border-radius: 12px;
                    object-fit: cover;
                    max-height: 380px;
                ">

        </div>

        <div>

            <h3 style="
                font-size: 1.8rem;
                font-weight: 700;
                margin-bottom: 16px;
            ">
                <?= esc($panel['title']) ?>
            </h3>


            <p style="
                color: var(--color-text-secondary);
                line-height: 1.7;
                margin-bottom: 24px;
            ">
                <?= esc($panel['desc']) ?>
            </p>


            <!-- Features -->

            <div style="
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
                margin-bottom: 28px;
            ">

                <?php foreach ($panel['bullets'] as $bullet): ?>

                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        border: 1px solid var(--color-gray-200);
                        border-radius: 8px;
                        padding: 10px 14px;
                        font-size: 14px;
                        font-weight: 500;
                        background: var(--color-white);
                    ">

                        <span style="
                            width: 22px;
                            height: 22px;
                            background: #e8f5e9;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 12px;
                            color: #2e7d32;
                            flex-shrink: 0;
                        ">
                            ✓
                        </span>

                        <?= esc($bullet) ?>

                    </div>

                <?php endforeach; ?>

            </div>


            <!-- CTA -->

            <a
                href="https://wa.me/919818022687?text=<?= rawurlencode($panel['wa_text']) ?>"
                target="_blank"
                rel="noopener noreferrer"
                style="
                    display: inline-block;
                    background: var(--color-secondary);
                    color: var(--color-white);
                    padding: 14px 28px;
                    border-radius: 8px;
                    font-size: 15px;
                    font-weight: 600;
                    text-decoration: none;
                    transition: opacity 0.2s;
                "
            >
                <?= esc($panel['cta']) ?>
            </a>

        </div>

    </div>

    <?php

    $first = false;

    endforeach;

    ?>

</section>
<h2>Ertiga Seating & Luggage Configuration from 
<?= esc($location['location_name']); ?></h2>

<div class="newsList table-responsive">
<table class="table table-bordered">
    <thead>
        <tr class="seo-table">
            <th>Configuration</th>
            <th>Passengers</th>
            <th>Luggage Space</th>
            <th>Best For</th>
        </tr>
    </thead>
    <tbody class="seo-table">
        <tr>
            <td><strong>All 3 rows up</strong></td>
            <td>6 passengers</td>
            <td>Minimal — overhead only</td>
            <td>Short local trips, no heavy luggage</td>
        </tr>
        <tr>
            <td><strong>Row 3 folded</strong></td>
            <td>4 passengers</td>
            <td>Large — 4–5 bags</td>
            <td>Airport transfers with heavy luggage</td>
        </tr>
        <tr>
            <td><strong>Rows 2 & 3 folded</strong></td>
            <td>2 passengers</td>
            <td>Maximum — cargo mode</td>
            <td>Moving, large equipment transport</td>
        </tr>
    </tbody>
</table>
</div>

<p class="info-box" style="margin-top: 20px;">
    Seating configuration can be arranged before pickup. 
    Inform us at booking if you need specific luggage space.
</p>

<section class="vehicle-comparison" style="margin: 40px 0;">

    <h2>Ertiga vs Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

    <p>
        Not sure whether to book an Ertiga or <a href="/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>">Dzire from
        <?= esc($location['location_name']); ?></a> ? Compare passenger capacity,
        luggage space, comfort, and ideal use cases before booking.
    </p>

    <div class="newsList table-responsive" style="margin-top: 20px;">

        <table class="table table-bordered">

            <thead>
                <tr class="seo-table">
                    <th >
                        Feature
                    </th>

                    <th>
                        Ertiga
                    </th>

                    <th>
                        Dzire
                    </th>
                </tr>
            </thead>

            <tbody class="seo-table">

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Vehicle type</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        MPV
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Sedan
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Passenger capacity</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        6 passengers + driver
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        4 passengers + driver
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Seating</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        3-row seating
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        2-row seating
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Luggage</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        2–3 medium bags*
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        2 medium bags*
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Fuel options</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Petrol / CNG
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Petrol / CNG
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Air conditioning</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Yes
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Yes
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Cabin space</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        More spacious
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Compact
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Best for</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Families and small groups
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Couples and small families
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Airport travel</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Excellent for groups
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Good for 1–4 passengers
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        <strong>Outstation travel</strong>
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Ideal for families and groups
                    </td>
                    <td style="padding: 14px; border-bottom: 1px solid var(--color-gray-200);">
                        Ideal for smaller groups
                    </td>
                </tr>

                <tr>
                    <td style="padding: 14px;">
                        <strong>Choose when</strong>
                    </td>
                    <td style="padding: 14px;">
                        You need more seats and space
                    </td>
                    <td style="padding: 14px;">
                        You want a smaller, economical car
                    </td>
                </tr>

            </tbody>

        </table>

    </div>
</section>

<h2>Ertiga Taxi Services in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<h3>Local Ertiga Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>
<p>
   Book a spacious and comfortable Ertiga taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>
for family travel, airport transfers, office trips, shopping, local sightseeing, and outstation journeys.
The Maruti Suzuki Ertiga offers seating for up to 6 passengers with three-row seating and useful luggage space,
making it a practical choice for families, small groups, and travellers carrying more luggage.
</p>


<h3>Outstation Ertiga Taxi from <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>

<p>
Travel from <?= esc($location['location_name']); ?> to nearby cities with transparent fares, verified drivers, and comfortable cabs. Browse estimated starting fares for some of the most popular outstation routes.
</p>

<div class="newsList table-responsive">

<table class="table table-bordered">

<thead>
<tr class="seo-table">
    <th>Ertiga Cabs from <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></th>
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
    <td>Starting from ₹<?php echo number_format($fare=((145*15)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Ertiga from {$location['location_name']}. Please share the fare details." ); ?>
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
    <td>Starting from ₹<?php echo number_format($fare=((265*15)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Ertiga from {$location['location_name']}. Please share the fare details."
); ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="button-txy">
    Book Now
</a></td>
</tr>

<tr>
    <td><a href="https://www.taxiyatri.com/bangalore-to-ooty-cab-service" target="_blank" rel="noopener noreferrer">Bangalore → Ooty</a></td>
    <td>270 km</td>
    <td>5 hrs</td>
    <td>Starting from ₹<?php echo number_format($fare=((270*15)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Ertiga from {$location['location_name']}. Please share the fare details."
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
    <td>Starting from ₹<?php echo number_format($fare=((245*15)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Ertiga from {$location['location_name']}. Please share the fare details."
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
    <td>Starting from ₹<?php echo number_format($fare=((42*15)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Ertiga from {$location['location_name']}. Please share the fare details."); ?>"
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
    <td>Starting from ₹<?php echo number_format($fare=((38*15)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Ertiga from {$location['location_name']}. Please share the fare details."
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

<h2>Popular Pickup Locations in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="seo-table">
<th colspan="3">Popular Pickup Locations Near <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></th>
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
    <td><a href="/ertiga-taxi-in-<?= esc($chunks[0][$i]['slug'] ?? ''); ?>-<?= esc($parentCity['slug']); ?>"><?= esc($chunks[0][$i]['location_name'] ?? ''); ?></a></td>
    <td><a href="/ertiga-taxi-in-<?= esc($chunks[1][$i]['slug'] ?? ''); ?>-<?= esc($parentCity['slug']); ?>"><?= esc($chunks[1][$i]['location_name'] ?? ''); ?></a></td>
    <td><a href="/ertiga-taxi-in-<?= esc($chunks[2][$i]['slug'] ?? ''); ?>-<?= esc($parentCity['slug']); ?>"><?= esc($chunks[2][$i]['location_name'] ?? ''); ?></a></td>
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
TaxiYatri provides reliable <a href="/taxi-service-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>">taxi service across <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></a> and nearby areas, covering major locations, residential areas, railway stations, airports, and popular destinations.
</p></div>

<div style="text-align:center;margin:20px;">

<a href="tel:8377-809-809" class="ui-btn ui-btn-primary ui-btn-lg">

Book Your Ride Now

</a>

</div>

<?php include 'components/book.php'; ?>

<?php include 'components/testimonial.php'; ?>

<?php include 'components/why_choose_us.php'; ?>
            
            </div>

<section class="routes-section">

    <div class="routes-header">
       <h2>Nearby  Ertiga Taxi Service Areas Around <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

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
                <a href="/ertiga-taxi-in-<?= esc($area['slug']); ?>-<?= esc($parentCity['slug']); ?>">
                     Ertiga cab  in <?= esc($area['location_name']); ?>
                </a>
            </li>
        </ul>
    </div>

<?php endforeach; ?>

    </div>

</section>

<section class="faq-section">

<h2>

Frequently Asked Questions About Ertiga Taxi in 

<?= $location['location_name']; ?>

</h2>

<?php foreach ($ertiga_faqs as $faq): ?>

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
<script>
document.querySelectorAll('.usecase-tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {

        // Reset all tabs
        document.querySelectorAll('.usecase-tab-btn').forEach(b => {
            b.style.borderBottomColor = 'transparent';
            b.style.color = 'var(--color-text-secondary)';
        });

        // Hide all panels
        document.querySelectorAll('.usecase-panel').forEach(p => {
            p.style.display = 'none';
        });

        // Activate clicked tab
        this.style.borderBottomColor = 'var(--color-primary)';
        this.style.color = 'var(--color-secondary)';

        // Show corresponding panel
        const panel = document.getElementById('panel-' + this.dataset.tab);
        if (panel) panel.style.display = 'grid';
    });
});
</script>

<?php include 'layout/footer.php'; ?>

</body>

</html>

