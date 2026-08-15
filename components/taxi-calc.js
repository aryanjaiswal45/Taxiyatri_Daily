
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('calc-distance');
    if (!slider) return; // Guard: exit if calculator not on this page

    const distanceDisplay = document.getElementById('distance-display');
    const vehicleRadios = document.querySelectorAll('input[name="calc_vehicle"]');
    const tripTypeRadios = document.querySelectorAll('input[name="calc_trip_type"]');
    
    // Result elements
    const fareDisplay = document.getElementById('calc-result-fare');
    const summaryDistance = document.getElementById('summary-distance');
    const summaryVehicle = document.getElementById('summary-vehicle');
    const summaryRate = document.getElementById('summary-rate');
    
    // SEO text elements
    const seoDistance = document.getElementById('seo-distance');
    const seoVehicle = document.getElementById('seo-vehicle');
    const seoFare = document.getElementById('seo-fare');
    const seoType = document.getElementById('seo-type');

    // Local/Outstation elements
    const tripTypeWrapper = document.getElementById('trip-type-wrapper');
    const badge = document.getElementById('trip-category-badge');
    
    function formatCurrency(amount) {
        return '₹' + Math.round(amount).toLocaleString('en-IN');
    }
    
    function updateCalculator() {
        const distance = parseInt(slider.value, 10);
        let selectedVehicle = 'Hatchback';
        let tripType = 'round_trip';
        let rate = 9;
        let driverAllowance = 500; // Fixed driver allowance
        
        tripTypeRadios.forEach(function(radio) {
            if (radio.checked) tripType = radio.value;
        });

        const isLocal = distance <= 30;
        
        if (isLocal) {
            tripTypeWrapper.style.opacity = '0.4';
            tripTypeWrapper.style.pointerEvents = 'none';
            badge.textContent = 'Local Trip';
            badge.style.background = 'var(--color-primary)';
            badge.style.color = 'var(--color-secondary)';
        } else {
            tripTypeWrapper.style.opacity = '1';
            tripTypeWrapper.style.pointerEvents = 'auto';
            badge.textContent = 'Outstation';
            badge.style.background = 'var(--color-gray-200)';
            badge.style.color = 'var(--color-text-secondary)';
        }
        
        vehicleRadios.forEach(function(radio) {
            if (radio.checked) {
                selectedVehicle = radio.value;
                if (isLocal) {
                    rate = parseFloat(radio.getAttribute('data-local'));
                } else {
                    rate = parseFloat(radio.getAttribute(tripType === 'one_way' ? 'data-ow' : 'data-rt'));
                }
            }
        });
        
        // Calculation
        var fare = ((distance*1.5) * rate)+driverAllowance;
        
        // Update displays
        distanceDisplay.textContent = distance + ' km';
        
        var formattedFare = formatCurrency(fare);
        fareDisplay.textContent = formattedFare;
        
        summaryDistance.textContent = distance + ' km';
        summaryVehicle.textContent = selectedVehicle;
        summaryRate.textContent = '₹' + rate + '/km';
        
        // Update ARIA on slider
        slider.setAttribute('aria-valuenow', distance);
        
        // Update SEO Text
        seoDistance.textContent = distance + ' km';
        seoVehicle.textContent = selectedVehicle;
        seoFare.textContent = formattedFare;
        seoType.textContent = isLocal ? 'local' : (tripType === 'one_way' ? 'one way' : 'round trip');
        
        // Update slider background fill
        var min = slider.min || 10;
        var max = slider.max || 300;
        var percentage = ((distance - min) / (max - min)) * 100;
        slider.style.background = 'linear-gradient(to right, var(--color-primary) ' + percentage + '%, var(--color-gray-200) ' + percentage + '%)';
    }
    
    // rAF debounce wrapper
    var rafId = null;
    function requestUpdate() {
        if (rafId) cancelAnimationFrame(rafId);
        rafId = requestAnimationFrame(updateCalculator);
    }
    
    // Event Listeners — slider uses rAF debounce; radios fire immediately
    slider.addEventListener('input', requestUpdate);
    vehicleRadios.forEach(function(radio) { radio.addEventListener('change', requestUpdate); });
    tripTypeRadios.forEach(function(radio) { radio.addEventListener('change', requestUpdate); });
    
    // Initial calculation
    updateCalculator();
});
