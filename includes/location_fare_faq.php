<?php

if (!defined('TAXIYATRI')) {
    exit('Direct access not allowed');
}



$pricing_faqs = [

   

    [
       
        'question' => "What is the taxi fare from {$location['location_name']} in {$parentCity['name']}?",
        'answer'   => "Fares start at ₹10/km for a Hatchback or Sedan and ₹13/km for an SUV from {$location['location_name']}. Local packages (8 Hr/80 Km) begin at ₹1,950 for a Hatchback. The final rate depends on your vehicle choice, trip type, and distance."
    ],
    

    [
        
        'question' => "What factors determine the final taxi fare from {$location['location_name']}?",
        'answer'   => "Six factors affect your final fare: (1) base per-km rate for the vehicle type, (2) actual kilometres driven, (3) waiting time beyond the free grace period, (4) parking fees at airports or stations if applicable, (5) night allowance for trips between 10 PM and 6 AM, and (6) toll or state taxes on the route. If you take a detour or a longer alternate route, the fare updates based on the actual odometer reading."
       
    ],

    [
        
        'question' => "What is the difference between one-way and round-trip fares from {$location['location_name']}?",
        'answer'   => "A one-way fare covers only the distance from {$location['location_name']} to your destination — ideal for a direct drop. A round-trip fare applies a lower per-km rate but is billed on a minimum daily kilometre basis, making it better value for multi-day or return journeys."
    ],

    [
        
        'question' => "Is there a night charge for late-night or early-morning pickups from {$location['location_name']}?",
        'answer'   => "Yes. A standard night allowance applies to trips operating between 10:00 PM and 6:00 AM. This fee is shown on your fare breakdown before you confirm — there are no post-trip surprises."
    ],

  

    [
        
        'question' => "Can my taxi fare change after I confirm a booking from {$location['location_name']}?",
        'answer'   => "The quoted fare is locked at booking. It can only change if you add stops, request a detour, or exceed your agreed package kilometres or hours. Any additions are communicated clearly before or during the trip — never as a post-trip surprise."
    ],

    [
        
        'question' => "Are there hidden charges or surge pricing from {$location['location_name']}?",
        'answer'   => "No. TaxiYatri operates on a fixed, transparent pricing policy. We do not apply surge pricing during peak hours, rain, or late nights. What you see at booking is what you pay at drop."
    ],

    [
       
        'question' => "Is GST included in the fare, and will I get an invoice?",
        'answer'   => "Yes. GST is factored into the per-km rates shown. A GST-compliant digital invoice is automatically sent via email and SMS after your trip completes, which you can use for reimbursement or corporate expense claims."
    ],

    [
        
        'question' => "How much free waiting time is included, and what are the waiting charges?",
        'answer'   => "TaxiYatri provides 45 minutes of free waiting for airport pickups and 15 minutes for standard local pickups. Beyond these windows, a standard per-hour waiting charge applies. Airport parking fees are charged on actuals based on the official parking slip — these are not included in the base fare."
        // Merged Q9 (waiting time), Q10 (airport parking), and Q17 (waiting if delayed) into one answer.
    ],

    // ── 3. BOOKING ──────────────────────────────────────────────────────────

    [
        
        'question' => "How do I pay for my cab from {$location['location_name']}?",
        'answer'   => "We accept cash to the driver, UPI, credit cards, debit cards, and net banking. For outstation trips, a small advance may be collected at booking to confirm the reservation. The remaining balance is settled with the driver at trip completion."
    ],

    [
        
        'question' => "Can I book in advance from {$location['location_name']}?",
        'answer'   => "Yes — up to 7 days in advance. Advance booking is especially recommended for airport transfers, early-morning departures, outstation journeys, and peak travel seasons to guarantee availability."
    ],

    [
        
        'question' => "What is the cancellation and modification policy?",
        'answer'   => "Bookings can be cancelled or modified up to 24 hours before the scheduled pickup at no charge. Late cancellations may incur a nominal fee as detailed in our booking terms."
    ],

    [
        
        'question' => "Can I book a cab for someone else from {$location['location_name']}?",
        'answer'   => "Yes. Provide the passenger's name and contact number at booking and our driver will coordinate directly with them for pickup — no need for you to be present."
    ],

    // ── 4. SERVICE ───────────────────────────────────────────────────────────

    [
       
        'question' => "Which vehicles can I book from {$location['location_name']} and how do their rates differ?",
        'answer'   => "Choose from Hatchbacks (budget, 4 seats), Sedans — Dzire/Etios (comfort, 4 seats), SUVs — Ertiga/Innova (family, 6–7 seats), and Tempo Travellers (groups, 12–26 seats). Each class has a distinct per-km rate and package price that reflects its size and comfort level."
    ],

    [
        
        'question' => "Are monthly and corporate cab packages available in {$location['location_name']}?",
        'answer'   => "Yes. TaxiYatri offers monthly packages and corporate travel schemes with fixed billing cycles — ideal for daily office commuters and businesses in {$location['location_name']}."
        // Removed exact duplicate (was Q12 and Q21). One clean entry kept.
    ],

    [
       
        'question' => "How do I reach TaxiYatri support for fare queries?",
        'answer'   => "Call our 24/7 helpline at +91-8377809809 or reach the booking team directly on WhatsApp for instant fare quotes, trip changes, or any mid-journey assistance."
    ],

];

?>