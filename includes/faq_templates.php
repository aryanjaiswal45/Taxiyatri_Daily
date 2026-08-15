<?php

if (!defined('TAXIYATRI')) {
    exit('Direct access not allowed');
}

/*
|--------------------------------------------------------------------------
| All existing variables — untouched
|--------------------------------------------------------------------------
*/
$cityName    = esc($city['name'] ?? '');

$airportName = !empty($city['airport_name'])
    ? esc($city['airport_name']) . (!empty($city['airport_code'])
        ? ' (' . esc($city['airport_code']) . ')' : '')
    : 'the nearest airport';

$railwayName = !empty($city['railway_station_name'])
    ? esc($city['railway_station_name'])
    : 'the local railway station';

$areaNames = [];
if (!empty($areas) && is_array($areas)) {
    $areaNames = array_slice(array_column($areas, 'location_name'), 0, 5);
}
$popularAreas = !empty($areaNames)
    ? esc(implode(', ', $areaNames))
    : $cityName . ' and nearby sectors';

$idealFor = !empty($cityFacts['popular_attractions'])
    ? esc($cityFacts['popular_attractions'])
    : 'outstation travel, airport transfers, railway station pickups, and local sightseeing';

$phone    = esc($city['phone']    ?? '8377-809-809');
$whatsapp = esc($city['whatsapp'] ?? '+91 98180 22687');


$waitingMins      = '45 minutes';
$advanceBooking   = '2 hours';
$cancelWindow     = '4 hours';

$sedanOneWay      = '₹10/km';
$sedanRoundTrip   = '₹9/km';
$sedanLocal       = '₹10/km';
$suvOneWay        = '₹13/km';
$innovaOneWay     = '₹16/km';
$tempoOneWay      = '₹25/km';


