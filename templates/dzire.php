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
require_once __DIR__ . '/../includes/dzire_faq.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="canonical" href="https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>" />

<title>Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> – Book Swift Dzire @ ₹10/km | TaxiYatri</title>
<meta
    name="description"
    content="Book reliable taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Local, outstation, airport transfers, railway station pickup, one-way and round-trip cabs at affordable fares.">

<meta
    name="keywords"
    content="Taxi Service in <?= esc($location['location_name']); ?>, Taxi in <?= esc($location['location_name']); ?>, Cab Service in <?= esc($location['location_name']); ?>, Airport Taxi <?= esc($location['location_name']); ?>, Outstation Taxi <?= esc($location['location_name']); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> | TaxiYatri">
<meta property="og:description" content="Book Swift Dzire cab in <?= esc($location['location_name']); ?> for local, airport, and outstation travel. Fixed fares from ₹10/km. Call 8377809809.">
<meta property="og:image" content="images/taxiyatri_bg.webp">
<meta property="og:url" content="https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>">
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
  "@id": "https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#business",
  "name": "TaxiYatri - Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "url": "https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "image": "https://www.taxiyatri.com/images/taxiyatri_bg.webp",
  "logo": "https://www.taxiyatri.com/images/logo.png",
  "telephone": "+91-8377809809",
  "description": "Book Dzire taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. We provide local Dzire, airport transfers, railway station pickups and outstation cabs at transparent prices.",
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
  "@id":"https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>#webpage",
  "url":"https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>",
  "name":"Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> | TaxiYatri",
  "headline":"Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>",
  "description":"Book Dzire taxi service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> with TaxiYatri. Reliable local, airport, railway station and outstation Dzire taxi services.",
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
      "name":"Dzire Taxi in <?= esc($parentCity['name']); ?>",
      "item":"https://www.taxiyatri.com/dzire-taxi-in-<?= esc($parentCity['slug']); ?>"
    },
    {
      "@type":"ListItem",
      "position":3,
      "name":"Dzire Taxi in <?= esc($location['location_name']); ?>",
      "item":"https://www.taxiyatri.com/dzire-taxi-in-<?= esc($location['slug']); ?>-<?= esc($parentCity['slug']); ?>"
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
                <a href="/dzire-taxi-in-<?= esc($location['slug']);?>-<?= esc($parentCity['slug']); ?>">Dzire Taxi in <?= esc($location['location_name']); ?></a>
            </div>

<?php include 'components/menu.php'; ?>

<div class="seo-content">

<h1>Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?> – Fixed Fares from ₹10/km, 24/7 Booking</h1>

<p>
TaxiYatri makes booking a <?= esc($location['location_name']); ?> to Bangalore Dzire taxi simple, transparent, and affordable. Our Maruti Suzuki Dzire is a practical choice for up to 4 passengers, making it suitable for couples, small families, business travellers, and budget-conscious journeys. You can book a Dzire for local travel, airport transfers, railway station pickups, or outstation trips from <?= esc($location['location_name']); ?>. Fares are calculated upfront based on the selected journey, with applicable charges clearly communicated before booking. As part of our <a href="/taxi-service-in-bangalore" style="color:#007bff;">Taxi Service in Bangalore</a> network, TaxiYatri provides Dzire cab services across major Bangalore localities with verified drivers, clean vehicles, and 24×7 customer support. To check the latest Dzire fare or book your ride, call <strong>8377809809</strong>.
</p>
<h2>Maruti Suzuki Dzire Taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<p>Choose the Dzire variant that suits your trip — all fully AC, verified drivers, transparent pricing.</p>

<section class="fleet-section">
    <div class="fleet-grid1" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

        <!-- Dzire Tour S -->
        <div class="fleet-card">
            <div class="img-box">
                <img src="/images/dzire.png" 
                     alt="Swift Dzire Tour S taxi in <?= esc($location['location_name']); ?>" 
                     class="responsive-img" loading="lazy">
            </div>
            <div class="fleet-content">
                <h3>Dzire Tour S</h3>
                <div class="price-badge">₹10/km</div>
                <ul class="vehicle-features">
                    <li>👥 <strong>Capacity:</strong> 4 Passengers</li>
                    <li>🧳 <strong>Luggage:</strong> 2 Bags</li>
                    <li>❄️ <strong>AC:</strong> Air Conditioned</li>
                    <li>⛽ <strong>Fuel:</strong> CNG / Petrol</li>
                    <li>✅ <strong>Best for:</strong> Budget local trips</li>
                </ul>
                <a href="https://wa.me/919818022687?text=<?= rawurlencode(
                    "Hi! I want to book a Dzire Tour S from {$location['location_name']}. Please share fare details."
                ); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="badge-vehicle">
                    <i class="fa-brands fa-whatsapp"></i> Book Dzire Tour S
                </a>
            </div>
        </div>

        <!-- Dzire LXi — highlighted as popular -->
        <div class="fleet-card" style="border: 2px solid #ffd54f; box-shadow: 0 4px 12px rgba(255,193,7,0.2); position: relative;">
            <div style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background: #ffa803; color: #000; font-size: 11px; font-weight: 700; padding: 3px 12px; border-radius: 20px; white-space: nowrap;">
                Most Popular
            </div>
            <div class="img-box">
                <img src="/images/dzire.png" 
                     alt="Swift Dzire LXi taxi in <?= esc($location['location_name']); ?>" 
                     class="responsive-img" loading="lazy">
            </div>
            <div class="fleet-content">
                <h3>Dzire LXi</h3>
                <div class="price-badge">₹11/km</div>
                <ul class="vehicle-features">
                    <li>👥 <strong>Capacity:</strong> 4 Passengers</li>
                    <li>🧳 <strong>Luggage:</strong> 2–3 Bags</li>
                    <li>❄️ <strong>AC:</strong> Rear AC Vents</li>
                    <li>🎵 <strong>Infotainment:</strong> Touchscreen</li>
                    <li>✅ <strong>Best for:</strong> Airport, outstation</li>
                </ul>
                <a href="https://wa.me/919818022687?text=<?= rawurlencode(
                    "Hi! I want to book a Dzire LXi from {$location['location_name']}. Please share fare details."
                ); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="badge-vehicle">
                    <i class="fa-brands fa-whatsapp"></i> Book Dzire LXi
                </a>
            </div>
        </div>

        <!-- Dzire VXi -->
        <div class="fleet-card">
            <div class="img-box">
                <img src="/images/dzire.png" 
                     alt="Swift Dzire VXi taxi in <?= esc($location['location_name']); ?>" 
                     class="responsive-img" loading="lazy">
            </div>
            <div class="fleet-content">
                <h3>Dzire VXi</h3>
                <div class="price-badge">₹12/km</div>
                <ul class="vehicle-features">
                    <li>👥 <strong>Capacity:</strong> 4 Passengers</li>
                    <li>🧳 <strong>Luggage:</strong> 3 Bags</li>
                    <li>❄️ <strong>AC:</strong> Auto Climate Control</li>
                    <li>🔑 <strong>Start:</strong> Push Button</li>
                    <li>✅ <strong>Best for:</strong> Corporate, premium trips</li>
                </ul>
                <a href="https://wa.me/919818022687?text=<?= rawurlencode(
                    "Hi! I want to book a Dzire VXi from {$location['location_name']}. Please share fare details."
                ); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="badge-vehicle">
                    <i class="fa-brands fa-whatsapp"></i> Book Dzire VXi
                </a>
            </div>
        </div>

    </div>

    <div class="info-box" style="margin-top: 20px;">
        <p>Need more space? 
            <a href="/innova-car-rental-bangalore">Book an Innova</a> for 7 passengers or an 
            <a href="/suv-car-rental-in-bangalore">SUV (Ertiga)</a> for family groups from <?= esc($location['location_name']); ?>.
        </p>
    </div>

