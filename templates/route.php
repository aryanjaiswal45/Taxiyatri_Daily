 <?php

require_once 'includes/db.php';
require_once 'includes/functions.php';



$fromSlug = $fromSlug ?? '';
$toSlug   = $toSlug ?? '';

$route = getRoute($fromSlug, $toSlug);
$origin = getCityBySlug($fromSlug);
$destination = getCityBySlug($toSlug);

if (!$route || !$origin || !$destination) {
    redirectHome();
}

/*
|--------------------------------------------------------------------------
| Fetch Dynamic Data using your specific functions
|--------------------------------------------------------------------------
*/
$pricing      = getPricing(); 
$pickupAreas  = getAreas($origin['id']);
$dropAreas    = getAreas($destination['id']);
$nearbyRoutes = getRoutesFromCity($origin['id']);
$travelTips   = getTravelTips($destination['id']); // Using destination tips for the travel guide
$faqs         = getFaqs($destination); // Using destination FAQs
$cityFacts = getCityFacts($destination['id']);
require_once __DIR__ . '/../includes/route_faqs.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<link rel="canonical" href="https://www.taxiyatri.com/<?= esc($origin['slug']); ?>-to-<?= esc($destination['slug']); ?>-taxi" />

<title><?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> Taxi | Cab Fare, Distance & Time</title>

<meta name="description" content="Book <?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> taxi. Compare fares, check distance (<?= esc($route['distance']); ?> km), and book one-way or round-trip cabs. Reliable drivers and transparent pricing.">
<meta name="keywords" content="<?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> taxi, <?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> cab fare, one way taxi <?= esc($origin['name']); ?> to <?= esc($destination['name']); ?>">
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/cssmenu/script.min.js"></script>

