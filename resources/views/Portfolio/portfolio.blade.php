@extends('layouts.app')

@section('content')
<!-- Portfolio / Features Section -->
<style>
/* Section background matched to your main theme */
.portfolio-section {
    background: linear-gradient(180deg, #09271b 0%, #0f3726 100%);
    padding: 70px 0 90px;
    color: #fff;
    position: relative;
    overflow: hidden;
}

/* Organic leaf-style overlay (subtle, premium) */
.portfolio-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        radial-gradient(circle at 12% 20%, rgba(255,255,255,0.04), transparent 60%),
        radial-gradient(circle at 90% 80%, rgba(255,255,255,0.03), transparent 70%);
    pointer-events: none;
}

/* Title styling */
.portfolio-hero {
    text-align: center;
    margin-bottom: 42px;
}
.portfolio-hero h2 {
    font-size: 36px;
    font-weight: 700;
    letter-spacing: .2px;
    color: #c9ffd3; /* soft mint green */
}
.portfolio-hero p.lead {
    opacity: .85;
    color: #d4f8df;
}

/* Cards grid */
.portfolio-card {
    background: rgba(255,255,255,0.05); /* light green-tinted glass */
    border-radius: 14px;
    padding: 34px 22px;
    text-align: center;
    min-height: 170px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    color: #eafff0;
    border: 1px solid rgba(255,255,255,0.06);
    backdrop-filter: blur(6px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 18px rgba(0,0,0,0.25);
}

/* Hover effect tuned to your light-green theme */
.portfolio-card:hover {
    transform: translateY(-10px);
    background: rgba(155, 207, 101, 0.18);    /* translucent CAN-GREEN */
    box-shadow: 0 16px 40px rgba(0,0,0,0.35);
    border-color: rgba(155, 207, 101, 0.35); 
}

/* Icon / logo box */
.portfolio-card .icon {
    width:72px;
    height:72px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.05);
    margin-bottom:18px;
}

.portfolio-card h5 {
    margin: 0;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    color: #c8fdd7;
}

.portfolio-card p {
    margin: 8px 0 0;
    font-size: 13px;
    color: #e3ffe9;
    opacity: .85;
}

/* Responsive tweaks */
@media (max-width: 575px) {
    .portfolio-section { padding: 36px 0; }
    .portfolio-card { min-height:150px; }
}
</style>


<section class="portfolio-section">
  <div class="container">
    <div class="portfolio-hero">
      <h2>Our Brands & Partnerships</h2>
      <p class="lead">A curated selection of cannabis brands, farms, media, and products we proudly support.</p>
    </div>

    <div class="row portfolio-grid">
      @php
        // If no $projects passed, show a default demo list:
    $projects = [
    ['title'=>'CAN GROUP',            
     'desc'=>'The parent company powering all CAN ecosystem brands.',
     'image'=>'assets/images/can-logo/logo1.png'],

    ['title'=>'STEIF CANNABIS',       
     'desc'=>'Premium cannabis cultivation and high-grade flower production.',
     'image'=>'assets/images/can-logo/logo2.png'],

    ['title'=>'STEIF BRAND',          
     'desc'=>'Lifestyle brand delivering apparel, culture, and creativity.',
     'image'=>'assets/images/can-logo/logo3.png'],

    ['title'=>'ROBINSON CREEK RANCH', 
     'desc'=>'Outdoor organic cannabis farming rooted in sustainability.',
     'image'=>'assets/images/can-logo/logo4.png'],

    ['title'=>'CAN SHOP',             
     'desc'=>'Retail marketplace offering curated cannabis and lifestyle products.',
     'image'=>'assets/images/can-logo/logo5.png'],

    ['title'=>'ORGANIC FARMZ',        
     'desc'=>'Organic agriculture focused on clean, natural plant cultivation.',
     'image'=>'assets/images/can-logo/logo6.png'],

    ['title'=>'HONEY BUNNY',          
     'desc'=>'Edible brand specializing in sweet, high-quality infused treats.',
     'image'=>'assets/images/can-logo/logo7.png'],

    ['title'=>'FORT NUGZ',            
     'desc'=>'Bold and flavorful cannabis products crafted for enthusiasts.',
     'image'=>'assets/images/can-logo/logo8.png'],

    ['title'=>'CAN MEDIA',            
     'desc'=>'Digital media network supporting cannabis culture and branding.',
     'image'=>'assets/images/can-logo/logo9.png'],

    ['title'=>'CANDYMAN',             
     'desc'=>'Fun and flavorful cannabis edibles inspired by classic sweets.',
     'image'=>'assets/images/can-logo/logo10.png'],

    ['title'=>'NATURAL MEDS',         
     'desc'=>'Holistic cannabis wellness products promoting natural healing.',
     'image'=>'assets/images/can-logo/logo11.png'],

    ['title'=>'CAN BANK',             
     'desc'=>'Financial solutions designed for cannabis businesses and vendors.',
     'image'=>'assets/images/can-logo/logo12.png'],

    ['title'=>'SMOKE & RIDE',         
     'desc'=>'Cannabis-inspired lifestyle brand for adventure and travel lovers.',
     'image'=>'assets/images/can-logo/logo13.png'],

    ['title'=>'COCO’S GRAPES',        
     'desc'=>'Premium grape-flavored cannabis strains and infused products.',
     'image'=>'assets/images/can-logo/logo14.png'],

    ['title'=>'J3SS3 F4RR3LL',        
     'desc'=>'Artist and designer collaborating across the CAN brand network.',
     'image'=>'assets/images/can-logo/logo15.png'],

    ['title'=>'REDWOOD PRESERVE',     
     'desc'=>'Eco-focused outdoor brand supporting conservation and wellness.',
     'image'=>'assets/images/can-logo/logo16.png'],

    ['title'=>'DOUBLE DRAGON',        
     'desc'=>'High-energy cannabis brand inspired by power and mythology.',
     'image'=>'assets/images/can-logo/logo17.png'],

    ['title'=>'UKIAH BIKEPARK',       
     'desc'=>'Community-driven outdoor park supporting biking and local youth.',
     'image'=>'assets/images/can-logo/logo18.png'],

    ['title'=>'CHAIN GAMES',          
     'desc'=>'Blockchain-powered gaming and esports experiences.',
     'image'=>'assets/images/can-logo/logo19.png'],

    ['title'=>'MONEY GROWS',          
     'desc'=>'Financial education and investment brand for the cannabis era.',
     'image'=>'assets/images/can-logo/logo20.png'],
];



        $list = $projects ?? $demo;
      @endphp

      @foreach($list as $item)
        @php
          // item can be associative: ['title'=>..,'desc'=>..,'icon'=>..,'image'=>..]
          $title = data_get($item,'title', $item);
          $desc  = data_get($item,'desc','');
          $img   = data_get($item,'image', null);
        @endphp

        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="portfolio-card h-100">
            <div class="icon">
               <img src="{{ asset($img) }}" alt="{{ $title }}">
            </div>
            <h5>{{ $title }}</h5>
            @if($desc)
              <p class="mb-0">{{ $desc }}</p>
            @endif
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>
@endsection
