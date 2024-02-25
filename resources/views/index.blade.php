<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Web Hosting Template">
    <meta name="description" content="Hoston - Hosting Bootstrap 5 HTML Template">
    <title>Hoston - Homepage 01</title>
    <!-- favicon -->

    <link rel="icon" href="{{'images/favicon.ico'}}" type="image/x-icon" />

   @extends('css-common')
</head>
<body>

<!-- loader -->
<div id="loader">
    <div class="icon"></div>
</div>
<!-- end: loader -->

<!-- header -->
<header class="header d-flex align-items-center">
    <div class="header__top">
        <div class="header__top--info d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-9">
                        <ul class="list-inline d-flex align-items-center">
                            <li class="list-inline-item">
                                <a href="mailto:info@domain.com"><i class="bi bi-envelope"></i>info@domain.com</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="tel:2322233445"><i class="bi bi-telephone"></i>232 223 3445</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-3">
                        <ul class="list-inline d-flex align-items-center float-end">
                            <li class="list-inline-item">
                                <a href="#"><i class="bi bi-cart"></i>Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="hoston__nav--1 navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index-1.html">
                    <img src="{{'images/logo-white.png'}}" class="logo-white" alt="Logo"/>
                </a>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#hoston__1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="hoston__1">
                    <ul class="navbar-nav ms-auto navbar-main">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Home</a>
                            <ul class="dropdown-menu fade-up">
                                <li>
                                    <a class="dropdown-item" href="index-1.html">Home 01</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index-2.html">Home 02</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index-3.html">Home 03</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">About</a>
                            <ul class="dropdown-menu fade-up">
                                <li>
                                    <a class="dropdown-item" href="about.html">Introduction</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="domain-search.html">Domain Search</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                            <ul class="dropdown-menu fade-up">
                                <li>
                                    <a class="dropdown-item" href="{{route('searchUniversity')}}">大学検索</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="wordpress-hosting.html">Wordpress Hosting</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="web-hosting.html">Web Hosting</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="reseller-hosting.html">Reseller Hosting</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu fade-up">
                                <li>
                                    <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="blog-column.html">Blog Column</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="blog-sidebar.html">Blog Sidebar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Support</a>
                            <ul class="dropdown-menu fade-up">
                                <li>
                                    <a class="dropdown-item" href="knowledge-base.html">Knowledge Base</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="faq.html">F.A.Q</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center me-0" href="sign-up.html">
                                <i class="bi bi-person-plus"></i>Create Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center me-0 pe-0" href="sign-in.html">
                                <i class="bi bi-person"></i>Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="header__content">
                    <h1>Fastest performance web hosting.</h1>
                    <p class="mt-4">Join the growing club of 23,000+ companies who made the switch to better, faster hosting whether you run a website, online shop, agency.</p>
                    <ul class="list-inline d-inline-flex gap-4 mt-4">
                        <li class="list-inline-item">
                            <button class="btn btn-hoston-primary">Get started</button>
                        </li>
                        <li class="list-inline-item">
                            <button class="btn btn-hoston-outline">Learn more</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{'images/header-right.png'}}" class="img-fluid d-block mx-auto" alt="Header">
            </div>
        </div>
    </div>
</header>
<!-- end: header -->