</section>
       

<h2>Dzire Taxi Fare in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<div class="newsList table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="seo-table">
                <th>Dzire Taxi Service</th>
                <th>Fare</th>
                <th>Distance / Package</th>
                <th>Best For</th>
            </tr>
        </thead>

        <tbody class="seo-table">
            <tr>
                <td><strong>Local Hourly Package</strong></td>
                <td>₹1,950</td>
                <td>8 hrs / 80 km included</td>
                <td>Office visits, shopping, hospital, multiple stops</td>
            </tr>

            <tr>
                <td><strong>Local Hourly Package</strong></td>
                <td>₹2,200</td>
                <td>12 hrs / 120 km included</td>
                <td>Full-day city travel, sightseeing, long errands</td>
            </tr>

            <tr>
                <td><strong>Airport Transfer</strong></td>
                <td>₹1200</td>
                <td><?php echo esc($parentCity['airport_name']); ?></td>
                <td>Early morning flights, late-night arrivals, advance booking</td>
            </tr>

            <tr>
                <td><strong>Railway Station Transfer</strong></td>
                <td>₹900</td>
                <td><?php echo esc($parentCity['railway_station_name']); ?></td>
                <td>Train departures, station pickup for guests</td>
            </tr>

            <tr>
                <td><strong>Outstation One Way</strong></td>
                <td>₹11/km</td>
                <td>Minimum 130 km billing</td>
                <td>Direct drop to another city, no return needed</td>
            </tr>

            <tr>
                <td><strong>Outstation Round Trip</strong></td>
                <td>₹10/km</td>
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

