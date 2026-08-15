<?php
// Extract pricing for the calculator
$calcRates = [
    'Hatchback' => ['one_way' => 11, 'round_trip' => 9, 'local' => 15],
    'Sedan' => ['one_way' => 12, 'round_trip' => 10, 'local' => 16],
    'SUV' => ['one_way' => 16, 'round_trip' => 14, 'local' => 20],
    'Innova' => ['one_way' => 18, 'round_trip' => 16, 'local' => 22],
    'Tempo Traveller' => ['one_way' => 24, 'round_trip' => 22, 'local' => 30]
];

if (isset($pricing) && is_array($pricing)) {
    $seen = [];
    foreach ($pricing as $p) {
        $vt = $p['vehicle_type'];
        $ow = (float)$p['one_way_price'];
        $rt = (float)$p['round_trip_price'];
        $loc = (float)$p['local_price'];
        
        // Normalize vehicle key
        $key = null;
        if ($vt === 'Hatchback' || $vt === 'Sedan' || $vt === 'SUV') {
            $key = $vt;
        } elseif (stripos($vt, 'Innova') !== false) {
            $key = 'Innova';
        } elseif (stripos($vt, 'Tempo') !== false) {
            $key = 'Tempo Traveller';
        }
        
        if ($key && !isset($seen[$key])) {
            $calcRates[$key] = ['one_way' => $ow, 'round_trip' => $rt, 'local' => $loc];
            $seen[$key] = true;
        }
    }
}

// Defaults for SEO — these are what crawlers index
$defaultDistance = 25;
$defaultVehicle = 'Hatchback';
$defaultTripType = 'round_trip';
$defaultRate = $calcRates[$defaultVehicle][$defaultTripType];
$defaultFare = $defaultDistance * $defaultRate;
?>

<link rel="stylesheet" href="/css/components/taxi-calc.css">


<div class="elegant-calc-wrapper mt-lg mb-lg">
    <div class="elegant-calc-card">
        <div class="calc-header">
            <h3>🚕 Know Your Fare</h3>
        </div>
        
        <div class="calc-body">
            <div class="calc-inputs">
                
                <!-- Trip Type Toggle -->
                <div class="input-group">
                    <div class="flex justify-between items-center">
                        <label>Trip Type</label>
                        <span id="trip-category-badge" class="trip-category-badge">Outstation</span>
                    </div>
                    <div class="trip-type-toggle" id="trip-type-wrapper">
                        <label class="toggle-option">
                            <input type="radio" name="calc_trip_type" value="one_way" aria-label="One Way Trip">
                            <span>One Way</span>
                        </label>
                        <label class="toggle-option">
                            <input type="radio" name="calc_trip_type" value="round_trip" aria-label="Round Trip" checked>
                            <span>Round Trip</span>
                        </label>
                    </div>
                </div>

                <!-- Distance Slider -->
                <div class="input-group">
                    <div class="flex justify-between items-center mb-xs">
                        <label>Distance</label>
                        <span id="distance-display" class="distance-val"><?= $defaultDistance ?> km</span>
                    </div>
                    <input type="range" id="calc-distance" min="10" max="300" value="<?= $defaultDistance ?>" step="2"
                           aria-label="Trip distance in kilometres" aria-valuemin="10" aria-valuemax="300" aria-valuenow="<?= $defaultDistance ?>">
                    <div class="flex justify-between text-muted distance-range-labels">
                        <span>10 km</span>
                        <span>300 km</span>
                    </div>
                </div>

                <!-- Vehicle Selection -->
                <div class="input-group">
                    <label>Vehicle</label>
                    <div class="vehicle-options-compact">
                        <?php 
                        $first = true;
                        foreach ($calcRates as $vehicle => $rates): 
                        ?>
                        <label class="vehicle-pill">
                            <input type="radio" name="calc_vehicle" value="<?= htmlspecialchars($vehicle) ?>" 
                                   data-ow="<?= $rates['one_way'] ?>" data-rt="<?= $rates['round_trip'] ?>" data-local="<?= $rates['local'] ?>"
                                   <?= $first ? 'checked' : '' ?> aria-label="<?= htmlspecialchars($vehicle) ?> Vehicle">
                            <span class="pill-content">
                                <?= htmlspecialchars($vehicle) ?>
                            </span>
                        </label>
                        <?php $first = false; endforeach; ?>
                    </div>
                </div>
            </div>
            
            <div class="calc-result-area" aria-live="polite" aria-atomic="true">
                <div class="result-box">
                    <div class="result-label">Estimated Fare</div>
                    <div id="calc-result-fare" class="result-amount">₹<?= number_format($defaultFare) ?></div>
                    <div class="result-details">
                        <span id="summary-distance"><?= $defaultDistance ?> km</span> • 
                        <span id="summary-vehicle"><?= htmlspecialchars($defaultVehicle) ?></span> • 
                        <span id="summary-rate">₹<?= $defaultRate ?>/km</span>
                    </div>
                    <button type="button" class="btn button-txy calc-btn" onclick="document.getElementById('hero-booking').scrollIntoView({behavior: 'smooth'})">Book Now</button>
                </div>
                
                <div class="seo-disclaimer">
                    <p id="seo-text">
                        Estimated taxi fare for a <strong id="seo-distance"><?= $defaultDistance ?> km</strong> <strong id="seo-type"><?= str_replace('_', ' ', $defaultTripType) ?></strong> journey in a <strong id="seo-vehicle"><?= htmlspecialchars($defaultVehicle) ?></strong> is <strong id="seo-fare">₹<?= number_format($defaultFare) ?></strong>. 
                    </p>
                    <p class="disclaimer-text">
                   * Driver allowance included. Actual fare may vary based on traffic and route. 
Toll and parking charges are paid separately.
                    </p>
                </div>
                
                <noscript>
                    <table class="noscript-fare-table">
                        <caption>Base fare rates per km</caption>
                        <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>One Way</th>
                                <th>Round Trip</th>
                                <th>Local</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($calcRates as $v => $r): ?>
                            <tr>
                                <td><?= htmlspecialchars($v) ?></td>
                                <td>₹<?= $r['one_way'] ?>/km</td>
                                <td>₹<?= $r['round_trip'] ?>/km</td>
                                <td>₹<?= $r['local'] ?>/km</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </noscript>
            </div>
        </div>
    </div>
</div>
