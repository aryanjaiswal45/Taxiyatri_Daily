
<link rel="stylesheet" href="css/components/urbania.css">

<section class="urbania-section" aria-label="Force Urbania Rental">


    <div class="urbania-hero-card" >

        <div class="urbania-gallery-wrapper">

            <!-- Left: Main image -->
            <div class="urbania-gallery-main" id="urbania-gallery">
                <img
                    id="urbania-main-img"
                    src="images/urbania-tt.webp"
                    alt="Force Urbania 12 Seater – Exterior"
                    class="img-cover"
                    itemprop="image"
                    loading="eager"
                >
                <div class="urbania-price-badge" aria-label="Starting fare ₹30 per km">
                    &#x20B9;30<span>/km</span>
                </div>
                <div class="urbania-avail-badge">Available Now</div>
            </div>

            <!-- Right: 2×2 thumbnail grid -->
            <div class="urbania-thumbs-grid" role="tablist" aria-label="Urbania gallery thumbnails">

                <div class="urbania-thumb active" role="tab" tabindex="0" aria-label="Exterior view"
                     onclick="urbaniaChangeImg('images/urbania-tt.webp', this)"
                     onkeydown="if(event.key==='Enter'||event.key===' ')urbaniaChangeImg('images/urbania-tt.webp',this)">
                    <img src="images/urbania-tt.webp" alt="Urbania Exterior" loading="lazy">
                </div>

                <div class="urbania-thumb" role="tab" tabindex="0" aria-label="9 seater variant"
                     onclick="urbaniaChangeImg('images/interior-1-1.webp', this)"
                     onkeydown="if(event.key==='Enter'||event.key===' ')urbaniaChangeImg('images/interior-1-1.webp',this)">
                    <img src="images/interior-1-1.webp" alt="9 Seater Urbania" loading="lazy">
                </div>

                <div class="urbania-thumb" role="tab" tabindex="0" aria-label="12 seater variant"
                     onclick="urbaniaChangeImg('images/interior-3-1.webp', this)"
                     onkeydown="if(event.key==='Enter'||event.key===' ')urbaniaChangeImg('images/interior-3-1.webp',this)">
                    <img src="images/interior-3-1.webp" alt="12 Seater Urbania" loading="lazy">
                </div>

                <div class="urbania-thumb" role="tab" tabindex="0" aria-label="15 seater variant"
                     onclick="urbaniaChangeImg('images/side2.webp', this)"
                     onkeydown="if(event.key==='Enter'||event.key===' ')urbaniaChangeImg('images/side2.webp',this)">
                    <img src="images/side2.webp" alt="15 Seater Urbania" loading="lazy">
                </div>

            </div>

        </div>

        <!-- Body -->
        <div class="urbania-hero-body">

            <!-- Title -->
            <div class="urbania-title-row">
                <h2 itemprop="name">Force Urbania</h2>
                <span class="urbania-badge urbania-badge-seater">12 – 17 Seater</span>
                <span class="urbania-badge urbania-badge-avail">Available Now</span>
            </div>
            <p class="urbania-description">
                Perfect for group tours, family trips &amp; corporate travel &bull;
                Spacious interiors with premium AC &amp; reclining seats &bull;
            </p>

            <!-- Specs -->
            <div class="urbania-specs-grid" itemprop="vehicleSpecification">

                <!-- Seating -->
                <div class="urbania-spec-item">
                    <div class="urbania-spec-icon" aria-hidden="true">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <div>
                        <p class="urbania-spec-label">Seating capacity</p>
                        <p class="urbania-spec-value">12 – 17 Passengers</p>
                    </div>
                </div>

                <!-- Fuel -->
                <div class="urbania-spec-item">
                    <div class="urbania-spec-icon" aria-hidden="true">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 19V5a2 2 0 0 1 2-2h8l4 4v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <line stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  x1="12" y1="18" x2="12" y2="12"/>
                            <line stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  x1="9" y1="15" x2="15" y2="15"/>
                        </svg>
                    </div>
                    <div>
                        <p class="urbania-spec-label">Fuel type</p>
                        <p class="urbania-spec-value">Diesel</p>
                    </div>
                </div>

                <!-- AC -->
                <div class="urbania-spec-item">
                    <div class="urbania-spec-icon" aria-hidden="true">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 2v10M4.93 10.93l1.41 1.41M2 18h2M20 18h2
                                     M19.07 10.93l-1.41 1.41M22 22H2
                                     M8 6l4-4 4 4M16 18a4 4 0 0 0-8 0"/>
                        </svg>
                    </div>
                    <div>
                        <p class="urbania-spec-label">Air conditioner</p>
                        <p class="urbania-spec-value">Premium AC</p>
                    </div>
                </div>

                <!-- Emission -->
                <div class="urbania-spec-item">
                    <div class="urbania-spec-icon" aria-hidden="true">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <div>
                        <p class="urbania-spec-label">Emission standard</p>
                        <p class="urbania-spec-value">BS6 Compliant</p>
                    </div>
                </div>

                <!-- Brand -->
                <div class="urbania-spec-item">
                    <div class="urbania-spec-icon" aria-hidden="true">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <rect stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="urbania-spec-label">Brand</p>
                        <p class="urbania-spec-value">Force Motors</p>
                    </div>
                </div>

                <!-- Usage -->
                <div class="urbania-spec-item">
                    <div class="urbania-spec-icon" aria-hidden="true">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <div>
                        <p class="urbania-spec-label">Usage type</p>
                        <p class="urbania-spec-value">Tour &amp; Travel</p>
                    </div>
                </div>

            </div><!-- /specs-grid -->

            <hr class="urbania-divider">

            <!-- Features Section with 'Classy' Background -->
            <div class="urbania-features-container">
                <p class="urbania-features-title">Included Premium Features</p>
                <div class="urbania-features-grid">

                    <?php
                    $urbania_features = [
                        'Spacious luxury interior',
                        'Premium reclining seats',
                        'High-speed Wifi & GPS',
                        'Professional uniform driver',
                        'Local & outstation trips',
                        'Ample luggage storage',
                        'Full entertainment system',
                        'Individual reading lights',
                    ];
                    foreach ($urbania_features as $feat):
                    ?>
                    <div class="urbania-feature-tag">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <polyline stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                      points="20 6 9 17 4 12"/>
                        </svg>
                        <?= $feat ?>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div><!-- /urbania-features-container -->

            <!-- CTA Buttons -->
            <div class="urbania-cta">
                <a href="tel:+918377809809"
                   class="ui-btn ui-btn-primary"
                   id="urbania-book-btn"
                   aria-label="Call to book Urbania">
                    📞 Request Booking      
                </a>
                <a href="https://api.whatsapp.com/send?phone=+919818022687&text=Hi!%20I%20want%20to%20book%20Force%20Urbania%20in%20Varanasi."
                   class="ui-btn ui-btn-outline"
                   id="urbania-whatsapp-btn"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="WhatsApp for Urbania booking">
                    💬 WhatsApp Us
                </a>
            </div>

        </div><!-- /urbania-hero-body -->
    </div><!-- /urbania-hero-card -->


    <!-- =====================================================
         VARIANT FLEET GRID  (mini pricing cards)
    ====================================================== -->
    <h3 class="section-title" style="font-size: var(--font-size-3xl); margin-bottom: var(--space-lg);">
        Urbania Variants &amp; Pricing
    </h3>

    <div class="urbania-grid">

        
        <!-- 12 Seater -->
        <div class="urbania-card">
            <div class="img-box-u">
                <img src="images/12-seater-urbania1.webp"
                     alt="12 Seater Force Urbania on rent in Varanasi"
                     class="img-cover"
                     loading="lazy"
                     itemprop="image">
            </div>
            <div class="urbania-card-body">
                <h3 class="urbania-card-title" itemprop="name"><a href="https://www.taxiyatri.com/12-seater-force-urbania">12 Seater Urbania</a></h3>
                <div class="u-info-item"><strong>Seat:</strong> 12 Passengers + 1 Driver</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Fare Per Km:</strong> Rs. 30</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Driver Charges:</strong> Rs. 600/- (Per Day)</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Min Per Day:</strong> 250 Km (Extra Tax &amp; Parking)</div>
                <hr class="u-divider">
                <div class="u-badge-facility">
                    <strong>Facility:</strong> Premium AC, Pushback Seats, Music, GPS
                </div>
            </div>
        </div>

        <!-- 15 Seater -->
        <div class="urbania-card" >
            <div class="img-box-u">
                <img src="images/15-seater-urbania1.webp"
                     alt="15 Seater Force Urbania on rent in Varanasi"
                     class="img-cover"
                     loading="lazy"
                     itemprop="image">
            </div>
            <div class="urbania-card-body">
                <h3 class="urbania-card-title" itemprop="name">15 Seater Urbania</h3>
                <div class="u-info-item"><strong>Seat:</strong> 15 Passengers + 1 Driver</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Fare Per Km:</strong> Rs. 32</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Driver Charges:</strong> Rs. 600/- (Per Day)</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Min Per Day:</strong> 250 Km (Extra Tax &amp; Parking)</div>
                <hr class="u-divider">
                <div class="u-badge-facility">
                    <strong>Facility:</strong> Premium AC, Pushback Seats, Wifi, GPS
                </div>
            </div>
        </div>

        <!-- Urbania TT variant -->
        <div class="urbania-card" >
            <div class="img-box-u">
                <img src="images/urbania-tt.webp"
                     alt="Urbania Tempo Traveller variant in Varanasi"
                     class="img-cover"
                     loading="lazy"
                     itemprop="image">
            </div>
            <div class="urbania-card-body">
                <h3 class="urbania-card-title" itemprop="name"><a href="https://www.taxiyatri.com/17-seater-force-urbania">17 Seater Urbania</a></h3>
                <div class="u-info-item"><strong>Seat:</strong> 17 Premium Seats</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Fare Per Km:</strong> Rs. 32</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Driver Charges:</strong> Rs. 600/- (Per Day)</div>
                <hr class="u-divider">
                <div class="u-info-item"><strong>Min Per Day:</strong> 250 Km (Extra Tax &amp; Parking)</div>
                <hr class="u-divider">
                <div class="u-badge-facility">
                    <strong>Facility:</strong> Premium AC, New Gen Comfort, Wifi, GPS
                </div>
            </div>
        </div>

    </div><!-- /urbania-grid -->

</section><!-- /urbania-section -->

<!-- =====================================================
     GALLERY SCRIPT  — scoped, no global pollution
====================================================== -->
<script>
(function () {
    'use strict';
    /**
     * urbaniaChangeImg — updates main gallery image and active thumb.
     * Exposed globally so inline onclick in older PHP templates works.
     * @param {string} url   - New image src
     * @param {Element} thumb - Clicked thumbnail element
     */
    window.urbaniaChangeImg = function (url, thumb) {
        var mainImg = document.getElementById('urbania-main-img');
        if (!mainImg) return;

        // Fade out → swap src → fade in
        mainImg.style.opacity = '0';
        setTimeout(function () {
            mainImg.src = url;
            mainImg.style.opacity = '1';
        }, 150);

        // Toggle active class on thumbnails
        var thumbs = document.querySelectorAll('.urbania-thumb');
        thumbs.forEach(function (t) { t.classList.remove('active'); });
        if (thumb) thumb.classList.add('active');
    };

    // Apply transition style once DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        var mainImg = document.getElementById('urbania-main-img');
        if (mainImg) {
            mainImg.style.transition = 'opacity 0.18s ease';
        }
    });
}());
</script>