<a
href="tel:8377-809-809"
class="ui-btn ui-btn-primary ui-btn-lg">

<i class="fa-solid fa-phone"></i>

Book Your Ride Now

</a>

</div>


<section style="margin: 40px 0;">

    <div style="text-align: center; margin-bottom: 24px;">
        
        <h2 style="margin-top: 12px;">
            Popular Dzire Rental Use Cases in <?= esc($location['location_name']); ?>
        </h2>
    </div>

    <!-- Tab Buttons -->
    <div class="usecase-tabs" style="display: flex; overflow-x: auto; border-bottom: 1px solid var(--color-gray-200); margin-bottom: 0; gap: 0;">
        <?php
        $usecases = [
            'airport'   => 'Airport Transfers',
            'wedding'   => 'Wedding Travel',
            'corporate' => 'Corporate Travel',
            'vacation'  => 'Vacations',
            'hill'      => 'Hill Station',
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
                <?= $first ? 'border-bottom-color: var(--color-primary); color: var(--color-secondary);' : '' ?>
            ">
            <?= $label ?>
        </button>
        <?php $first = false; endforeach; ?>
    </div>

    <?php
    $panels = [
        'airport' => [
            'title'   => 'Airport Transfers',
            'image'   => 'images/dzire/dzire_airport.webp',
            'alt'     => 'Dzire airport taxi from ' . esc($location['location_name']),
            'desc'    => 'Reliable Dzire airport pickup and drop between ' . esc($location['location_name']) . ' and ' . esc($parentCity['airport_name']) . '. Professional drivers track flight timings and ensure timely pickups with enough boot space for family luggage.',
            'bullets' => ['24×7 Service', 'Flight Tracking', '45 Min Free Waiting', 'Advance Booking'],
            'cta'     => 'Book Airport Transfer',
            'wa_text' => "Hi! I want to book a Dzire airport taxi from {$location['location_name']} to {$parentCity['airport_name']}. Please share fare details.",
        ],
        'wedding' => [
            'title'   => 'Wedding Travel',
            'image'   => 'images/dzire/dzire_wedding.webp',
            'alt'     => 'Dzire wedding cab from ' . esc($location['location_name']),
            'desc'    => 'Book a clean, decorated Dzire for wedding functions, guest transfers, and baraat travel in ' . esc($location['location_name']) . '. Reliable and punctual for your most important occasions.',
            'bullets' => ['Decorated on Request', 'Punctual Pickup', 'Multiple Bookings', 'GST Invoice'],
            'cta'     => 'Book for Wedding',
            'wa_text' => "Hi! I want to book a Dzire for a wedding from {$location['location_name']}. Please share details.",
        ],
        'corporate' => [
            'title'   => 'Corporate Travel',
            'image'   => 'images/dzire/dzire_corporate.webp',
            'alt'     => 'Dzire corporate cab from ' . esc($location['location_name']),
            'desc'    => 'Professional Dzire transport for business meetings, client visits, conferences, and executive travel from ' . esc($location['location_name']) . '. GST invoice provided for all corporate bookings.',
            'bullets' => ['Executive Service', 'GST Invoice', 'Professional Drivers', 'Monthly Packages'],
            'cta'     => 'Book Corporate Travel',
            'wa_text' => "Hi! I want to book a Dzire for corporate travel from {$location['location_name']}. Please share details.",
        ],
        'vacation' => [
            'title'   => 'Vacations',
            'image'   => 'images/dzire/dzire_vacation.webp',
            'alt'     => 'Dzire outstation vacation cab from ' . esc($location['location_name']),
            'desc'    => 'Plan weekend getaways and holiday trips from ' . esc($location['location_name']) . ' in a comfortable Dzire. Popular routes include Mysore, Coorg, Ooty, Chikmagalur, and Hosur.',
            'bullets' => ['One Way & Round Trip', 'Experienced Drivers', 'Highway Comfort', 'Transparent Fares'],
            'cta'     => 'Book Vacation Cab',
            'wa_text' => "Hi! I want to book a Dzire for an outstation vacation from {$location['location_name']}. Please share details.",
        ],
        'hill' => [
            'title'   => 'Hill Station',
            'image'   => 'images/dzire/dzire_hill.webp',
            'alt'     => 'Dzire hill station cab from ' . esc($location['location_name']),
            'desc'    => 'Travel from ' . esc($location['location_name']) . ' to Nandi Hills, Ooty, Coorg, and Chikmagalur in a well-maintained Dzire. Our drivers are experienced on ghat roads and mountain terrain.',
            'bullets' => ['Ghat Road Experience', 'AC Comfort', 'Boot Space for Bags', 'Advance Booking'],
            'cta'     => 'Book Hill Station Cab',
            'wa_text' => "Hi! I want to book a Dzire for a hill station trip from {$location['location_name']}. Please share details.",
        ],
    ];
    ?>

    <?php $first = true; foreach ($panels as $key => $panel): ?>
    <div
        class="usecase-panel"
        id="panel-<?= $key ?>"
        style="
            display: <?= $first ? 'grid' : 'none' ?>;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            padding: 40px 0;
            border-bottom: 1px solid var(--color-gray-100);
        ">

        <!-- Image -->
        <div>
            <img
                src="<?= $panel['image'] ?>"
                alt="<?= $panel['alt'] ?>"
                loading="lazy"
                style="width: 100%; border-radius: 12px; object-fit: cover; max-height: 380px;">
        </div>

        <!-- Content -->
        <div>
            <h3 style="font-size: 1.8rem; font-weight: 700; margin-bottom: 16px;">
                <?= $panel['title'] ?>
            </h3>

            <p style="color: var(--color-text-secondary); line-height: 1.7; margin-bottom: 24px;">
                <?= $panel['desc'] ?>
            </p>

            <!-- Feature bullets -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 28px;">
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
                        width: 22px; height: 22px;
                        background: #e8f5e9;
                        border-radius: 50%;
                        display: flex; align-items: center; justify-content: center;
                        font-size: 12px; color: #2e7d32; flex-shrink: 0;
                    ">✓</span>
                    <?= htmlspecialchars($bullet) ?>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- CTA -->
            <a href="https://wa.me/919818022687?text=<?= rawurlencode($panel['wa_text']) ?>"
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
               ">
                <?= htmlspecialchars($panel['cta']) ?>
            </a>
        </div>

    </div>
    <?php $first = false; endforeach; ?>

</section>

<h2>Dzire Taxi Services in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

<h3>Local Dzire Taxi Service in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>
<p>
    Book a comfortable Dzire taxi in <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?>
    for daily travel, office trips, shopping, local sightseeing, and short-distance transfers.
    The Dzire is suitable for up to 4 passengers with a practical amount of luggage and is a convenient
    option for individuals, couples, and small families.
</p>


<h3>Outstation Dzire Taxi from <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h3>

<p>
Travel from <?= esc($location['location_name']); ?> to nearby cities with transparent fares, verified drivers, and comfortable cabs. Browse estimated starting fares for some of the most popular outstation routes.
</p>

<div class="newsList table-responsive">

<table class="table table-bordered">

<thead>
<tr class="seo-table">
    <th>Dzire Cabs from <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></th>
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
    "Hi! I would like to book a Dzire from {$location['location_name']}. Please share the fare details." ); ?>"
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
    "Hi! I would like to book a Dzire from {$location['location_name']}. Please share the fare details."
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
    <td>Starting from ₹<?php echo number_format($fare=((270*10)*1.5)+500); ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=919818022687&text=<?= rawurlencode(
    "Hi! I would like to book a Dzire from {$location['location_name']}. Please share the fare details."
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
    "Hi! I would like to book a Dzire from {$location['location_name']}. Please share the fare details."
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
    "Hi! I would like to book a Dzire from {$location['location_name']}. Please share the fare details."
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
    "Hi! I would like to book a Dzire from {$location['location_name']}. Please share the fare details."
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
    <td><a href="/dzire-taxi-in-<?= esc($chunks[0][$i]['slug'] ?? ''); ?>-<?= esc($parentCity['slug']); ?>"><?= esc($chunks[0][$i]['location_name'] ?? ''); ?></a></td>
    <td><a href="/dzire-taxi-in-<?= esc($chunks[1][$i]['slug'] ?? ''); ?>-<?= esc($parentCity['slug']); ?>"><?= esc($chunks[1][$i]['location_name'] ?? ''); ?></a></td>
    <td><a href="/dzire-taxi-in-<?= esc($chunks[2][$i]['slug'] ?? ''); ?>-<?= esc($parentCity['slug']); ?>"><?= esc($chunks[2][$i]['location_name'] ?? ''); ?></a></td>
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
       <h2>Nearby  Dzire Taxi Service Areas Around <?= esc($location['location_name']); ?>, <?= esc($parentCity['name']); ?></h2>

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
                <a href="/dzire-taxi-in-<?= esc($area['slug']); ?>-<?= esc($parentCity['slug']); ?>">
                     Dzire cab  in <?= esc($area['location_name']); ?>
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

<?php foreach ($dzire_faqs as $faq): ?>

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