<script defer>
(function(w,d,s,l,i){
w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TGSJ3JJ');
</script>

<script type="application/ld+json">
{
    "@context":"https://schema.org",
    "@type":"WebPage",
    "@id":"https://www.taxiyatri.com/<?= $origin['slug']; ?>-to-<?= $destination['slug']; ?>-taxi#webpage",
    "url":"https://www.taxiyatri.com/<?= $origin['slug']; ?>-to-<?= $destination['slug']; ?>-taxi",
    "name":"<?= $origin['name']; ?> to <?= $destination['name']; ?> Taxi",
    "description":"Book <?= $origin['name']; ?> to <?= $destination['name']; ?> taxi with TaxiYatri. Affordable one-way and round-trip cab service.",
    "inLanguage":"en-IN",
    "mainEntity":{
        "@id":"https://www.taxiyatri.com/<?= $origin['slug']; ?>-to-<?= $destination['slug']; ?>-taxi#service"
    }
}
</script>


<script type="application/ld+json">
{
    "@context":"https://schema.org",
    "@type":"Service",

    "@id":"https://www.taxiyatri.com/<?= $origin['slug']; ?>-to-<?= $destination['slug']; ?>-taxi#service",

    "name":"<?= $origin['name']; ?> to <?= $destination['name']; ?> Taxi Service",

    "serviceType":"Taxi Service",

    "provider":{
        "@type":"Organization",
        "name":"TaxiYatri",
        "url":"https://www.taxiyatri.com",
        "telephone":"+91-8377809809"
    },

    "areaServed":[
        {
            "@type":"City",
            "name":"<?= $origin['name']; ?>"
        },
        {
            "@type":"City",
            "name":"<?= $destination['name']; ?>"
        }
    ],

    "description":"Travel from <?= $origin['name']; ?> to <?= $destination['name']; ?> with TaxiYatri. Distance <?= $route['distance']; ?> km. Estimated travel time <?= $route['duration']; ?>.",

    "offers":{
        "@type":"AggregateOffer",
        "priceCurrency":"INR",
        "offerCount":"<?= count($pricing); ?>"
    },

    "hasOfferCatalog":{
        "@type":"OfferCatalog",
        "name":"Available Taxi Categories",
        "itemListElement":[

<?php foreach($pricing as $i => $vehicle): ?>

        {
            "@type":"OfferCatalog",
            "name":"<?= $vehicle['vehicle_type']; ?> Taxi"
        }<?= $i < count($pricing)-1 ? ',' : ''; ?>

<?php endforeach; ?>

        ]
    }
}
</script>

</head>
<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGSJ3JJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<?php include 'layout/navbar.php'; ?>

<div class="main_col_wrap paddingzero">
    <img src="images/taxiyatri_bg.webp" class="hide-class" alt="<?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> Taxi" width="100%" height="521">
    <div class="main_inn_col_wrap positionabsolute">
        <div class="crs_ibe_box">
            <iframe 
                scrolling="no" 
                frameborder="0" 
                class="iframeibebox" 
                src="https://taxiyatri.easyets.com/blankdefault.aspx?Tab=1&OutFrom=<?= urlencode($origin['name']); ?>&outto=<?= urlencode($destination['name']); ?>&IsOneWay=1">
            </iframe>
        </div>
    </div>
</div>

<div class="outer-wrapper">
    <div class="inner-wrapper">
        <div class="seo-content">
            <div class="p-sm mb-sm rounded-sm text-secondary font-medium">
                <a href="/">Home</a> » 
                <a href="/taxi-service-in-<?= esc($origin['slug']); ?>"><?= esc($origin['name']); ?></a> » 
                <?= esc($origin['name']); ?> to <?= esc($destination['name']); ?>
            </div>

            <?php include 'components/menu.php'; ?>

            <h1><?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> Taxi | One Way & Round Trip Cab Booking</h1>

            <div class="route-stats-grid gap-md mt-md mb-md  p-sm rounded-md text-center">
                <div class="flex flex-column items-center">
                    <i class="fa-solid fa-road text-primary fa-2x mb-xs"></i>
                    <span class="visible text-secondary font-medium">Distance</span>
                    <strong class="font-bold"><?= esc($route['distance']); ?> KM</strong>
                </div>
                <div class="flex flex-column items-center">
                    <i class="fa-solid fa-clock text-primary fa-2x mb-xs"></i>
                    <span class="visible text-secondary font-medium">Duration</span>
                    <strong class="font-bold"><?= esc($route['duration']); ?></strong>
                </div>
                <div class="flex flex-column items-center">
                    <i class="fa-solid fa-indian-rupee-sign text-primary fa-2x mb-xs"></i>
                    <span class="visible text-secondary font-medium">Fare Starts</span>
                    <strong class="font-bold">₹<?= esc($pricing[0]['round_trip_price'] ?? '10'); ?>/km</strong>
                </div>
                <div class="flex flex-column items-center">
                    <i class="fa-solid fa-car text-primary fa-2x mb-xs"></i>
                    <span class="visible text-secondary font-medium">Availability</span>
                    <strong class="font-bold">24×7</strong>
                </div>
            </div>

            <p>
                Booking a <strong><?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> taxi</strong> is seamless with TaxiYatri. 
                Covering a distance of approximately <strong><?= esc($route['distance']); ?> km</strong>, 
                the journey takes about <strong><?= esc($route['duration']); ?></strong>. We offer sanitized hatchbacks, sedans, and SUVs 
                for both one-way drops and round-trip journeys.
            </p>

            <h2><?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> Taxi Fare & Cab Pricing</h2>

            <p>
                TaxiYatri offers reliable taxi services from <?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> for business trips, family travel, airport transfers, and one-way drops. Covering approximately <strong><?= esc($route['distance']); ?> km</strong> in around <strong><?= esc($route['duration']); ?></strong>, this route is among the most frequently booked in Uttar Pradesh. We provide hatchbacks, sedans, SUVs, Innova, Crysta, and Tempo Travellers at transparent prices with professional drivers.
            </p>
            <?php include 'components/vehicle.php'; ?>

            

            <h3>Round-Trip Taxi Fare</h3>

           <div class="newsList table-responsive">

<table class="table table-bordered">
                    <thead>
                        <tr class="seo-table">
                            <th>Vehicle</th>
                            <th>Rate (₹/Km)</th>
                            <th>Estimated Fare</th>
                            <th>Book Now</th>
                        </tr>
                    </thead>

                    <tbody class="seo-table">
                    <?php foreach($pricing as $vehicle):

                       
                        $roundTripFare = (($route['distance'] * 2) * $vehicle['round_trip_price']) + 250;?>
                        <tr>
                            <td><strong><?= esc($vehicle['vehicle_type']); ?></strong></td>
                            <td>₹<?= esc($vehicle['round_trip_price']); ?>/km</td>
                            <td><strong>₹<?= number_format($roundTripFare); ?></strong></td>
                            <td>
                              <a href="https://api.whatsapp.com/send?phone=+919818022687&text=<?= rawurlencode("Hi! I would like to book a {$vehicle['vehicle_type']} for a round trip from {$origin['name']} to {$destination['name']}."); ?>"
                                   target="_blank"
                                   rel="noopener"
                                   class="button-txy"
                                   style="display: inline-block; text-decoration: none; padding: 6px 16px; font-size: 14px; color: #000; background-color: #ffa803; border: 2px solid #ffa803; border-radius: 6px;">
                                    Book Now
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <h3>One-Way Taxi Fare</h3>

            <div class="table-responsive">
                <table class="seo-table">
                    <thead>
                        <tr>
                            <th>Vehicle</th>
                            <th>Rate (₹/Km)</th>
                            <th>Estimated Fare</th>
                            <th>Book</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($pricing as $vehicle):

                        $oneWayFare = ($route['distance'] * $vehicle['one_way_price']) + 250;

                    ?>
                        <tr>
                            <td><strong><?= esc($vehicle['vehicle_type']); ?></strong></td>
                            <td>₹<?= esc($vehicle['one_way_price']); ?>/km</td>
                            <td><strong>₹<?= number_format($oneWayFare); ?></strong></td>
                            <td>
                               <a href="https://api.whatsapp.com/send?phone=+919818022687&text=<?= rawurlencode("Hi! I would like to book a {$vehicle['vehicle_type']} for a one-way trip from {$origin['name']} to {$destination['name']}."); ?>"
                                   target="_blank"
                                   rel="noopener"
                                   class="button-txy"
                                   style="display: inline-block; text-decoration: none; padding: 6px 16px; font-size: 14px; color: #000; background-color: #ffa803; border: 2px solid #ffa803; border-radius: 6px;">
                                    Book Now
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            

            <div class="info-box info-box--warning">
                <strong>Note:</strong> Estimated fares are calculated based on the route distance. Toll tax, parking charges, state tax and driver allowance (if applicable) are extra. Final fare is confirmed at the time of booking.
            </div>
            
<?php if (!empty($cityFacts)): ?>

<div class="info-box">

    <h2>Why Visit <?= esc($destination['name']); ?></h2>

    <p class="mb-md">
        Planning your trip from
        <strong><?= esc($origin['name']); ?></strong>
        to
        <strong><?= esc($destination['name']); ?></strong>?
        Here's everything you should know before your journey.
    </p>

   <p class="mb-md">
    <?= esc($cityFacts['one_liner']); ?>
    Travellers from <strong><?= esc($origin['name']); ?></strong> frequently visit
    <?= esc($destination['name']); ?> for tourism, business, family visits and local experiences.
</p>

    <div class="grid grid-4 mt-md mb-md">

        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-monument text-primary" style="margin-right:8px;"></i>
                Why Visit
            </div>
            <div class="card-text">
                <?= esc($cityFacts['famous_for']); ?>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-heart text-primary" style="margin-right:8px;"></i>
                Must-Visit Places
            </div>
            <div class="card-text">
                <?= esc($cityFacts['popular_attractions']); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-utensils text-primary" style="margin-right:8px;"></i>
                Local Cuisine
            </div>
            <div class="card-text">
                <?= esc($cityFacts['local_cuisine']); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fa-solid fa-calendar-day text-primary" style="margin-right:8px;"></i>
                Best Time to Visit
            </div>
            <div class="card-text">
                <?= esc($cityFacts['best_time_to_visit']); ?>
            </div>
        </div>

        

    </div>

    <?php if (!empty($destination['airport_name']) || !empty($destination['railway_station_name'])): ?>

        <div class="flex flex-wrap gap-md mt-md pt-sm" style="border-top:1px dashed var(--color-gray-300);">

            <?php if (!empty($destination['airport_name'])): ?>

                <div style="flex:1;min-width:250px;">
                    <i class="fa-solid fa-plane text-primary" style="margin-right:8px;"></i>
                    <strong>Nearest Airport:</strong>
                    <?= esc($destination['airport_name']); ?>
                    <?php if (!empty($destination['airport_code'])): ?>
                        (<?= esc($destination['airport_code']); ?>)
                    <?php endif; ?>
                </div>

            <?php endif; ?>

            <?php if (!empty($destination['railway_station_name'])): ?>

                <div style="flex:1;min-width:250px;">
                    <i class="fa-solid fa-train text-primary" style="margin-right:8px;"></i>
                    <strong>Nearest Railway Station:</strong>
                    <?= esc($destination['railway_station_name']); ?>
                </div>

            <?php endif; ?>

        </div>

    <?php endif; ?>

</div>

<?php endif; ?>

<h2>Popular Pickup & Drop Locations</h2>

<p>
    Book a reliable taxi from <strong><?= esc($origin['name']); ?></strong> to
    <strong><?= esc($destination['name']); ?></strong> with doorstep pickup from
    popular locations across <?= esc($origin['name']); ?> and drop service to
    major neighbourhoods and landmarks in <?= esc($destination['name']); ?>.
</p>

<div class="table-responsive">
    <table class="seo-table">
        <thead>
            <tr>
                <th>Popular Pickups in <?= esc($origin['name']); ?></th>
                <th>Popular Drops in <?= esc($destination['name']); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php
            $pickupList = array_slice($pickupAreas, 0, 5);
            $dropList   = array_slice($dropAreas, 0, 5);

            $rows = max(count($pickupList), count($dropList));

            if ($rows === 0) {
                $rows = 1;
            }

            for ($i = 0; $i < $rows; $i++):
            ?>
            <tr>
                <td>
                    <?= isset($pickupList[$i])
                        ? esc($pickupList[$i]['location_name'])
                        : '—'; ?>
                </td>

                <td>
                    <?= isset($dropList[$i])
                        ? esc($dropList[$i]['location_name'])
                        : '—'; ?>
                </td>
            </tr>
            <?php endfor; ?>

            <?php if (empty($pickupList) && !empty($dropList)): ?>
            <tr>
                <td>Anywhere in city limits</td>
                <td>—</td>
            </tr>
            <?php endif; ?>

            <?php if (empty($dropList) && !empty($pickupList)): ?>
            <tr>
                <td>—</td>
                <td>Anywhere in city limits</td>
            </tr>
            <?php endif; ?>

            <?php if (empty($pickupList) && empty($dropList)): ?>
            <tr>
                <td>Anywhere in city limits</td>
                <td>Anywhere in city limits</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
            
            

<h2>Travel Tips for <?= esc($origin['name']); ?> to <?= esc($destination['name']); ?> Tourists</h2>
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
         <p>Enjoy a comfortable ride to <?= esc($destination['name']); ?>. Keep your ID proof handy for inter-city travel and consider starting early to avoid city traffic limits.</p>
    <?php endif; ?>

    <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
    
    <p style="font-size: 0.9em; color: #888; margin: 0;">
        Recently Updated: <?= date('F Y'); ?>
    </p>
</div>
</div>

            
        <?php include 'components/book.php'; ?>

<?php include 'components/testimonial.php'; ?>

<?php include 'components/why_choose_us.php'; ?>

            <section class="routes-section mt-md">
    <div class="routes-header">
        <h2>Other Popular Routes from <?= esc($origin['name']); ?></h2>
    </div>

    <div class="routes-grid">
    <?php
    $count = 0;
    foreach ($nearbyRoutes as $nRoute):

        if ($nRoute['slug'] === $destination['slug']) continue;
        if ($count >= 8) break;
    ?>
        <div class="route-col">
            <ul class="route-list">
                <li>
                    <a href="<?= esc($origin['slug']); ?>-to-<?= esc($nRoute['slug']); ?>-taxi">
                        <?= esc($origin['name']); ?> to <?= esc($nRoute['name']); ?> Taxi
                    </a>
                </li>
            </ul>
        </div>
    <?php
        $count++;
    endforeach;
    ?>
</div>
</section>
                    
<section class="faq-section">
            <h2>

Frequently Asked Questions About Taxi Service in 

<?= $destination['name']; ?>

</h2>

            <?php foreach ($routeFaqs as $faq): ?>

<div class="faq-item">
    <h3 class="faq-question">
        <?= str_replace(
            ['{FROM}', '{TO}'],
            [$origin['name'], $destination['name']],
            $faq['question']
        ); ?>
    </h3>

    <p class="faq-answer">
        <?= str_replace(
            ['{FROM}', '{TO}'],
            [$origin['name'], $destination['name']],
            $faq['answer']
        ); ?>
    </p>
</div>

<?php endforeach; ?>
            </section>

      
    </div>
</div>

<script src="css/components/faq.js"></script>

<?php include 'layout/footer.php'; ?>

</body>
</html> 

