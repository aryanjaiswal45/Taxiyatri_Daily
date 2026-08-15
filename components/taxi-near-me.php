
<link rel="stylesheet" href="css/components/near-me.css">
<section class="locations-section" id="locations">
    <div class="locations-inner">
        
        <div class="city-tabs" id="cityTabs"></div>
        
        
        <div id="cityPanels"></div>
    </div>
</section>

<script>

const NearMeComponent = {
    cities: [
        {
            id: 'lucknow', 
            name: 'Lucknow', 
            drivers: '812', 
            rating: '4.9★', 
            rides: '5,200+', 
            wait: '3.8 min',
            desc: 'Serving Hazratganj, Gomti Nagar, Alambagh & all major areas 24/7.',
            routes: [
                { from: 'Hazratganj', to: 'Airport', fare: '₹420', time: '28m' },
                { from: 'Gomti Nagar', to: 'Charbagh', fare: '₹180', time: '22m' },
                { from: 'Aliganj', to: 'KGMC Hosp', fare: '₹140', time: '18m' },
                { from: 'Indira Nagar', to: 'Hazratganj', fare: '₹110', time: '14m' }
            ]
        },
        {
            id: 'delhi', 
            name: 'Delhi NCR', 
            drivers: '2,140', 
            rating: '4.8★', 
            rides: '12,500+', 
            wait: '3.2 min',
            desc: 'Full coverage across Delhi, Noida, Gurgaon & Faridabad.',
            routes: [
                { from: 'Connaught Place', to: 'Airport', fare: '₹680', time: '45m' },
                { from: 'Noida Sec 62', to: 'Cyber City', fare: '₹550', time: '55m' },
                { from: 'Lajpat Nagar', to: 'New Delhi', fare: '₹190', time: '20m' },
                { from: 'Dwarka', to: 'Saket', fare: '₹320', time: '35m' }
            ]
        },
        {
            id: 'mumbai', 
            name: 'Mumbai', 
            drivers: '1,840', 
            rating: '4.7★', 
            rides: '10,200+', 
            wait: '4.5 min',
            desc: 'BKC, Andheri, Bandra, Dadar & Navi Mumbai covered.',
            routes: [
                { from: 'BKC', to: 'Airport', fare: '₹390', time: '25m' },
                { from: 'Andheri West', to: 'Bandra', fare: '₹180', time: '18m' },
                { from: 'Dadar', to: 'Churchgate', fare: '₹240', time: '28m' },
                { from: 'Thane', to: 'BKC', fare: '₹480', time: '45m' }
            ]
        },
        {
            id: 'bangalore', 
            name: 'Bangalore', 
            drivers: '980', 
            rating: '4.8★', 
            rides: '8,900+', 
            wait: '4.1 min',
            desc: 'Whitefield, Koramangala, Indiranagar & E-City.',
            routes: [
                { from: 'Koramangala', to: 'Whitefield', fare: '₹520', time: '50m' },
                { from: 'Indiranagar', to: 'E-City', fare: '₹480', time: '45m' },
                { from: 'MG Road', to: 'Airport', fare: '₹780', time: '55m' },
                { from: 'HSR Layout', to: 'MG Road', fare: '₹220', time: '22m' }
            ]
        }
    ],

    init: function() {
        const tabsContainer = document.getElementById('cityTabs');
        const panelsContainer = document.getElementById('cityPanels');
        if (!tabsContainer || !panelsContainer) return;

        this.cities.forEach((c, i) => {
            const tab = document.createElement('button');
            tab.className = 'city-tab' + (i === 0 ? ' active' : '');
            tab.textContent = c.name;
            tab.onclick = () => this.switchCity(c.id);
            tabsContainer.appendChild(tab);

            const panel = document.createElement('div');
            panel.className = 'city-panel' + (i === 0 ? ' active' : '');
            panel.id = 'city-' + c.id;
            panel.style.display = i === 0 ? 'block' : 'none';
            panel.innerHTML = `
                <div class="city-card-horizontal">
                    <div class="city-col-info">
                        <div class="city-header-small">
                            <h2 class="city-name-small">${c.name}</h2>
                            <div class="live-badge-small"><span class="live-dot"></span>${c.drivers} online</div>
                        </div>
                        <p class="city-desc-small">${c.desc}</p>
                        <div class="stats-grid-small">
                            <div class="stat-item-small"><div class="stat-val-small">${c.drivers}</div><div class="stat-lbl-small">Drivers</div></div>
                            <div class="stat-item-small"><div class="stat-val-small">${c.rating}</div><div class="stat-lbl-small">Rating</div></div>
                            <div class="stat-item-small"><div class="stat-val-small">${c.rides}</div><div class="stat-lbl-small">Rides</div></div>
                            <div class="stat-item-small"><div class="stat-val-small">${c.wait}</div><div class="stat-lbl-small">Wait</div></div>
                        </div>
                    </div>
                    <div class="city-col-routes">
                        <div class="routes-header-small">Popular Routes</div>
                        <ul class="route-list-small">
                            ${c.routes.map(r => `
                                <li class="route-item-small">
                                    <div class="route-main-small">📍 ${r.from} → ${r.to}</div>
                                    <div class="route-info-small">
                                        <span class="route-price-small">${r.fare}</span>
                                        <span class="route-time-small">${r.time}</span>
                                    </div>
                                </li>
                            `).join('')}
                        </ul>
                        <button class="book-btn-small" onclick="if(window.scrollBook) scrollBook()">
                            Book in ${c.name} →
                        </button>
                    </div>
                </div>
            `;
            panelsContainer.appendChild(panel);
        });
    },

    switchCity: function(id) {
        document.querySelectorAll('.city-tab').forEach(t => t.classList.remove('active'));
        const activeTab = Array.from(document.querySelectorAll('.city-tab')).find(t => t.textContent === this.cities.find(c => c.id === id).name);
        if (activeTab) activeTab.classList.add('active');

        document.querySelectorAll('.city-panel').forEach(p => {
            p.style.display = p.id === 'city-' + id ? 'block' : 'none';
        });
    }
};

document.addEventListener('DOMContentLoaded', () => NearMeComponent.init());
</script>