<!-- search domain -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="search">
                <div class="d-flex align-items-center gap-3" data-university-search-suggest="yes" >
                    <i class="bi bi-search d-flex position-absolute search__icon"></i>
                    <input type="text" class="search__input form-control" id="test" placeholder="大学の一部を入力" aria-label="Search domain">
                    <button class="btn btn-hoston-primary">Search</button>
                </div>
{{--                <div class="search__domain mt-4">--}}
{{--                    <ul class="list-inline search__domain--pricing mb-0">--}}
{{--                        <li class="list-inline-item">.com only $9.95</li>--}}
{{--                        <li class="list-inline-item">.net only $8.85</li>--}}
{{--                        <li class="list-inline-item">.biz only $5.95</li>--}}
{{--                        <li class="list-inline-item">.info only $3.95</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<!-- end: search domain -->

<!-- benefits -->
<section class="benefits">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section__style--1">
                    <h2 class="mb-4">
                        <span class="section__dot d-inline-block d-md-none">..</span>Enjoy the best in benefits
                    </h2>
                    <div class="sub-title mx-auto">
                        <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="mb-4 mb-xl-0">
                    <div class="d-flex align-items-baseline">
                        <div class="flex-shrink-0">
                            <img src="{{'images/guaranteed.png'}}" alt="Guaranteed">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>Guaranteed</h4>
                            <p>Everything you need to build a stunning website from one easy-to-access location.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="mb-4 mb-xl-0">
                    <div class="d-flex align-items-baseline">
                        <div class="flex-shrink-0">
                            <img src="{{'images/easy.png'}}" alt="Super easy to use">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>Super easy to use</h4>
                            <p>Everything you need to build a stunning website from one easy-to-access location.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="mb-4 mb-xl-0">
                    <div class="d-flex align-items-baseline">
                        <div class="flex-shrink-0">
                            <img src="{{'images/safe.png'}}" alt="Safe and secured">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>Safe and secured</h4>
                            <p>Everything you need to build a stunning website from one easy-to-access location.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="mb-4 mb-xl-0">
                    <div class="d-flex align-items-baseline">
                        <div class="flex-shrink-0">
                            <img src="{{'images/access.png'}}" alt="cPanel access">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>cPanel access</h4>
                            <p>Everything you need to build a stunning website from one easy-to-access location.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: benefits -->

<!-- services -->
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section__style--2">
                    <h2 class="mb-4">
                        <span class="section__dot d-inline-block d-md-none">..</span>Our best service
                    </h2>
                    <div class="sub-title mx-auto">
                        <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-4 mt-5">
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="services__block text-center">
                    <i class="icon-shared"></i>
                    <h4 class="my-4">Shared Hosting</h4>
                    <p>Some quick example text to build on the card title and the bulk of the card's content.</p>
                    <div class="services__block--btn">
                        <a href="#" class="btn-hoston-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="services__block text-center">
                    <i class="icon-reseller"></i>
                    <h4 class="my-4">Reseller Hosting</h4>
                    <p>Some quick example text to build on the card title and the bulk of the card's content.</p>
                    <div class="services__block--btn">
                        <a href="#" class="btn-hoston-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="services__block text-center">
                    <i class="icon-vps"></i>
                    <h4 class="my-4">VPS Hosting</h4>
                    <p>Some quick example text to build on the card title and the bulk of the card's content.</p>
                    <div class="services__block--btn">
                        <a href="#" class="btn-hoston-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="services__block text-center">
                    <i class="icon-cloud"></i>
                    <h4 class="my-4">Cloud Hosting</h4>
                    <p>Some quick example text to build on the card title and the bulk of the card's content.</p>
                    <div class="services__block--btn">
                        <a href="#" class="btn-hoston-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="services__block text-center">
                    <i class="icon-dedicated"></i>
                    <h4 class="my-4">Dedicated Hosting</h4>
                    <p>Some quick example text to build on the card title and the bulk of the card's content.</p>
                    <div class="services__block--btn">
                        <a href="#" class="btn-hoston-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="services__block text-center">
                    <i class="icon-domain"></i>
                    <h4 class="my-4">Domain Name</h4>
                    <p>Some quick example text to build on the card title and the bulk of the card's content.</p>
                    <div class="services__block--btn">
                        <a href="#" class="btn-hoston-link">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: services -->

<!-- plan -->
<section class="plan">
    <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col-lg-5">
                <img src="{{'images/plan.png'}}" class="img-fluid rounded d-block mx-auto mb-4 mb-sm-4 mb-lg-0" alt="Plan">
            </div>
            <div class="col-lg-7">
                <h2 class="mb-4">Get fast and reliable cPanel hosting</h2>
                <p class="mb-4">Each Linux plan includes:</p>
                <div class="accordion" id="plan">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading-1">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#plan01">What is web hosting?</button>
                        </h4>
                        <div id="plan01" class="accordion-collapse collapse" data-bs-parent="#plan">
                            <div class="card-body">
                                <p>Everything you need to build a stunning website from one easy-to-access location. Some quick example text to build on the card title and the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading-2">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#plan02">How do I buy a domain name?</button>
                        </h4>
                        <div id="plan02" class="accordion-collapse collapse" data-bs-parent="#plan">
                            <div class="card-body">
                                <p>Everything you need to build a stunning website from one easy-to-access location. Some quick example text to build on the card title and the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading-3">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#plan03">How does web hosting service work?</button>
                        </h4>
                        <div id="plan03" class="accordion-collapse collapse" data-bs-parent="#plan">
                            <div class="card-body">
                                <p>Everything you need to build a stunning website from one easy-to-access location. Some quick example text to build on the card title and the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: plan -->

<!-- support -->
<section class="support">
    <div class="container overflow-hidden">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-4">24/7 Support by WordPress experts</h2>
                <p class="mb-4">We don't do tiered support. You'll get all the help and support you need from best-in-class support staff.</p>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col-lg-5">
                <div class="features-detail mb-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="assets/images/expert.png" alt="Help from experts">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-4">Help from experts</h5>
                            <p>Reliable service with verified experts and quality control team provides professional
                                assignment help with explanations.</p>
                        </div>
                    </div>
                </div>
                <div class="features-detail mb-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="assets/images/rating.png" alt="Consistently high ratings">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-4">Consistently high ratings</h5>
                            <p>Reliable service with verified experts and quality control team provides professional
                                assignment help with explanations.</p>
                        </div>
                    </div>
                </div>
                <div class="features-detail mb-4 mb-sm-0">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="assets/images/support.png" alt="Multilingual support">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-4">Multilingual support</h5>
                            <p>Reliable service with verified experts and quality control team provides professional
                                assignment help with explanations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 align-self-end">
                <img src="assets/images/online-support.png" alt="Online Support" class="img-fluid d-block mx-auto mt-4 mt-sm-4 mt-lg-0">
            </div>
        </div>
    </div>
</section>
<!-- end: support -->

<!-- statistics -->
<section class="statistics">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="mb-4">We have started small and scaled up</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-4 text-center">
                <div class="statistics__counter counter mb-4">
                    120K
                </div>
                <h4 class="mb-5 mb-md-0">Customers &amp; growing</h4>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
                <div class="statistics__counter counter mb-4">
                    10+
                </div>
                <h4 class="mb-5 mb-md-0">Years of hosting knowledge</h4>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
                <div class="statistics__counter counter mb-4">
                    250+
                </div>
                <h4 class="mb-md-0">Expert team members</h4>
            </div>
        </div>
    </div>
</section>
<!-- end: statistics -->

<!-- packages -->
<section class="packages">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section__style--1">
                    <h2 class="mb-4">
                        <span class="section__dot d-inline-block d-md-none">..</span>Choose the perfect plan for your website
                    </h2>
                    <div class="sub-title mx-auto">
                        <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="packages__block mb-3 mb-lg-0">
                    <span class="packages__popular">Most Popular</span>
                    <h3>Shared Hosting</h3>
                    <p class="packages__block--description">The perfect plan for a simple website and one domain name.</p>
                    <div class="packages__bottom mt-3">
                        <h4>Starting at</h4>
                        <div class="packages__block--price mb-3">
                            <span>$3.55</span>
                            <small>/mo*</small>
                        </div>
                        <select class="form-select form-control">
                            <option value="1" selected>Billed $85.20 for 24 month</option>
                            <option value="2">Billed $42.60 for 12 month</option>
                            <option value="3">Billed $21.30 for 6 month</option>
                        </select>
                        <a href="#" class="btn btn-hoston-black my-4 d-block">Buy Now</a>
                        <div class="packages__block--detail">
                            <div class="collapse" id="packages__block--details1">
                                <div class="packages__block--lists">
                                    <ul class="list-unstyled">
                                        <li>Unlimited websites</li>
                                        <li>Unlimited storage</li>
                                        <li>Scalable bandwidth</li>
                                        <li>25 MySQL databases</li>
                                        <li>25 FTP logins</li>
                                        <li>Free SSL certificate by Let's Encrypt</li>
                                        <li>Free domain for the first year</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-btn text-center">
                                <a class="btn-hoston-link-2 all-features" data-bs-toggle="collapse" href="#packages__block--details1" role="button" aria-expanded="false"> See all features </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="packages__block mb-3 mb-lg-0">
                    <h3>VPS</h3>
                    <p class="packages__block--description">The perfect plan for a simple website and one domain name.</p>
                    <div class="packages__bottom mt-3">
                        <h4>Starting at</h4>
                        <div class="packages__block--price mb-3">
                            <span>$3.55</span>
                            <small>/mo*</small>
                        </div>
                        <select class="form-select form-control">
                            <option value="1" selected>Billed $85.20 for 24 month</option>
                            <option value="2">Billed $42.60 for 12 month</option>
                            <option value="3">Billed $21.30 for 6 month</option>
                        </select>
                        <a href="#" class="btn btn-hoston-primary my-4 d-block">Buy Now</a>
                        <div class="packages__block--detail">
                            <div class="collapse" id="packages__block--details2">
                                <div class="packages__block--lists">
                                    <ul class="list-unstyled">
                                        <li>Unlimited websites</li>
                                        <li>Unlimited storage</li>
                                        <li>Scalable bandwidth</li>
                                        <li>25 MySQL databases</li>
                                        <li>25 FTP logins</li>
                                        <li>Free SSL certificate by Let's Encrypt</li>
                                        <li>Free domain for the first year</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-btn text-center">
                                <a class="btn-hoston-link-2 all-features" data-bs-toggle="collapse" href="#packages__block--details2" role="button" aria-expanded="false"> See all features </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="packages__block mb-3 mb-lg-0">
                    <h3>Dedicated</h3>
                    <p class="packages__block--description">The perfect plan for a simple website and one domain name.</p>
                    <div class="packages__bottom mt-3">
                        <h4>Starting at</h4>
                        <div class="packages__block--price mb-3">
                            <span>$3.55</span>
                            <small>/mo*</small>
                        </div>
                        <select class="form-select form-control">
                            <option value="1" selected>Billed $85.20 for 24 month</option>
                            <option value="2">Billed $42.60 for 12 month</option>
                            <option value="3">Billed $21.30 for 6 month</option>
                        </select>
                        <a href="#" class="btn btn-hoston-black my-4 d-block">Buy Now</a>
                        <div class="packages__block--detail">
                            <div class="collapse" id="packages-block-details-3">
                                <div class="packages__block--lists">
                                    <ul class="list-unstyled">
                                        <li>Unlimited websites</li>
                                        <li>Unlimited storage</li>
                                        <li>Scalable bandwidth</li>
                                        <li>25 MySQL databases</li>
                                        <li>25 FTP logins</li>
                                        <li>Free SSL certificate by Let's Encrypt</li>
                                        <li>Free domain for the first year</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-btn text-center">
                                <a class="btn-hoston-link-2 all-features" data-bs-toggle="collapse" href="#packages-block-details-3" role="button" aria-expanded="false"> See all features </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: packages -->

<!-- testimonial -->
<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section__style--2">
                    <h2 class="mb-4">
                        <span class="section__dot d-inline-block d-md-none">..</span>What our customers say
                    </h2>
                    <div class="sub-title mx-auto">
                        <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div id="testimonial__slider" class="owl-carousel owl-theme testimonials">
                    <div class="testimonials__block">
                        <div class="testimonials__rating">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials__content mb-5">
                            <p>This is an honest endorsement of your product or service that usually comes from a customer, colleague, or peer who has benefited from or experienced success as a result of the work you did for them.</p>
                        </div>
                        <div class="testimonials__author d-flex align-items-center justify-content-between">
                            <div class="testimonials__author--info d-flex align-items-center">
                                <img src="assets/images/author-1.png" class="rounded-circle" alt="Author">
                                <div class="testimonials__author--details">
                                    <h5 class="mb-0">Dottie Marsh</h5>
                                    <p>Lead UI Designer</p>
                                </div>
                            </div>
                            <div class="testimonials__author--logo">
                                <img src="assets/images/company.png" alt="Company">
                            </div>
                        </div>
                    </div>
                    <div class="testimonials__block">
                        <div class="testimonials__rating">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials__content mb-5">
                            <p>This is an honest endorsement of your product or service that usually comes from a customer, colleague, or peer who has benefited from or experienced success as a result of the work you did for them.</p>
                        </div>
                        <div class="testimonials__author d-flex align-items-center justify-content-between">
                            <div class="testimonials__author--info d-flex align-items-center">
                                <img src="assets/images/author-2.png" class="rounded-circle" alt="Author">
                                <div class="testimonials__author--details">
                                    <h5 class="mb-0">Brendon Murph</h5>
                                    <p>UX Engineer</p>
                                </div>
                            </div>
                            <div class="testimonials__author--logo">
                                <img src="assets/images/company.png" alt="Company">
                            </div>
                        </div>
                    </div>
                    <div class="testimonials__block">
                        <div class="testimonials__rating">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials__content mb-5">
                            <p>This is an honest endorsement of your product or service that usually comes from a customer, colleague, or peer who has benefited from or experienced success as a result of the work you did for them.</p>
                        </div>
                        <div class="testimonials__author d-flex align-items-center justify-content-between">
                            <div class="testimonials__author--info d-flex align-items-center">
                                <img src="assets/images/author-3.png" class="rounded-circle" alt="Author">
                                <div class="testimonials__author--details">
                                    <h5 class="mb-0">Kim Thompson</h5>
                                    <p>Fullstack Developer</p>
                                </div>
                            </div>
                            <div class="testimonials__author--logo">
                                <img src="assets/images/company.png" alt="Company">
                            </div>
                        </div>
                    </div>
                    <div class="testimonials__block">
                        <div class="testimonials__rating">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-star-fill"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="testimonials__content mb-5">
                            <p>This is an honest endorsement of your product or service that usually comes from a customer, colleague, or peer who has benefited from or experienced success as a result of the work you did for them.</p>
                        </div>
                        <div class="testimonials__author d-flex align-items-center justify-content-between">
                            <div class="testimonials__author--info d-flex align-items-center">
                                <img src="assets/images/author-4.png" class="rounded-circle" alt="Author">
                                <div class="testimonials__author--details">
                                    <h5 class="mb-0">Dane Bratz</h5>
                                    <p>Frontend Designer</p>
                                </div>
                            </div>
                            <div class="testimonials__author--logo">
                                <img src="assets/images/company.png" alt="Company">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: testimonial -->

<!-- f.a.q -->
<section class="faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="mb-4">
                    <span class="section__dot d-inline-block d-md-none">..</span>Frequently Asked Questions
                </h2>
                <div class="sub-title mx-auto">
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's.</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="accordion" id="faq">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading-4">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq1">What kind of hosting do I need?</button>
                        </h4>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faq">
                            <div class="card-body">
                                <p>Everything you need to build a stunning website from one easy-to-access location. Some quick example text to build on the card title and the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading-5">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">What’s hosting bandwidth?</button>
                        </h4>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faq">
                            <div class="card-body">
                                <p>Everything you need to build a stunning website from one easy-to-access location. Some quick example text to build on the card title and the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="heading-6">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">Will Hoston help me to create my website?</button>
                        </h4>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faq">
                            <div class="card-body">
                                <p>Everything you need to build a stunning website from one easy-to-access location. Some quick example text to build on the card title and the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: f.a.q -->

<!-- subfooter -->
<section class="subfooter">
    <div class="container subfooter__block">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <img src="assets/images/rocket.png" class="img-fluid d-block mx-auto" alt="Rocket">
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <h3> Get your website online with secure and reliable hosting. </h3>
                <p class="mb-3">Explore special introductory rates starting at $4.95/month*</p>
            </div>
            <div class="col-lg-3 text-center">
                <a href="#" class="btn btn-hoston-primary">Get started</a>
            </div>
        </div>
    </div>
</section>
<!-- end: subfooter -->

<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <h5>Company</h5>
                <ul class="list-unstyled footer__links mt-4">
                    <li><a href="about.html">About Hoston</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="blog-single.html">Hoston Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <h5>Services</h5>
                <ul class="list-unstyled footer__links mt-4">
                    <li><a href="vps-hosting.html">VPS Hosting</a></li>
                    <li><a href="wordpress-hosting.html">WordPress Hosting</a></li>
                    <li><a href="web-hosting.html">Web Hosting</a></li>
                    <li><a href="reseller-hosting.html">Reseller Hosting</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <h5>Support</h5>
                <ul class="list-unstyled footer__links mt-4">
                    <li><a href="knowledge-base.html">Knowledge Base</a></li>
                    <li><a href="faq.html">F.A.Q</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <img src="assets/images/logo.png" class="img-fluid mb-4" alt="Hoston Logo">
                <p>&copy; 2022 Hoston Inc. All Rights Reserved.</p>
                <ul class="list-inline mt-2 footer__phone">
                    <li class="list-inline-item">
                        <a href="tel:2322233445"><i class="bi bi-telephone"></i>232 223 3445</a>
                    </li>
                </ul>
                <ul class="list-inline mt-3 footer__social">
                    <li class="list-inline-item">
                        <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" target="_blank"><i class="bi bi-linkedin"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <hr class="mt-5">
                <div class="footer__bottom d-flex align-items-center justify-content-between mt-4">
                    <div class="footer__language d-flex align-items-center">
                        <i class="bi bi-globe"></i>
                        <select class="form-select" aria-label="">
                            <option selected>English</option>
                            <option value="1">French</option>
                            <option value="2">German</option>
                        </select>
                    </div>
                    <div class="footer__cards">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img src="assets/images/maestro.png" alt="Maestro">
                            </li>
                            <li class="list-inline-item">
                                <img src="assets/images/discover.png" alt="Maestro">
                            </li>
                            <li class="list-inline-item">
                                <img src="assets/images/visa.png" alt="Maestro">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end: footer -->

<!-- scroll top -->
<div class="scroll__top">
    <a id="page__scroll" href="#"><i class="bi bi-arrow-up-short"></i></a>
</div>
<!-- end: scroll top -->

<!-- jQuery -->
<script src="{{'js/jquery.min.js'}}"></script>
<!-- jQuery ajaxchimp -->
<script src="{{'js/jquery.ajaxchimp.min.js'}}"></script>
<!-- bootstrap bundle js -->
<script src="{{'js/bootstrap.bundle.min.js'}}"></script>
<!-- jQuery waypoints -->
<script src="{{'js/jquery.waypoints.js'}}"></script>
<!-- counterup 2 -->
<script src="{{'js/counterup2-1.0.1.min.js'}}"></script>
<!-- owl carousel -->
<script src="{{'js/owl.carousel.min.js'}}"></script>
<!-- magnific popup -->
<script src="{{'js/jquery.magnific-popup.js'}}"></script>
<!-- jQuery vmap -->
<script src="{{'js/jquery.vmap.min.js'}}"></script>
<!-- jQuery vmap world -->
<script src="{{'js/jquery.vmap.world.js'}}"></script>
<!-- jQuery vmap sample data -->
<script src="{{'js/jquery.vmap.sampledata.js'}}"></script>
<!-- ion rangeSlider -->
<script src="{{'js/ion.rangeSlider.min.js'}}"></script>
<!-- custom js -->
<script src="{{'js/custom.js'}}"></script>
<script src="{{'js/search/search.js'}}"></script>
</body>
</html>

