<?php

if (!defined('TAXIYATRI')) {
    exit('Direct access not allowed');
}

$routeFaqs = [

    [
        'question' => "What is the taxi fare from {$origin['name']} to {$destination['name']}?",
        'answer'   => "Taxi fares from {$origin['name']} to {$destination['name']} depend on the vehicle category you choose. TaxiYatri offers Hatchbacks, Sedans, SUVs, Innova, Crysta and Tempo Travellers with transparent pricing. The final fare is confirmed before booking."
    ],

    [
        'question' => "How can I book a taxi from {$origin['name']} to {$destination['name']}?",
        'answer'   => "You can book online through TaxiYatri or contact our booking team by phone or WhatsApp. Instant confirmation and 24×7 assistance are available."
    ],

    [
        'question' => "Is one-way taxi service available from {$origin['name']} to {$destination['name']}?",
        'answer'   => "Yes. TaxiYatri offers affordable one-way taxi service from {$origin['name']} to {$destination['name']} with transparent pricing."
    ],

    [
        'question' => "Can I book a round-trip taxi from {$origin['name']} to {$destination['name']}?",
        'answer'   => "Yes. Round-trip bookings are available for same-day returns as well as multi-day journeys."
    ],

    [
        'question' => "Which taxi options are available on the {$origin['name']} to {$destination['name']} route?",
        'answer'   => "Choose from Hatchback, Sedan, SUV, Innova, Crysta and Tempo Traveller based on your travel requirements."
    ],

    [
        'question' => "Are there any hidden charges?",
        'answer'   => "No. TaxiYatri follows transparent pricing. Your fare is shared before booking confirmation."
    ],

    
    [
        'question' => "How long does it take to travel from {$origin['name']} to {$destination['name']}?",
        'answer'   => "Travel time depends on traffic, weather and road conditions. Most journeys follow the fastest available highway route."
    ],

    [
        'question' => "How far is {$destination['name']} from {$origin['name']} by road?",
        'answer'   => "The road distance may vary slightly depending on the route taken. TaxiYatri always follows the safest and fastest available route."
    ],

    [
        'question' => "Is the road between {$origin['name']} and {$destination['name']} in good condition?",
        'answer'   => "Most major routes are connected by national highways or state highways and are suitable for comfortable cab travel throughout the year."
    ],

    [
        'question' => "Are toll charges included in the taxi fare?",
        'answer'   => "Toll charges, parking fees and state taxes (where applicable) are communicated during booking according to the selected package."
    ],

    [
        'question' => "Can I stop at multiple places during the journey?",
        'answer'   => "Yes. Additional stopovers can be added during booking or informed to the driver. Extra charges may apply for long detours."
    ],

    [
        'question' => "Is the taxi available 24×7?",
        'answer'   => "Yes. TaxiYatri operates 24 hours a day, including early morning, late night and holiday pickups."
    ],

    [
        'question' => "Why do travellers frequently visit {$destination['name']} from {$origin['name']}?",
        'answer'   => "{$destination['name']} is known for {$cityFacts['famous_for']}. It attracts visitors for tourism, business, education, family visits and religious travel."
    ],

    [
        'question' => "What is the best time to visit {$destination['name']}?",
        'answer'   => "The best time to visit {$destination['name']} is {$cityFacts['best_time_to_visit']}, when weather conditions are generally pleasant for sightseeing and travel."
    ],

    [
        'question' => "Why choose TaxiYatri for {$origin['name']} to {$destination['name']} taxi service?",
        'answer'   => "TaxiYatri provides verified drivers, clean vehicles, transparent fares, multiple cab options and 24×7 customer support for reliable intercity travel."
    ]

];