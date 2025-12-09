@extends('layouts.app')

@section('content')
<style>
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




/* for bottle */

 :root{
    --green: #0f3f3a;   /* header green */
    --cream: #f3efe7;   /* body background */
    --gold: #d6a641;
    --muted: #6f7674;
  }

  /* Section wrapper */
  .cbd-feature {
    background: var(--cream);
    position: relative;
    padding-top: 0; /* top-band sits above */
    overflow: hidden;
    border-radius: 12px;
  }

  /* top green band with subtle leaf pattern */
  .cbd-feature .top-band {
    background: linear-gradient(180deg, var(--green), #123a34);
    height: 120px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    position: relative;
  }
  /* subtle repeating leaf motif (very low opacity) */
  .cbd-feature .top-band::after{
    content:"";
    position:absolute;
    inset:0;
    background-image: radial-gradient(rgba(255,255,255,0.02) 0.5px, transparent 0.5px);
    background-size: 38px 38px;
    opacity: 0.08;
  }

  /* decorative curved cutout using SVG placed over the band bottom */
  .cbd-feature .band-curve {
    position: relative;
    margin-top: -40px; /* pulls band into the content */
    pointer-events: none;
    z-index: 3;
  }

  /* container that holds content (pulled up so bottle overlaps the band) */
  .cbd-feature .hero {
    margin-top: -235px;
    padding: 64px 0 48px;
  }

  .feature-circle{
    width:80px;height:80px;border-radius:50%;display:grid;place-items:center;background:var(--gold);color:#fff;
    box-shadow:0 8px 20px rgba(10,20,18,0.08);
    flex: 0 0 80px;
  }

  .feature-title{ font-weight:700; color:var(--green); margin-bottom:6px; }
  .muted{ color:var(--muted); line-height:1.5; }

  /* central bottle */
  .bottle-wrap { position:relative; min-height:420px; display:grid; place-items:center; }
  .bottle {
    width: 450px;
    max-width:45vw;
    z-index: 6;
    filter: drop-shadow(0 18px 30px rgba(18,40,34,0.18));
    transform: translateY(8px);
  }

  /* leafy background behind bottle (SVG image or inline) */
/* .bottle-wrap::before{
    content: "";
    position: absolute;
    left: 50%;
    top: 52%;
    transform: translate(-50%, -50%);
    width: 80%;
    height: 80%;
    background-image: url("{{ asset('assets/images/about/leaf-hd.png') }}");
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain; 
    opacity: 0.95;
    z-index: 1;
    pointer-events: none;
} */


  /* small curved green arrows near icons */
  .arrow-svg { width:110px; height:80px; display:block; }

  /* layout spacing / responsiveness */
  .cbd-feature .col-left,
  .cbd-feature .col-right {
    display:flex;
    flex-direction:column;
    gap:36px;
  }

  

  @media (max-width: 991px){
    .bottle { width: 260px; }
    .feature-circle { width:64px;height:64px; }
    .cbd-feature .hero { margin-top: -48px; padding: 36px 0; }
  }

  @media (max-width: 767px){
    .top-band { height:90px; }
    .bottle { width: 200px; transform: translateY(0); }
    .feature-circle { width:56px;height:56px; }
  }

  @media (max-width: 576px) {
    .bottle-wrap::before {
        width: 110%;
        aspect-ratio: 1 / 1;   /* keep the leaf from getting too tall */
        top: 50%;
        transform: translate(-50%, -48%);
        background-size: cover;  /* fills space better on phones */
        opacity: 0.9;
    }
}




.feature-title {
  font-weight: 700;
  color: var(--green);
  line-height: 1.12;
  margin-bottom: 6px;
  /* fluid: min 14px -> preferred -> max 20px */
  font-size: clamp(14px, 1.35rem + 0.4vw, 20px);
  letter-spacing: -0.01em;
}

.muted {
  color: var(--muted);
  line-height: 1.45;
  font-size: clamp(13px, 0.9rem + 0.4vw, 15px);
  max-width: 320px; /* prevents very long lines on wide screens */
}

/* feature circle sizing fluidly */
.feature-circle {
  width: clamp(56px, 7.3vw, 84px);
  height: clamp(56px, 7.3vw, 84px);
  flex: 0 0 auto;
  font-size: clamp(14px, 1rem + 0.8vw, 20px);
  display: grid;
  place-items: center;
  border-radius: 50%;
}

/* keep reasonable gap on narrow screens */
.cbd-feature .col-left,
.cbd-feature .col-right {
  gap: clamp(12px, 2.6vw, 36px);
}

/* Alignments for large screens remain as-is (text-left / text-end),
   but on smaller screens the columns become centered & stack naturally. */
@media (max-width: 991px) {
  /* tablet: slightly reduce hero overlap if needed */
  .cbd-feature .hero { margin-top: -80px; padding: 36px 0; }

  /* center feature text and icon when layout stacks more vertically */
  .col-left, .col-right {
    align-items: center;
    text-align: center;
  }

  .col-left .d-flex, .col-right .d-flex {
    justify-content: center;
  }

  .feature-circle {
    margin: 0 auto;
    box-shadow: 0 12px 22px rgba(19,40,35,0.06);
  }

  /* limit width of muted text on tablet so it wraps nicely under icon */
  .muted { max-width: 360px; }
}

@media (max-width: 767px) {
  /* mobile: stack and center content for readability */
  .cbd-feature .hero { margin-top: -48px; padding: 28px 12px; }

  .col-left, .col-right {
    align-items: center !important;
    text-align: center !important;
    gap: 18px;
  }

  .col-left .d-flex, .col-right .d-flex {
    flex-direction: column;
    gap: 10px;
    align-items: center;
  }

  /* make the icon circles smaller and tighter */
  .feature-circle { width: 56px; height: 56px; font-size: 16px; }

  .feature-title {
    /* font-size: clamp(13px, 3.6vw, 18px); */
    margin-bottom: 4px;
  }

  .muted {
    font-size: 13px;
    max-width: 100%;
    line-height: 1.45;
  }

  /* ensure the left column sits above the bottle slightly on very small screens */
  .col-left { margin-bottom: 6px; }
}

/* smallest phones */
@media (max-width: 480px) {
  .feature-circle { width: 48px; height: 48px; font-size: 14px; }
  .feature-title { font-size: 14px; }
  .muted { font-size: 12px; line-height: 1.4; padding: 0 6px; }
}

/* ---------------- RIGHT FEATURE COLUMN RESPONSIVE ---------------- */

/* Default desktop alignment stays right */
.col-right .feature-title,
.col-right .muted {
  text-align: right;
  max-width: 260px;
}

/* When screen width becomes tablet or smaller */
@media (max-width: 991px) {
  .col-right {
    align-items: center !important;
    text-align: center !important;
    gap: 28px;
  }

  .col-right .d-flex {
    justify-content: center !important;
    text-align: center !important;
  }

  .col-right .text-end {
    text-align: center !important;
    max-width: 100% !important;
  }

  .feature-circle {
    margin-left: 0 !important;
  }
}

/* Mobile layout improvements */
@media (max-width: 767px) {
  .col-right .d-flex {
    flex-direction: column-reverse; /* icon goes ABOVE the text */
    gap: 10px;
    align-items: center !important;
  }

  .col-right .feature-title {
    text-align: center !important;
    font-size: clamp(14px, 3.4vw, 18px);
  }

  .col-right .muted {
    font-size: 13px;
    text-align: center !important;
    max-width: 100%;
    line-height: 1.45;
  }

  .feature-circle  {
    width: 56px;
    height: 56px;
    font-size: 16px;
  }
   
}

/* Extra small screens */
@media (max-width: 480px) {
  .feature-circle {
    width: 48px;
    height: 48px;
    font-size: 14px;
    margin: 25px;
    
  }

  .col-right .feature-title {
    font-size: 14px;
    margin-bottom: 4px;
    margin-left: 36px;
  }

  .col-right .muted {
    font-size: 12px;
    padding: 0 8px;
  }
}

</style>

<section class="hero-slider">
  <!-- top dark band -->
  <div class="header-band w-100"></div>
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner position-relative">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="slide-bg" style="background-image:url('assets/images/main-slider/bg-1.jpg');"></div>

        <div class="hero-content">
          <h1>About Us</h1>
          <p class="lead-text">We’re dedicated to delivering premium medical cannabis products — responsibly sourced, lab tested and patient-focused.</p>
          {{-- <a class="btn btn-shop" href="about.html">Read More</a> --}}
        </div>
         <div class="hero-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
          </nav>
        </div>
        </div>
      </div>
    </div>
</section>


  <!-- About Section -->
        <section class="about-section">
            <div class="auto-container">
                <div class="row">
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="about-image-wrapper">
                            <figure class="bg-shape zoom-one" data-wow-delay="600ms"><img src="{{ asset('assets/images/icons/object-1.png') }}" alt="" /></figure>
                            <figure class="image-1" data-wow-delay="300ms"><img src="{{ asset('assets/images/resource/about-img-1.png') }}" alt="" /></figure>
                            <figure class="image-2 wow zoomIn" data-wow-delay="900ms"><img src="{{ asset('assets/images/resource/about-img-2.png') }}" alt="" /></figure>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight">
                            <div class="sec-title">
                                <span class="sub-title">Get to Know Dispensary</span>
                                <h2>We’re Using Quality Products</h2>
                                <span class="divider"></span>
                                <div class="text">There are many variations of passages of available but the majority have suffered alteration in some form.</div>
                            </div>
                            <div class="info-box">
                                <ul class="list-style-one">
                                    <li>Nsectetur cing elit.</li>
                                    <li>Suspe ndisse suscipit sagittis leo.</li>
                                    <li>Entum estibulum digni posuere.</li>
                                    <li>Donec tristique ante dictum oncus.</li>
                                </ul>
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box">
								<img src="{{ asset('assets/images/resource//video-img.jpg') }}" alt="">
								<span class="icon fa fa-play"></span>
							</a>
                            </div>
                            <a href="shop-products.html" class="theme-btn btn-style-one">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- CBD Feature Section -->
        <section class="cbd-feature container-fluid p-0">
  <!-- top green band -->
  <div class="top-band w-100"></div>

  <!-- SVG curved connector (creates the rounded "dip" in the green band like the preview) -->
  <div class="band-curve">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="display:block; width:100%; height:80px;">
      <path d="M0 0 H240 C340 0 420 80 600 80 C780 80 860 0 960 0 H1200 V120 H0 Z" fill="#f3efe7"></path>
    </svg>
  </div>

  <!-- main content -->
  <div class="container hero">
    <div class="row align-items-center gy-4">

      <!-- left features -->
      <div class="col-lg-3 col-md-4 col-12 col-left text-start">
        <div class="d-flex align-items-center gap-3">
          <div class="feature-circle"><!-- icon -->
            {{-- <i class="fa-solid fa-arrow-down"></i> --}}
            <img src="{{ asset('assets/images/about/heart-rate.png') }}" alt="" width="50px">
          </div>
          <div>
            <div class="feature-title">Relieves Pain</div>
            <div class="muted">Lorem ipsum is simply free text are many of pass of majority.</div>
          </div>
        </div>

        <div class="d-flex align-items-center gap-3">
          <div class="feature-circle">
           {{-- <i class="fa-solid fa-bars-staggered"></i> --}}
             <img src="{{ asset('assets/images/about/lack-of-appetite.png') }}" alt="" width="50px">
          </div>
          <div>
            <div class="feature-title">Increases Appetite</div>
            <div class="muted">Lorem ipsum is simply free text are many of pass of majority.</div>
          </div>
        </div>

      </div>

      <!-- center bottle -->
      <div class="col-lg-6 col-md-4 col-12 bottle-wrap">

        <!-- real bottle image (replace path) -->
        <img src="{{ asset('assets/images/about/bottle-1.png') }}" alt="CBD Oil Bottle" class="bottle">

      </div>

      <!-- right features -->
      <div class="col-lg-3 col-md-4 col-12 col-right text-end">
        <div class="d-flex align-items-center gap-3 justify-content-end">
          <div class="text-end" style="max-width:220px;">
            <div class="feature-title">Removes Headache</div>
            <div class="muted">Lorem ipsum is simply free text are many of pass of majority.</div>
          </div>
          <div class="feature-circle">
             {{-- <i class="lnr lnr-heart-pulse"></i> --}}
              <img src="{{ asset('assets/images/about/disease.png') }}" alt="" width="50px">
          </div>
        </div>

        <div class="d-flex align-items-center gap-3 justify-content-end">
          <div class="text-end" style="max-width:220px;">
            <div class="feature-title">Fights Insomnia</div>
            <div class="muted">Lorem ipsum is simply free text are many of pass of majority.</div>
          </div>
          <div class="feature-circle">
            {{-- <i class="fa-solid fa-slash"></i> --}}
                    <img src="{{ asset('assets/images/about/sleep.png') }}" alt="" width="50px">
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
 <!-- Products Section -->
        <section class="products-section pt-0">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span class="sub-title">Our New Products</span>
                    <h2>Medical Products</h2>
                    <span class="divider"></span>
                </div>

                <div class="products-carousel owl-carousel owl-themes">
                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/1.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">Tablets Pack</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/2.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">CBD Oil Bottle</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/3.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">Fredddy Fuego</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/4.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">Healthy Tab</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/1.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">Tablets Pack</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/2.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">CBD Oil Bottle</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/3.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">Fredddy Fuego</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>

                    <!--Product Block-->
                    <div class="product-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="shop-product-details.html"><img src="{{ asset('assets/images/resource/products/4.jpg') }}" alt="" /></a></div>
                                <div class="icon-box">
                                    <a href="shop-product-details.html" class="ui-btn"><i class="fa fa-eye"></i></a>
                                    <a href="shop-cart.html" class="ui-btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
									class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                <h4><a href="shop-product-details.html">Healthy Tab</a></h4>
                                <span class="price">$23.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Products Section -->

<!-- small script: parallax for leaf bg following mouse (subtle) -->
<script>
  (function(){
    const leaf = document.querySelector('.leaf-bg');
    if (!leaf) return;
    let lastX = 0, lastY = 0;
    document.addEventListener('mousemove', (e) => {
      const x = (e.clientX / window.innerWidth - 0.5) * 22;
      const y = (e.clientY / window.innerHeight - 0.5) * 12;
      // low-pass filter for smooth movement
      lastX = lastX * 0.85 + x * 0.15;
      lastY = lastY * 0.85 + y * 0.15;
      leaf.style.transform = `translate(calc(-50% + ${lastX}px), calc(-50% + ${lastY}px))`;
    });
  })();
</script>

@endsection