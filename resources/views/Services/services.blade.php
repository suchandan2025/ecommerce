@extends('layouts.app')

@section('content')
<style>
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


:root{
  --brand-dark: #071a12;
  --brand-mid:  #0e3b36;
  --brand-soft: #1b6b4f;
  --mint:       #9BCF65;
  --white-card: #ffffff;
  --muted:      rgba(255,255,255,0.92);
}

/* Page wrapper */
.services-hero-page {
  background: linear-gradient(180deg, #072119 0%, #0a2f24 100%);
  padding: 44px 0 80px;
  min-height: 100vh;
  display:flex;
  align-items:flex-start;
  justify-content:center;
  color: var(--muted);
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
}

/* container */
.service-container { width: min(1200px, 96%); margin: 0 auto; }

/* Page title */
.services-header { text-align:center; margin-bottom:26px; color: rgba(235,255,240,0.95); }
.services-header h1 { margin:0; font-size: clamp(28px, 4.2vw, 44px); font-weight:800; color: #e8ffee; letter-spacing: -0.01em; }
.services-header p.subtitle { margin:8px 0 0; color: rgba(200,255,220,0.9); font-size:15px; }

/* overall two-column card - ensure equal height columns */
.services-card {
  display:grid;
  grid-template-columns: 48% 52%;
  gap: 0;
  align-items: stretch;          /* important: stretch to equal height */
  width:100%;
}

/* left image area */
.services-left {
  overflow:hidden;
  border-top-left-radius:12px;
  border-bottom-left-radius:12px;
  display:flex;
  align-items:stretch;           /* stretch so image fills column height */
  justify-content:center;
  background: linear-gradient(180deg, rgba(6,20,16,0.03), rgba(6,20,16,0.03));
}
.services-left .hero-image {
  width:100%;
  height:100%;                   /* fill the column height */
  object-fit: cover;             /* crop smartly */
  /* border-radius:10px; */
  box-shadow: 0 18px 48px rgba(0,0,0,0.55);
  display:block;
}

/* right white panel */
.services-right {
  background: var(--white-card);
  padding: 34px;
  border-top-right-radius:12px;
  border-bottom-right-radius:12px;
  box-shadow: 0 12px 36px rgba(2,8,6,0.28);
  display:flex;
  flex-direction:column;
  justify-content:space-between;
}

/* right top heading inside card */
.services-right .card-heading h3 { margin:0; color: #0b3f34; font-size:18px; font-weight:800; }
.services-right .card-heading p { margin:8px 0 0; color:#4c6c61; font-size:14px; }

/* grid of service items */
.services-grid {
  margin-top:16px;
  display:grid;
  grid-template-columns: repeat(2,1fr);
  gap:18px 22px;
}

/* single service item — full clickable area */
.service-item {
  display:flex;
  gap:14px;
  align-items:flex-start;
  padding:14px;
  border-radius:10px;
  transition: transform .22s ease, box-shadow .22s ease, background .22s ease;
  cursor: pointer;                /* indicates interactivity */
  background: rgba(6, 20, 16, 0.02);
  border: 1px solid rgba(12, 24, 20, 0.03);
   transition: all 0.28s ease;
    position: relative;
}

.service-item .icon i {
    font-size: 26px;
    color: var(--brand-soft);
    transition: all 0.3s ease;
}

.service-item:hover .icon i {
    color: #9BFF8A; /* light cannabis green */
    text-shadow: 
        0 0 6px rgba(104, 255, 154, 0.8),
        0 0 12px rgba(104, 255, 154, 0.6),
        0 0 20px rgba(104, 255, 154, 0.4);
}

/* Glow ring around icon */
.service-item .icon {
    transition: all 0.3s ease;
}

.service-item:hover .icon {
    box-shadow:
        0 0 10px rgba(104, 255, 154, 0.4),
        0 0 16px rgba(104, 255, 154, 0.25),
        inset 0 0 14px rgba(104, 255, 154, 0.22);
}

/* hover state */
.service-item:hover {
  transform: translateY(-6px);
    background: rgba(155, 255, 155, 0.05);
    border-color: rgba(155, 255, 155, 0.25);
    box-shadow: 
        0 0 8px rgba(85, 255, 174, 0.35),
        0 0 18px rgba(85, 255, 174, 0.18),
        0 14px 40px rgba(0, 0, 0, 0.35);
}

/* icon circle (now with <img>) */
.service-item .icon {
  width:60px;
  height:60px;
  border-radius:50%;
  display:grid;
  place-items:center;
  background: linear-gradient(180deg, rgba(155,207,101,0.12), rgba(155,207,101,0.06));
  flex-shrink:0;
  box-shadow: 0 6px 18px rgba(16,40,32,0.06);
  overflow:hidden;
}
.service-item .icon img {
  width:34px;
  height:34px;
  object-fit:contain;
  display:block;
  filter: none;
}

/* text */
.service-item .text h4 { margin:0; font-size:15px; color:#0b3f34; font-weight:700; }
.service-item .text p { margin:6px 0 0; color:#4c6c61; font-size:13px; line-height:1.45; }

/* clickable anchor inside the item (full coverage) */
.service-item a.full-link {
  position:absolute;
  inset:0;
  z-index: 5;
  text-indent: -9999px;          /* hide text but remain accessible */
  background: transparent;
  border: none;
}

/* For layout to allow absolute links inside grid items */
.services-grid > div { position: relative; }

/* CTA and trust row */
.services-right .meta-row { margin-top:18px; display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap; }
.trust-text { color:#55786f; font-size:13px; }
.btn-cann { background: var(--mint); color: #072119; padding:10px 14px; font-weight:700; border-radius:10px; text-decoration:none; border: none; display:inline-block; }

/* responsive */
@media (max-width: 980px) {
  .services-card { grid-template-columns: 1fr; }
  .services-left { order: 2; }
  .services-right { order: 1; margin-bottom:16px; }
  .services-left .hero-image { max-height:360px; }
}
@media (max-width:520px) {
  .services-grid { grid-template-columns: 1fr; }
  .service-item .icon { width:52px; height:52px; }
}

.service-item .icon i {
    font-size: 26px;
    color: var(--brand-soft);   /* cannabis green */
}

.service-item:hover .icon i {
    color: #0f5c49;             /* darker green on hover */
    transition: .22s ease;
}


/* ---------- Testimonials: fixed cannabis theme ---------- */
.services-testimonial-section,
.testimonial-wrap,
.testimonial-inner { position: relative; z-index: 1; }

/* page background (darker, consistent) */
.testimonial-wrap {
  background: linear-gradient(180deg, #07332b 0%, #052a24 100%);
  padding: 64px 0 90px;
  color: #e9fff0;
}

/* title - bring above carousel and make readable */
.testimonial-inner .sec-title {
  text-align:center;
  margin-bottom: 28px;
  position: relative;
  z-index: 50;
}
.testimonial-inner .sec-title .sub-title {
  color: #bfeea4;
  font-weight:700;
  letter-spacing: .6px;
  font-size:13px;
  text-transform:uppercase;
  display:block;
}
.testimonial-inner .sec-title h2 {
  margin: 6px 0 8px;
  font-size: clamp(20px, 3.2vw, 34px);
  color: rgba(201,255,211,0.95);
  font-weight:800;
  text-shadow: none;
}

/* carousel container center and width */
.outer-box { max-width: 1200px; margin: 0 auto; position: relative; z-index: 20; }

/* owl items: center alignment and stable layout */
.testimonial-carousel .owl-stage-outer { padding-top: 50px; }
.testimonial-carousel .owl-item { display:flex; justify-content:center; align-items:stretch; }

/* card base: increase contrast and reduce translucency for readability */
.testimonial-card {
    display: flex;
  max-width: calc(100% - 26px);
  background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(255,255,255,0.98));
  border-radius: 12px;
  padding: 56px 28px 22px; /* leave room for avatar */
  box-shadow: 0 18px 46px rgba(2,8,6,0.28);
  border-top: 6px solid rgba(155,207,101,0.08);
  position: relative;
  transition: transform .28s ease, box-shadow .28s ease;
  display:flex;
  flex-direction:column;
  align-items:center;
  text-align:center;
  color: #0b3f34;
}

/* avatar circle position & green ring behavior */
.card-avatar {
  width:96px;
  height:96px;
  border-radius:50%;
  position:absolute;
  top:-48px;
  left:50%;
  transform: translateX(-50%);
  z-index: 6;
  display:grid;
  place-items:center;
  background:#fff;
  box-shadow: 0 12px 28px rgba(6,20,16,0.12);
  border: 6px solid #ffffff; /* default white ring */
}

/* when center, make ring green and more prominent */
.owl-item.center .card-avatar {
  border-color: #9bcf65; /* brand green ring */
  box-shadow: 0 20px 56px rgba(6,20,16,0.25);
}

/* small quote badge under avatar */
.quote-badge {
  position: absolute;
  top: 14px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 7;
  width:36px; height:36px;
  background: #9bcf65; color: #072119; border-radius:50%;
  display:grid; place-items:center; font-size:14px;
  box-shadow: 0 6px 12px rgba(10,30,24,0.12);
  border: 3px solid #fff;
}

/* center card style (highlight) */
.owl-item.center .testimonial-card {
  background: linear-gradient(180deg,#06312a,#0a3d35);
  color: rgba(230,255,235,0.98);
  transform: translateY(-12px) scale(1.04);
  border-top-color: #c9ffd3;
  box-shadow: 0 36px 96px rgba(2,8,6,0.44);
}

/* text color adjustments for readability */
.owl-item.center .testimonial-card .quote { color: rgba(230,255,235,0.98); }
.owl-item.center .testimonial-card .person { color: #c9ffd3; }
.owl-item.center .testimonial-card .role { color: rgba(200,255,220,0.85); }

/* quote text / meta */
.testimonial-card .quote {
  font-size: 15px;
  line-height: 1.65;
  margin-top: 18px;
  margin-bottom: 18px;
  color: #0b3f34;
}
.testimonial-card .person { font-weight: 800; color: #0b3f34; margin-bottom:6px; }
.testimonial-card .role { color: #55786f; font-size:13px; }

/* for center card text colors */
.owl-item.center .testimonial-card .quote { color: rgba(230,255,235,0.98); }

/* navigation dots */
.testimonial-carousel .owl-dots { text-align:center; margin-top: 18px; z-index: 30; position: relative; }
.testimonial-carousel .owl-dots .owl-dot { display:inline-block; width:10px;height:10px;margin:0 6px;background:#cfe8d1;border-radius:50%; transition: all .22s ease; }
.testimonial-carousel .owl-dots .owl-dot.active { background:#9bcf65; box-shadow: 0 8px 18px rgba(155,207,101,0.2); transform: scale(1.1); }

/* responsive */
/* ========== 1100px ========== */
@media (max-width: 1100px) {
  .testimonial-card {
    width: 420px;
    padding: 70px 28px 28px; /* increased top padding for avatar */
    min-height: 380px;       /* keeps card height consistent */
  }
  .card-avatar {
    width: 86px;
    height: 86px;
    top: -43px;
  }
}


/* ========== 760px ========== */
@media (max-width: 760px) {
  .testimonial-card {
    width: 90%;
    padding: 85px 22px 24px; /* more top padding to prevent squeeze */
    min-height: 360px;       /* stable height */
    margin: 0 auto;
  }
  .card-avatar {
    width: 80px;
    height: 80px;
    top: -40px;
  }
}


/* ========== 420px (Phones) ========== */
@media (max-width: 420px) {
  .testimonial-card {
    width: 94%;
    padding: 95px 18px 20px; /* extra top padding for small screens */
    min-height: 340px;       /* keeps layout from collapsing */
    margin: 0 auto;
  }
  .card-avatar {
    width: 72px;
    height: 72px;
    top: -36px;
  }
}

/* Star Rating */
.star-rating {
    display: flex;
    justify-content: center;
    gap: 4px;
    margin: 6px 0 10px;
}

.star-rating i {
    font-size: 17px;
     color: #FFD43B; /* cannabis green */
    text-shadow: 0 0 6px rgba(255, 212, 59, 0.45);
    transition: color .25s ease, transform .25s ease;
}

/* Center card (highlight) */
.owl-item.center .testimonial-card .star-rating i {
     color: #FFE680; /* brighter glow */
    text-shadow: 0 0 10px rgba(255, 230, 128, 0.6);
}

/* Hover animation (only on desktop) */
@media (hover: hover) {
    .testimonial-card:hover .star-rating i {
        transform: translateY(-2px);
    }
}

/* Mobile adjustments */
@media (max-width: 420px) {
    .star-rating i { font-size: 15px; }
}


</style>
<section class="hero-slider">
  <!-- top dark band -->
  <div class="header-band w-100"></div>
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner position-relative">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="slide-bg" style="background-image:url('assets/images/services/service-bg-2.png');"></div>

        <div class="hero-content">
          <h1>Services</h1>
          <p class="lead-text">We’re dedicated to delivering premium medical cannabis products — responsibly sourced, lab tested and patient-focused.</p>
          {{-- <a class="btn btn-shop" href="about.html">Read More</a> --}}
        </div>
         <div class="hero-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
          </nav>
        </div>
        </div>
      </div>
    </div>
</section>


<section class="services-hero-page" aria-label="Services for cannabis">
  <div class="service-container">

    <!-- Header -->
    <div class="services-header">
      <h1>Our Services</h1>
      <p class="subtitle">Seed → Cultivation → Extraction → Productization — premium cannabis operations & support</p>
    </div>

    <!-- Two-column composition -->
    <div class="services-card">

      <!-- LEFT: 4K leaf image (text-free) -->
      <div class="services-left" aria-hidden="false">
        <!-- Replace the path below with your 4K leaf image (text-free, high-res). -->
        <img src="{{ asset('assets/images/services/service-bg-3.jpg') }}" alt="Cannabis leaf" class="hero-image" />
      </div>

      <!-- RIGHT: white information card with 4 service blocks -->
      <div class="services-right" role="article" aria-labelledby="services-title">
        <div class="card-heading">
          <h3 id="services-title">What we offer</h3>
          <p>Select a service to learn how we help cannabis businesses grow responsibly and profitably.</p>
        </div>

        <div class="services-grid" role="list" aria-label="Service list">

          <!-- Cultivation -->
          <div class="service-item" role="listitem" tabindex="0" aria-label="Cultivation — click to learn more">
            <div class="icon" aria-hidden="true">
              <i class="fas fa-seedling"></i>
            </div>
            <div class="text">
              <h4>Cultivation</h4>
              <p>Environment design, strain selection, lighting & irrigation plans to maximize potency and yield.</p>
            </div>
            <!-- full-link should point to service page; keep for accessibility -->
            <a href="" class="full-link" aria-hidden="false">Cultivation</a>
          </div>

          <!-- Extraction -->
          <div class="service-item" role="listitem" tabindex="0" aria-label="Extraction & Formulation — click to learn more">
            <div class="icon" aria-hidden="true">
             <i class="fas fa-flask"></i>
            </div>
            <div class="text">
              <h4>Extraction & Formulation</h4>
              <p>CO₂ / ethanol extraction, terpene preservation, and GMP formulation for oils and concentrates.</p>
            </div>
            <a href="{{ url('/services/extraction') }}" class="full-link" aria-hidden="false">Extraction</a>
          </div>

          <!-- Packaging -->
          <div class="service-item" role="listitem" tabindex="0" aria-label="Packaging & Labeling — click to learn more">
            <div class="icon" aria-hidden="true">
               <i class="fas fa-box-open"></i>
            </div>
            <div class="text">
              <h4>Packaging & Labeling</h4>
              <p>Child-resistant packaging, compliant labels, and branding that follows state regulations.</p>
            </div>
            <a href="{{ url('/services/packaging') }}" class="full-link" aria-hidden="false">Packaging</a>
          </div>

          <!-- Distribution -->
          <div class="service-item" role="listitem" tabindex="0" aria-label="Distribution & Logistics — click to learn more">
            <div class="icon" aria-hidden="true">
              <i class="fas fa-truck-moving"></i>
            </div>
            <div class="text">
              <h4>Distribution & Logistics</h4>
              <p>Temperature-controlled shipping, fulfillment, traceability and compliant wholesale distribution.</p>
            </div>
            <a href="{{ url('/services/distribution') }}" class="full-link" aria-hidden="false">Distribution</a>
          </div>

        </div><!-- /.services-grid -->

        <div class="meta-row">
          <div class="trust-text">Trusted partners • Licensed operations • Compliance-first</div>
          <div>
            <a href="" class="btn-cann" title="Contact us about cannabis services">Contact Us</a>
          </div>
        </div>

      </div><!-- /.services-right -->

    </div><!-- /.services-card -->
  </div><!-- /.container -->
</section>

 <!-- FAQ Section -->
        <section class="faqs-section">
            <div class="auto-container">
                <div class="anim-icons">
                    <span class="bg-pattern-left"></span>
                    <span class="bg-pattern-right"></span>
                </div>
                <div class="row">
                    <!-- FAQ Column -->
                    <div class="faq-column col-lg-7 col-md-12 col-sm-12 order-4">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="title">Frequently Asked Questions</span>
                                <h2>You’ve Any Question?</h2>
                                <span class="divider"></span>
                            </div>

                            <ul class="accordion-box">
                                <!--Block-->
                                <li class="accordion block ">
                                    <div class="acc-btn">How long does medical cannabis treatment take?
                                        <div class="icon fa fa-angle-right"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">Suspendisse finibus urna mauris, vitae consequat quam vel. ullamcorper vulputate vitae sodales commodo nisl. Nulla facilisi. Pellentesque est metus many of some form.</div>
                                        </div>
                                    </div>
                                </li>

                                <!--Block-->
                                <li class="accordion block active-block">
                                    <div class="acc-btn active">How long does medical cannabis treatment take?
                                        <div class="icon fa fa-angle-right"></div>
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content">
                                            <div class="text">Suspendisse finibus urna mauris, vitae consequat quam vel. ullamcorper vulputate vitae sodales commodo nisl. Nulla facilisi. Pellentesque est metus many of some form.</div>
                                        </div>
                                    </div>
                                </li>

                                <!--Block-->
                                <li class="accordion block">
                                    <div class="acc-btn">How long does medical cannabis treatment take?
                                        <div class="icon fa fa-angle-right"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">Suspendisse finibus urna mauris, vitae consequat quam vel. ullamcorper vulputate vitae sodales commodo nisl. Nulla facilisi. Pellentesque est metus many of some form.</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <figure class="image"><img src="{{ asset('assets/images/resource/faq.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End FAQ Section -->

<section class="testimonial-wrap">
  <div class="testimonial-inner">
    <div class="sec-title">
      <span class="sub-title">What our clients say</span>
      <h2>Service Feedback</h2>
    </div>

    <div class="outer-box">
      <div class="testimonial-carousel owl-carousel owl-theme">

        <!-- item 1 -->
        <div class="item">
          <div class="testimonial-card">
            <div class="card-avatar">
              <img src="{{ asset('assets/images/resource/testi-thumb-1.jpg') }}" alt="Client 1" style="border-radius: 50%">
            </div>
            <div class="quote-badge"><i class="fa-solid fa-quote-left" style="font-size:14px;"></i></div>

            <div class="quote">I was very impressed by the cultivation and extraction services — professional, compliant and fast. Highly recommended.</div>
            <div class="star-rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <div class="person">Jessica Brown</div>
            <div class="role">Operations Manager</div>
          </div>
        </div>

        <!-- item 2 (center) -->
        <div class="item">
          <div class="testimonial-card">
            <div class="card-avatar">
              <img src="{{ asset('assets/images/resource/testi-thumb-2.jpg') }}" alt="Client 2" style="border-radius: 50%">
            </div>
            <div class="quote-badge"><i class="fa-solid fa-quote-left" style="font-size:14px;"></i></div>

            <div class="quote">Extraction & formulation were top-notch. GMP-level precision and clear batch documentation.</div>
            <div class="star-rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <div class="person">Michael Lee</div>
            <div class="role">Product Lead</div>
          </div>
        </div>

        <!-- item 3 -->
        <div class="item">
          <div class="testimonial-card">
            <div class="card-avatar">
              <img src="{{ asset('assets/images/resource/testi-thumb-3.jpg') }}" alt="Client 3" style="border-radius: 50%">
            </div>
            <div class="quote-badge"><i class="fa-solid fa-quote-left" style="font-size:14px;"></i></div>

            <div class="quote">Packaging & labeling service saved us weeks on compliance — labels exactly as required for our state.</div>
            <div class="star-rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <div class="person">Sara Patel</div>
            <div class="role">Founder</div>
          </div>
        </div>

      </div> <!-- /.owl-carousel -->
    </div>
  </div>
</section>

<!-- Scripts (place before </body> or in layout) -->
<!-- jQuery (ensure you don't load twice) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $('.testimonial-carousel').owlCarousel({
      center: true,
      items: 3,
      loop: true,
      margin: 28,
      dots: true,
      nav: false,
      autoplay: true,
      autoplayTimeout: 5200,
      autoplayHoverPause: true,
      smartSpeed: 700,
      responsive:{
        0:{ items:1, center:true },
        600:{ items:1, center:true },
        900:{ items:2, center:true },
        1100:{ items:3, center:true }
      }
    });
  });
</script>


@endsection