return [

    // 1. HOW TO BOOK
    [
        'question' => "How can I book a cab with TaxiYatri in {$cityName}?",
        'answer'   => "Call {$phone} or WhatsApp {$whatsapp} to book a cab in {$cityName}. 
                       Online booking is available at TaxiYatri.com — enter your pickup 
                       location, travel date, and vehicle type to get an instant confirmed 
                       fare. Booking requires at least {$advanceBooking} before the 
                       scheduled pickup time."
    ],

    // 2. FARE PER KM — replaces vague "ideal for" FAQ
    [
        'question' => "What is the taxi fare per km in {$cityName}?",
        'answer'   => "TaxiYatri charges {$sedanOneWay} for a Sedan on one-way trips 
                       from {$cityName} and {$sedanRoundTrip} for round trips. 
                       Local hourly rental rates start at {$sedanLocal} per km for a Sedan. 
                       SUV one-way trips start at {$suvOneWay}, Innova at {$innovaOneWay}, 
                       and Tempo Traveller at {$tempoOneWay}. 
                       GST and driver allowance are included. Toll is extra."
    ],

    // 3. DRIVER VERIFICATION
    [
        'question' => "Are TaxiYatri drivers background-checked and verified in {$cityName}?",
        'answer'   => "Yes. Every TaxiYatri driver in {$cityName} completes KYC verification 
                       before their first trip. Drivers carry a valid commercial driving 
                       licence and government-issued photo ID. Driver name, licence number, 
                       and vehicle registration number are shared with the passenger 
                       before pickup."
    ],

    // 4. ADVANCE BOOKING
    [
        'question' => "How early should I book a taxi in {$cityName}?",
        'answer'   => "Book at least {$advanceBooking} before your pickup in {$cityName}. 
                       For early-morning departures to {$airportName} or long-distance 
                       outstation trips, booking 12–24 hours in advance is recommended 
                       to secure your preferred vehicle type. Same-day bookings are 
                       accepted subject to fleet availability."
    ],

    // 5. WAITING TIME
    [
        'question' => "What is the free waiting time at {$railwayName} and {$airportName}?",
        'answer'   => "TaxiYatri provides {$waitingMins} of complimentary waiting time 
                       for pickups at {$railwayName} and {$airportName}. 
                       This covers delays from late train arrivals, flight diversions, 
                       or extended baggage collection. No additional charge applies 
                       within the {$waitingMins} window."
    ],

    // 6. NIGHT AVAILABILITY — stronger than before
    [
        'question' => "Is cab service available at night in {$cityName}?",
        'answer'   => "Yes. TaxiYatri operates 24 hours a day, 7 days a week in 
                       {$cityName} with no night surcharge. Pickups from {$railwayName} 
                       for late-night train arrivals and early-morning drops to 
                       {$airportName} are regularly handled. The fare confirmed 
                       at booking applies at all hours."
    ],

    // 7. NO SURGE PRICING — replaces GPS FAQ
    [
        'question' => "Does TaxiYatri apply surge pricing during peak hours or festivals in {$cityName}?",
        'answer'   => "No. TaxiYatri uses fixed per-km pricing in {$cityName} with no 
                       surge multipliers during peak traffic, public holidays, or 
                       festival seasons. The fare shown at the time of booking is 
                       the exact amount charged at trip completion, regardless of 
                       traffic conditions or time of day."
    ],

    // 8. PAYMENT METHODS
    [
        'question' => "What payment methods are accepted for cab bookings in {$cityName}?",
        'answer'   => "TaxiYatri accepts UPI payments via Google Pay, PhonePe, and Paytm, 
                       plus credit cards, debit cards, and net banking. Cash payment 
                       directly to the driver at trip completion is also accepted. 
                       No advance payment is required for most bookings in {$cityName}."
    ],

    // 9. OUTSTATION ONE-WAY — replaces passenger ID FAQ
    [
        'question' => "Can I book a one-way outstation cab from {$cityName}?",
        'answer'   => "Yes. TaxiYatri offers one-way outstation cabs from {$cityName} 
                       to destinations across Uttar Pradesh and neighbouring states. 
                       One-way pricing means you pay only for the distance travelled — 
                       no return leg charges are applied. Sedan one-way rates start 
                       at {$sedanOneWay}. Call {$phone} for a confirmed fare 
                       to your specific destination."
    ],

    // 10. CANCELLATION
    [
        'question' => "How do I cancel or modify a taxi booking in {$cityName}?",
        'answer'   => "Call {$phone} or WhatsApp {$whatsapp} at least {$cancelWindow} 
                       before your scheduled pickup in {$cityName} to cancel or 
                       reschedule without penalty. Cancellations within {$cancelWindow} 
                       of pickup may attract a partial charge if a driver has already 
                       been dispatched to your location."
    ],

    // 11. LOCAL AREAS — now uses actual area names properly
    [
        'question' => "Which areas in {$cityName} does TaxiYatri provide doorstep pickup?",
        'answer'   => "TaxiYatri provides doorstep pickup and drop across {$cityName} 
                       including {$popularAreas}. Service covers residential sectors, 
                       highway junctions, industrial zones, and surrounding towns 
                       within the district. Pickup location is confirmed with the 
                       driver before the trip starts."
    ],

    // 12. VEHICLE SELECTION
    [
        'question' => "Which vehicle should I book for group travel from {$cityName}?",
        'answer'   => "For 1–4 passengers with light luggage, a Sedan (Dzire) or 
                       Hatchback works best from {$cityName}. For 5–7 passengers 
                       or heavier baggage, book an Innova or Ertiga SUV. 
                       Groups of 9–26 passengers should choose a Tempo Traveller. 
                       All vehicle types are available for local, airport, and 
                       outstation trips."
    ],

    // 13. AIRPORT SPECIFIC — new, uses existing $airportName variable
    [
        'question' => "Does TaxiYatri provide airport taxi service from {$cityName} to {$airportName}?",
        'answer'   => "Yes. TaxiYatri provides pickup and drop between {$cityName} 
                       and {$airportName}. Airport trips can be scheduled in advance 
                       to match your flight time, with {$waitingMins} of free waiting 
                       included for departures. Early-morning and late-night airport 
                       transfers are available at the same fixed fare — no night premium."
    ],

    // 14. WHAT ATTRACTIONS / SIGHTSEEING — uses existing $idealFor variable properly
    [
        'question' => "Can I hire a taxi for local sightseeing in {$cityName}?",
        'answer'   => "Yes. TaxiYatri offers hourly rental packages in {$cityName} 
                       starting with an 8-hour, 80 km package at {$sedanLocal} 
                       per km for a Sedan. This is suitable for visiting 
                       {$idealFor}. Additional hours and kilometres are billed 
                       at the same per-km rate confirmed at booking."
    ],

];