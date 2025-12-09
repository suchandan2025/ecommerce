@extends('layouts.app')

@section('content')
<!-- Portfolio / Features Section -->
<style>
/* Section background matched to your main theme */
.portfolio-section {
    /* background: linear-gradient(180deg, #09271b 0%, #0f3726 100%); */
     background-image: url("{{ asset('assets/images/portfolio/inner-portfolio-bg.png') }}");
    padding: 70px 0 90px;
    color: #fff;
    position: relative;
    overflow: hidden;
}

.portfolio-section > .container {
    padding-top: 20px !important;   /* or 0 */
    margin-top: 0 !important;
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
    width: 100px;
    height: auto;
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
    color: var(--theme-color3);
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



/* Portfolio section */
/* Hero slider section */
.hero-slider {
  position: relative;
  overflow: hidden;
  margin-top: 0 !important;
  padding-top: 0 !important;
}

/* full height header band (dark green) */
.hero-slider .header-band {
  background: linear-gradient(180deg,#0e3b36 0%, #103934 100%);
  /* height: 140px; */
  position: relative;
  z-index: 5;
  box-shadow: inset 0 -6px 18px rgba(0,0,0,0.12);
}

/* subtle leaf pattern in header */
.hero-slider .header-band::before{
  content: "";
  position: absolute;
  inset: 0;
  background-image: radial-gradient(rgba(255,255,255,0.02) 0.5px, transparent 0.5px);
  background-size: 48px 48px;
  opacity: 0.06;
  pointer-events: none;
}

/* container that visually cuts into band (rounded curve) */
.hero-slider .band-curve {
  margin-top: -36px;
  pointer-events: none;
}

/* carousel slides - full width, fixed height */
.hero-slider .carousel,
.hero-slider .carousel-item {
  height: 320px;
  min-height: 220px;
  max-height: 420px;
}

/* background images for slides: cover */
.hero-slider .slide-bg {
 position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  filter: brightness(0.55);
  z-index: 0;
  
}

.slide-bg::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(rgba(6,20,16,0.55), rgba(6,20,16,0.45));
  z-index: 1;
}

/* overlay content wrapper */
.hero-slider .hero-content {
     position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: min(92%, 900px);
  text-align: center;
  color: #fff;
  z-index: 3;
}

.hero-breadcrumb {
  position: absolute;
  bottom: 20px;
  width: 100%;
  text-align: center;
  z-index: 4;
}

.hero-breadcrumb .breadcrumb {
  background: transparent;
  display: inline-flex;
  justify-content: center;
  margin: 0;
  padding: 0;
  color: #fff;
}

.hero-breadcrumb .breadcrumb a {
  color: #fff;
}

.hero-content .breadcrumb a { color: rgba(255,255,255,0.95); text-decoration: underline; }
.hero-content .breadcrumb .active { color: rgba(255,255,255,0.9); }

.hero-content h1 {
  margin: 0 0 0.375rem;
  font-weight: 700;
  line-height: 1.03;
  font-size: clamp(28px, 5.5vw, 56px);
  letter-spacing: -0.02em;
}

.hero-content .lead-text {
  margin: 0 auto;
  max-width: 46rem;
  font-size: clamp(14px, 2vw, 20px);
  line-height: 1.5;
  opacity: 0.95;
}

/* Title and breadcrumb */
.hero-slider h1 {
  font-size: 48px;
  margin: 0 0 8px;
  font-weight: 800;
  letter-spacing: -0.02em;
  color: #fff;
  text-shadow: 0 6px 18px rgba(6,12,8,0.45);
}

.hero-slider .breadcrumb {
  --bs-breadcrumb-divider: "›";
  background: transparent;
  padding: 0;
  margin-bottom: 14px;
  color: rgba(255,255,255,0.85);
}
.hero-slider .breadcrumb a { color: rgba(255,255,255,0.85); text-decoration:none; }
.hero-slider .breadcrumb .active { color: rgba(255,255,255,0.9); }

/* caption / small text */
.hero-slider .lead-text {
  color: rgba(255,255,255,0.92);
  max-width: 640px;
  margin-top:6px;
  font-size: 15px;
  line-height: 1.55;
  text-shadow: 0 4px 12px rgba(0,0,0,0.35);
}

/* Slide buttons */
.hero-slider .btn-shop {
  margin-top: 18px;
  background: #fff;
  color: #0e3b36;
  border-radius: 6px;
  padding: 10px 18px;
  font-weight: 700;
  box-shadow: 0 10px 28px rgba(10,30,28,0.14);
}

/* carousel navigation (small dots) */
.hero-slider .carousel-indicators [data-bs-target] {
  background-color: rgba(255,255,255,0.65);
}
.hero-slider .carousel-indicators .active {
  background-color: #d6a641;
}

/* responsive tweaks */
@media (max-width: 992px) {
     .carousel-item { min-height: 55vh; }
  .hero-content { width: min(92%, 760px); padding: 18px; transform: translate(-50%,-50%); }
  .hero-content h1 { font-size: clamp(26px, 6.5vw, 44px); }
}
@media (max-width: 576px) {
  /* .hero-slider h1 { font-size: 28px; }
  .hero-slider .carousel { height: 240px; }
  .hero-slider .hero-content { top: 45%; transform: translateY(-45%); } */

  /* .header-band { height: 48px; } */
  .carousel-item { min-height: 46vh; }
  /* slightly nudge up so hero doesn't feel too low on very small screens */
  .hero-content { transform: translate(-50%, -48%); padding: 12px; }
  .hero-content h1 { font-size: clamp(20px, 7.5vw, 34px); }
  .hero-content .lead-text { font-size: clamp(13px, 3.8vw, 16px); padding: 0 6px; }
  .hero-breadcrumb { bottom: 10px; }
}

/* 3) Hero container must have no top margin/padding */
.hero-slider {
  margin-top: 0 !important;
  padding-top: 0 !important;
}

/* 4) Pull the curve up more so there's no visible seam.
   Increase negative value if you still see 1px gap on some screens. */
.hero-slider .band-curve {
  margin-top: -48px !important;  /* previously -36; -48 fixes most seams */
  line-height: 0;
  pointer-events: none;
}

/* 5) Remove any stray margin from the first container under the hero */
.hero-slider + .container,
.hero-slider + .auto-container,
.hero-slider + .wrapper {
  margin-top: 0 !important;
  padding-top: 0 !important;
}

/* 6) Ensure SVG path fill matches the header bottom color so no white shows through.
   If your hero below is dark-image, we use the same green as header-band. */
:root {
  --heroHeaderGreen: #0e3b36;
}
.hero-slider .band-curve svg path { fill: var(--heroHeaderGreen) !important; }

/* 7) Safety: if theme adds a top spacing element, hide 1px seam by forcing background */
.hero-slider .header-band {
  background: linear-gradient(180deg,#0e3b36 0%, #103934 100%) !important;
  box-shadow: inset 0 -6px 18px rgba(0,0,0,0.12);
  margin-bottom: 0 !important;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

/* 8) For sticky or fixed navbars that set body padding-top (Bootstrap) */
body[style*="padding-top"] {
  padding-top: 0 !important;
}

/* 9) tiny responsive tweak: adjust curve pull on small screens */
@media (max-width: 576px) {
  .hero-slider .band-curve { margin-top: -36px !important; }
}

</style>

<section class="hero-slider">
  <!-- top dark band -->
  <div class="header-band w-100"></div>
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner position-relative">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="slide-bg" style="background-image:url('assets/images/portfolio/inner-portfolio-bg-3.jpg');"></div>

        <div class="hero-content">
          <h1>Portfolio</h1>
          <p class="lead-text">Premium cannabis products made with purpose — responsibly grown, expertly refined, and quality-driven.</p>
          {{-- <a class="btn btn-shop" href="about.html">Read More</a> --}}
        </div>
         <div class="hero-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
            </ol>
          </nav>
        </div>
        </div>
      </div>
    </div>
</section>

<section class="portfolio-section">
  <div class="container">
    {{-- <div class="portfolio-hero">
      <h2>Our Brands & Partnerships</h2>
      <p class="lead">A curated selection of cannabis brands, farms, media, and products we proudly support.</p>
    </div> --}}

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
               <img src="{{ asset($img) }}" alt="{{ $title }}" style="border-radius: 6px;">
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
