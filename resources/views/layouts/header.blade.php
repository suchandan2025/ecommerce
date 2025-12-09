<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CanGroup | Cannabis & Marijuana HTML Template | Home Page 01</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Linearicons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{ asset('assets/plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="{{ asset('assets/plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION NAVIGATION STYLES -->

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        <header class="main-header header-style-one">
            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="row">
                        <div class="top-center col-lg-2 col">
                            <div class="logo"><a href="index.html"><img src="{{ asset('assets/images/logo.png') }}"
                                        alt="" title="Fesho"></a></div>
                        </div>

                        <div class="top-left col-lg-5 col">
                            <ul class="social-icon-one">
                                <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>

                            <span class="divider"></span>

                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title"></span>
                                <a href="tel:+92880098670">+92 (880) - 9867</a>
                            </div>
                        </div>

                        <div class="top-right col-lg-5 col">
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                {{-- <span class="icon lnr-icon-envelope1"></span> --}}
                                <i class="icon fas fa-envelope"></i>
                                {{-- <span class="title">Send Email</span> --}}
                                <a href="email">Test123@Gmail.com</a>
                                {{-- <a href="/cdn-cgi/l/email-protection#056d60697545666a6875646b7c2b666a68"><span
                                        class="__cf_email__"
                                        data-cfemail="3a525f564a7a5955574a5b544314595557">[email&#160;protected]</span></a> --}}
                            </div>

                            <span class="divider"></span>

                            <div class="outer-box">
                                <button class="ui-btn ui-btn search-btn">
                                    <span class="icon lnr lnr-icon-search"></span>
                                </button>

                                <div class="ui-btn cart-btn">
                                    <span class="icon lnr-icon-cart"></span>
                                    <span class="count">1</span>
                                </div>

                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top -->

            <!-- Header Lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="main-box">
                        <!--Nav Box-->
                        <div class="nav-outer">

                            <nav class="nav main-menu">
                                <ul class="navigation">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About</a>
                                        {{-- <ul>
                                            <li><a href="page-about.html">About</a></li>
                                            <li class="dropdown"><a href="#">Services</a>
                                                <ul>
                                                    <li><a href="page-services.html">Services List</a></li>
                                                    <li><a href="page-service-details.html">Service Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Team</a>
                                                <ul>
                                                    <li><a href="page-team.html">Team List</a></li>
                                                    <li><a href="page-team-details.html">Team Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="page-testimonial.html">Testimonial</a></li>
                                            <li><a href="page-faq.html">FAQ</a></li>
                                            <li><a href="page-404.html">Page 404</a></li>
                                        </ul> --}}
                                    </li>

                                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                                    <li><a href="#">Investors </a></li>
                                    <li><a href="#">careers  </a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- Main Menu End-->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>

                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                <nav class="menu-box">
                    <div class="upper-box">
                        <div class="nav-logo"><a href="index.html"><img src="images/logo.png" alt=""
                                    title="Fesho"></a></div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>

                    <ul class="navigation clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>
                    <ul class="contact-list-one">
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                <a href="tel:+92880098670">+92 (8800) - 98670</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                <a href="/cdn-cgi/l/email-protection#5038353c2010333f3d20313e297e333f3d"><span
                                        class="__cf_email__"
                                        data-cfemail="8ce4e9e0fcccefe3e1fcede2f5a2efe3e1">[email&#160;protected]</span></a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-clock"></span>
                                <span class="title">Send Email</span> Mon - Sat 8:00 - 6:30, Sunday - CLOSED
                            </div>
                        </li>
                    </ul>


                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </nav>
            </div>
            <!-- End Mobile Menu -->


            <!-- Header Search -->
            <div class="search-popup">
                <span class="search-back-drop"></span>
                <button class="close-search"><span class="fa fa-times"></span></button>

                <div class="search-inner">
                    <form method="post" action="#">
                        <div class="form-group">
                            <input type="search" name="search-field" value="" placeholder="Search..."
                                required="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Header Search -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo">
                            <a href="index.html" title="Narioz"><img src="images/logo-2.png" alt=""
                                    title="Narioz"></a>
                        </div>

                        <!--Right Col-->
                        <div class="nav-outer">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-collapse show collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <!--Keep This Empty / Menu will come through Javascript-->
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->

                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sticky Menu -->
        </header>
        <!--End Main Header -->
