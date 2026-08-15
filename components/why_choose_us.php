 <link rel="stylesheet" href="css/components/why_choose_us.css">
<section class="why-choose-section compact">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why ride with TaxiYatri?</h2>
            <p class="section-subtitle">Innovation in every mile</p>
        </div>

        <div class="innovation-wrapper">
            <!-- Left: Feature Navigation -->
            <div class="feature-nav">
                <div class="nav-item active" data-target="safety">
                    <div class="nav-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div class="nav-text">
                        <h4>Safety First</h4>
                        <p>24/7 Monitoring & Support</p>
                    </div>
                </div>
                <div class="nav-item" data-target="price">
                    <div class="nav-icon"><i class="fa-solid fa-wallet"></i></div>
                    <div class="nav-text">
                        <h4>Transparent Pricing</h4>
                        <p>No Hidden Charges</p>
                    </div>
                </div>
                <div class="nav-item" data-target="comfort">
                    <div class="nav-icon"><i class="fa-solid fa-star"></i></div>
                    <div class="nav-text">
                        <h4>Premium Comfort</h4>
                        <p>Well-Maintained Fleet</p>
                    </div>
                </div>
            </div>

            <!-- Right: Dynamic Content Display -->
            <div class="feature-display">
                <div class="display-item active" id="safety">
                    <div class="display-image">
                        <img src="images/why_us3.webp" alt="Safety" class="responsive-img">
                    </div>
                    <div class="display-text">
                        <h3>Your safety is our priority</h3>
                        <p>From emergency assistance to real-time trip tracking, we’ve integrated cutting-edge technology to ensure every ride is secure and peace-of-mind is guaranteed.</p>
                    </div>
                </div>
                
                <div class="display-item" id="price">
                    <div class="display-image">
                        <img src="images/why_us1.webp" alt="Pricing" class="responsive-img">
                    </div>
                    <div class="display-text">
                        <h3>Know your fare, upfront</h3>
                        <p>We believe in honesty. See your estimated price before you book and enjoy fixed-market rates. What you see is exactly what you pay.</p>
                    </div>
                </div>

                <div class="display-item" id="comfort">
                    <div class="display-image">
                        <img src="images/why_us2.webp" alt="Comfort" class="responsive-img">
                    </div>
                    <div class="display-text">
                        <h3>Travel in style and ease</h3>
                        <p>Our fleet consists of the best-rated sedans and SUVs, driven by professional chauffeurs. Experience the gold standard of comfort on every journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inline script for the innovation interaction -->
<script>
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function() {
        // Remove active class from all nav items
        document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
        // Add active class to clicked item
        this.classList.add('active');
        
        // Hide all display items
        const targetId = this.getAttribute('data-target');
        document.querySelectorAll('.display-item').forEach(display => {
            display.classList.remove('active');
            if (display.id === targetId) {
                display.classList.add('active');
            }
        });
    });
});
</script>
