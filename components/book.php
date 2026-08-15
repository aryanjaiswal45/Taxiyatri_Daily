<link rel="stylesheet" href="css/components/book.css">
  <section class="booking-section">
    <h2 class="section-title">Book a Cab with TaxiYatri</h2>
    <p class="section-subtitle">Book your ride in a few simple steps -- fast, easy, and reliable cab service across India.</p>

    <div class="booking-layout">

      <!-- Image Placeholder for Booking Process -->
      <div class="booking-image-wrapper">
        <img 
          id="booking-process-image"
          src="images/book1.webp" 
          alt="TaxiYatri booking process - Step 1: Visit and Search"
          class="booking-process-img"
          loading="lazy"
        >
      </div>

      <!-- Steps Cards -->
      <div class="steps-list">

        <div class="step-card active" data-step="1">
          <div class="step-header">
            <div class="step-number">1</div>
            <div class="step-header-text">
              <span>Step 1</span>
              <h4>Visit TaxiYatri & Search</h4>
            </div>
          </div>
          <p class="step-description">
            Visit our official website "TaxiYatri.com" and enter your Journey Details.
          </p>
        </div>

        <div class="step-card" data-step="2">
          <div class="step-header">
            <div class="step-number">2</div>
            <div class="step-header-text">
              <span>Step 2</span>
              <h4>Choose Your Vehicle</h4>
            </div>
          </div>
          <p class="step-description">
            Browse available cars from Sedan to SUV and Luxury. Compare prices, seating capacity, and select the one that fits your needs.
          </p>
        </div>

        <div class="step-card" data-step="3">
          <div class="step-header">
            <div class="step-number">3</div>
            <div class="step-header-text">
              <span>Step 3</span>
              <h4>Enter Details </h4>
            </div>
          </div>
          <p class="step-description">
            Fill in your personal details to register with TaxiYatri.
          </p>
        </div>

        <div class="step-card" data-step="4">
          <div class="step-header">
            <div class="step-number">4</div>
            <div class="step-header-text">
              <span>Step 4</span>
              <h4>Choose your payment option</h4>
            </div>
          </div>
          <p class="step-description">
            Confirm your booking and make a secure payment via UPI, card, or net banking.
          </p>
        </div>

        <div class="step-card" data-step="5">
          <div class="step-header">
            <div class="step-number">5</div>
            <div class="step-header-text">
              <span>Step 5</span>
              <h4>Complete Trip & Rate</h4>
            </div>
          </div>
          <p class="step-description">
            Once you arrive at your destination, you can easily rate your driver and overall experience. It's that simple with TaxiYatri!
          </p>
        </div>

      </div>

    </div>
  </section>

  <script>
    // Image switching functionality for booking process steps
    const stepCards = document.querySelectorAll('.step-card');
    const bookingImage = document.getElementById('booking-process-image');

    // Define image sources and alt text for each step
    const stepImages = {
      '1': {
        src: 'images/book1.webp',
        alt: 'TaxiYatri booking process - Step 1: Visit and Search'
      },
      '2': {
        src: 'images/book2.webp',
        alt: 'TaxiYatri booking process - Step 2: Choose Your Vehicle'
      },
      '3': {
        src: 'images/book3.webp',
        alt: 'TaxiYatri booking process - Step 3: Enter Details and Pay'
      },
      '4': {
        src: 'images/book4.webp',
        alt: 'TaxiYatri booking process - Step 4: Track Your Ride Live'
      },
      '5': {
        src: 'images/book5.webp',
        alt: 'TaxiYatri booking process - Step 5: Complete Trip and Rate'
      }
    };

    // Add click event to each step card
    stepCards.forEach(card => {
      card.addEventListener('click', () => {
        const step = card.getAttribute('data-step');

        // Update active step card styling
        stepCards.forEach(c => c.classList.remove('active'));
        card.classList.add('active');

        // Switch to corresponding image
        if (stepImages[step] && bookingImage) {
          bookingImage.src = stepImages[step].src;
          bookingImage.alt = stepImages[step].alt;
        }
      });
    });
  </script>
  


