@include('frontend.components.header')
@php
    enqueue_style('home-slider');
    enqueue_script('home-slider');

    enqueue_style('mapbox-gl-css');
    enqueue_style('mapbox-gl-geocoder-css');
    enqueue_script('mapbox-gl-js');
    enqueue_script('mapbox-gl-geocoder-js');

    enqueue_style('daterangepicker-css');
    enqueue_script('daterangepicker-js');
    enqueue_script('daterangepicker-lang-js');

    enqueue_style('iconrange-slider');
    enqueue_script('iconrange-slider');

    enqueue_script('owl-carousel');
    enqueue_style('owl-carousel');
    enqueue_style('owl-carousel-theme');

    $tab_services = list_tabs_service();
@endphp
<div class="home-page pb-5">
    @if(!empty($tab_services))

    @endif
    <div class="container">
        @if(!empty($tab_services))
        <section>
            <div class="container">
                <div class="our-offer">
                    <div class="section-header">
                        <span>WHAT WE OFFER</span>
                        <h2>Book your dream stay now <br> and pay over time</h2>
                    </div>
                    <div class="main-our-offer" uk-slider>
                        <ul class="uk-slider-items main-our-offer-wrapper">
                            <li class="main-offer-block">
                                <img src="http://192.168.100.9/veyvey/public/images/test-img-3.png" alt="" class="main-offer-image">
                                <div class="main-offer-content">
                                    <div class="main-offer-title">
                                        <h3>Lookin for pleasure?</h3>
                                        <span>Check out our sort of experiences</span>
                                    </div>
                                </div>
                            </li>
                            <li class="main-offer-block">
                                <img src="http://192.168.100.9/veyvey/public/images/test-img-3.png" alt="" class="main-offer-image">
                                <div class="main-offer-content">
                                    <div class="main-offer-title">
                                        <h3>Lookin for pleasure?</h3>
                                        <span>Check out our sort of experiences</span>
                                    </div>
                                </div>
                            </li>
                            <li class="main-offer-block">
                                <img src="http://192.168.100.9/veyvey/public/images/test-img-3.png" alt="" class="main-offer-image">
                                <div class="main-offer-content">
                                    <div class="main-offer-title">
                                        <h3>Lookin for pleasure?</h3>
                                        <span>Check out our sort of experiences</span>
                                    </div>
                                </div>
                            </li>
                            <li class="main-offer-block">
                                <img src="http://192.168.100.9/veyvey/public/images/test-img-3.png" alt="" class="main-offer-image">
                                <div class="main-offer-content">
                                    <div class="main-offer-title">
                                        <h3>Lookin for pleasure?</h3>
                                        <span>Check out our sort of experiences</span>
                                    </div>
                                </div>
                            </li>
                            <li class="main-offer-block">
                                <img src="http://192.168.100.9/veyvey/public/images/test-img-3.png" alt="" class="main-offer-image">
                                <div class="main-offer-content">
                                    <div class="main-offer-title">
                                        <h3>Lookin for pleasure?</h3>
                                        <span>Check out our sort of experiences</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @endif
    <!-- Home in New York -->
        @if(is_enable_service('home'))
            @php
                $list_services = \App\Controllers\Services\HomeController::get_inst()->listOfHomes([
                    'number' => 4,
                    'location' => [
                        'lat' => '40.72939317669241',
                        'lng' => '-73.99034249572969',
                        'radius' => 50
                    ]
                ]);
            @endphp
            @if(count($list_services['results']))
                <h2 class="h3 mt-4">{{__('Homes in New York')}}</h2>
                <p>{{__('Browse beautiful places to stay with all the comforts of home, plus more')}}</p>
                <div class="hh-list-of-services">
                    <div class="row">
                        @foreach($list_services['results'] as $item)
                            <div class="col-12 col-md-6 col-lg-3">
                                @include('frontend.home.loop.grid', ['item' => $item])
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <style media="screen">
          h2 {
            font-weight: 700 !important;
          }
        </style>
    </div>
    <!-- Destination -->
        <section class="why-veyvey-section why-veyvey-section-main">
            <div class="container">
                <div class="section-header">
                    <span>WHAT WE OFFER</span>
                    <h2>Book your dream stay now<br>
                        and pay over time </h2>
                </div>
                <div class="why-veyvey">
                    <div class="why-veyvey-box">
                        <article>
                            <div class="why-veyvey-box-image">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/home2-icon.png" alt="home icon">
                            </div>
                            <div class="why-veyvey-box-text">
                                <h3>Flexible payment options</h3>
                                <p>
                                    You can choose a payment method.
                                    We accept all major credit cards
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="why-veyvey-box-image">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/arm-chair.png" alt="arm-chair icon">
                            </div>
                            <h3>Find a place you love</h3>
                            <p>
                                Browse our homes, save your favorites,
                                and book a tour today.
                            </p>
                        </article>
                        <article>
                            <div class="why-veyvey-box-image">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/pover-cord.png" alt="power cord icon">
                            </div>
                            <h3>Hotels Worldwide</h3>
                            <p>
                                This includes hotels, hostels, apartments,
                                villas, and even campgrounds.
                            </p>
                        </article>
                        <article>
                            <div class="why-veyvey-box-image">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/note-book.png" alt="power cord icon">
                            </div>
                            <h3>Reliable Reviews</h3>
                            <p>
                                We collect and publish our clients reviews, as well as reviews from TripAdvisor.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    <!-- Experience Types -->
        <section class="our-benefits">
            <div class="container">
                    <div class="section-header">
                        <span>OUR BENEFITS</span>
                        <h2>Best experience possible brought<br>to you by Veyvey team</h2>
                    </div>
                    <div class="our-benefits-wrapper">
                        <div class="our-benefits-block">
                            <div class="our-benefits-title-mobie">
                                <div class="our-benefits-icon-mobile">
                                    <img src="http://192.168.100.9/veyvey/public/images/svg/dolar-sign.svg" alt="">
                                </div>
                                <h3>New listing in seconds</h3>
                            </div>
                            <div class="our-benefits-image">
                                <img src="http://192.168.100.9/veyvey/public/images/person-1.png" alt="" class="main-image">
                                <div class="dot-pattern">
                                    <img src="http://192.168.100.9/veyvey/public/images/svg/dot-pattern.svg" alt="">
                                </div>
                            </div>
                            <div class="our-benefits-content">
                                <div>
                                    <div class="our-benefits-content-icon">
                                        <img src="http://192.168.100.9/veyvey/public/images/svg/purple-clock.svg" alt="">
                                    </div>
                                    <h3>New listing in seconds</h3>
                                    <p>We offer self check-in and 24/7 guest support via our app.
                                        Whenever possible, we resolve guest requests with
                                        contact-free service.
                                    </p>
                                    <img src="http://192.168.100.9/veyvey/public/images/svg/logo-pattern.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="our-benefits-block">
                            <div class="our-benefits-title-mobie">
                                <div class="our-benefits-icon-mobile">
                                    <img src="http://192.168.100.9/veyvey/public/images/svg/dolar-sign.svg" alt="">
                                </div>
                                <h3>New listing in seconds</h3>
                            </div>
                            <div class="our-benefits-image">
                                <img src="http://192.168.100.9/veyvey/public/images/person-2.png" alt="" class="main-image">
                                <div class="dot-pattern-2">
                                    <img src="http://192.168.100.9/veyvey/public/images/svg/dot-pattern-2.svg" alt="">
                                </div>
                            </div>
                            <div class="our-benefits-content">
                                <div>
                                    <div class="our-benefits-content-icon">
                                        <img src="http://192.168.100.9/veyvey/public/images/svg/dolar-sign.svg" alt="">
                                    </div>
                                    <h3>Double your profits</h3>
                                    <p>We offer self check-in and 24/7 guest support via our app.
                                        Whenever possible, we resolve guest requests with
                                        contact-free service.
                                    </p>
                                    <img src="http://192.168.100.9/veyvey/public/images/svg/logo-pattern.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>
    <section class="main-slider-section">
        <div class="slider-section-blure">
        </div>
        <div class="main-slider-title">
            <span>TOP DESTINATIONS</span>
            <h2>
                Discover surprising adventures<br>
                from mountains to cities
            </h2>
        </div>
        <div class="main-slider">
            <div class="uk-position-relative uk-visible-toggle uk-light slider-container uk-slider uk-slider-container"uk-slider="center: true">
                <ul class="uk-slider-items uk-grid" style="transform: translate3d(-440px, 0px, 0px);">
                    <li>
                        <div>
                            <div class="slider-block-icon">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/svaneti2.png">
                            </div>
                            <h3>
                                Find perfect <br> places in Borjomi
                            </h3>
                            <p>
                                Its diverse architecture encompasses Eastern
                                Orthodox churches, ornate art nouveau
                                buildings and Soviet structures.
                            </p>
                            <a class="slider-block-btn">
                                <span>See 425 Apartments</span>
                                <img src="http://192.168.100.9/veyvey/public/images/svg/purple-arrow-tight.svg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="slider-block-icon">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/borjomi.png">
                            </div>
                            <h3>
                                Find perfect <br> places in Borjomi
                            </h3>
                            <p>
                                Its diverse architecture encompasses Eastern
                                Orthodox churches, ornate art nouveau
                                buildings and Soviet structures.
                            </p>
                            <a class="slider-block-btn">
                                <span>See 425 Apartments</span>
                                <img src="http://192.168.100.9/veyvey/public/images/svg/purple-arrow-tight.svg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="slider-block-icon">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/kakhe.png">
                            </div>
                            <h3>
                                Find perfect <br> places in Borjomi
                            </h3>
                            <p>
                                Its diverse architecture encompasses Eastern
                                Orthodox churches, ornate art nouveau
                                buildings and Soviet structures.
                            </p>
                            <a class="slider-block-btn">
                                <span>See 425 Apartments</span>
                                <img src="http://192.168.100.9/veyvey/public/images/svg/purple-arrow-tight.svg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="slider-block-icon">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/kakhe.png">
                            </div>
                            <h3>
                                Find perfect <br> places in Borjomi
                            </h3>
                            <p>
                                Its diverse architecture encompasses Eastern
                                Orthodox churches, ornate art nouveau
                                buildings and Soviet structures.
                            </p>
                            <a class="slider-block-btn">
                                <span>See 425 Apartments</span>
                                <img src="http://192.168.100.9/veyvey/public/images/svg/purple-arrow-tight.svg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="slider-block-icon">
                                <img src="http://192.168.100.9/veyvey/public/images/icons/borjomi.png">
                            </div>
                            <h3>
                                Find perfect <br> places in Borjomi
                            </h3>
                            <p>
                                Its diverse architecture encompasses Eastern
                                Orthodox churches, ornate art nouveau
                                buildings and Soviet structures.
                            </p>
                            <a class="slider-block-btn">
                                <span>See 425 Apartments</span>
                                <img src="http://192.168.100.9/veyvey/public/images/svg/purple-arrow-tight.svg" alt="">
                            </a>
                        </div>
                    </li>
                </ul>
                <a class="uk-position-top-left uk-position-small slider-btn uk-icon uk-slidenav-previous uk-slidenav" href="#" uk-slidenav-previous="" uk-slider-item="previous">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/btn-arrow-left.svg" alt="">
                <svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
                <a class="uk-position-top-right uk-position-small slider-btn uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/btn-arrow-right.svg" alt="">
                <svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>
            </div>
        </div>
   </section>
   <section class="commemt-section">
        <div class="container">
            <div class="comment-section-title">
                <div class="comment-section-title-icon"><img src="http://192.168.100.9/veyvey/public/images/svg/purple-hart.svg" alt=""></div>
                <h2>10,000+ customers and <br>
                    companies are loving Veyvey.
                </h2>
            </div>
            <div class="comment-section-slider">
                <div class="uk-position-relative uk-visible-toggle uk-light comment-slider uk-slider uk-slider-container"uk-slider="">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid" style="transform: translate3d(0px, 0px, 0px);">
                        <li>
                            <div class="comment-header">
                                <div class="autor-image">
                                    <img src="http://192.168.100.9/veyvey/public/images/sergio.png" alt="">
                                </div>
                                <h5>@roomshotel</h5>
                            </div>
                            <p>We are always happy to recieve customers from Veyvey, because they made this process easier than anyone else does.</p>
                        </li>
                        <li>
                            <div class="comment-header">
                                <div class="autor-image">
                                    <img src="http://192.168.100.9/veyvey/public/images/sergio.png" alt="">
                                </div>
                                <h5>@roomshotel</h5>
                            </div>
                            <p>We are always happy to recieve customers from Veyvey, because they made this process easier than anyone else does.</p>
                        </li>
                        <li>
                            <div class="comment-header">
                                <div class="autor-image">
                                    <img src="http://192.168.100.9/veyvey/public/images/sergio.png" alt="">
                                </div>
                                <h5>@roomshotel</h5>
                            </div>
                            <p>We are always happy to recieve customers from Veyvey, because they made this process easier than anyone else does.</p>
                        </li>
                        <li>
                            <div class="comment-header">
                                <div class="autor-image">
                                    <img src="http://192.168.100.9/veyvey/public/images/sergio.png" alt="">
                                </div>
                                <h5>@roomshotel</h5>
                            </div>
                            <p>We are always happy to recieve customers from Veyvey, because they made this process easier than anyone else does.</p>
                        </li>
                        <li>
                            <div class="comment-header">
                                <div class="autor-image">
                                    <img src="http://192.168.100.9/veyvey/public/images/sergio.png" alt="">
                                </div>
                                <h5>@roomshotel</h5>
                            </div>
                            <p>We are always happy to recieve customers from Veyvey, because they made this process easier than anyone else does.</p>
                        </li>
                    </ul>
                    <a class="uk-position-top-right uk-position-small slider-button-left" href="#" uk-slider-item="previous">
                        <img src="http://192.168.100.9/veyvey/public/images/svg/comment-slider-arrow-right.svg" alt="">
                    </a>
                    <a class="uk-position-top-right uk-position-small slider-button-right" href="#" uk-slider-item="next">
                        <img src="http://192.168.100.9/veyvey/public/images/svg/comment-slider-arrow-right.svg" alt="">
                    </a>
                    <div class="blure">

                    </div>
                </div>
            </div>
        </div>
   </section>
<!-- List of Blog -->
<section class="everywhere">
    <div class="container container-flex">
        <div class="everywhere-header">
            <span>ALL SERVICES</span>
            <h2>Everywhere<br>you want to go</h2>
        </div>
        <div class="everywhere-wrapper">
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/hotel.png" alt="hotel icon">
                </div>
                <h3>Hotels</h3>
                <div class="service-text">
                    <p>Siphome reacts the moment your equipment fails, alerting you to the problem.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/house.png" alt="house icon">
                </div>
                <h3>Appartments</h3>
                <div class="service-text">
                    <p>See exactly what is malfunctioning and compare your maintenance options on the same screen.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/Church.png" alt="church icon">
                </div>
                <h3>Experiences</h3>
                <div class="service-text">
                    <p>Predictive analytics lets you see what needs maintenance before it fails.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/car.png" alt="car icon">
                </div>
                <h3>Cars</h3>
                <div class="service-text">
                    <p>Siphome monitors your critical systems 24/7 so you can enjoy peace of mind.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/Restaurant.png" alt="Restaurant icon">
                </div>
                <h3>Restaurants</h3>
                <div class="service-text">
                    <p>Siphome reacts the moment your equipment fails, alerting you to the problem.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/trails.png" alt="earth icon">
                </div>
                <h3>Trails</h3>
                <div class="service-text">
                    <p>See exactly what is malfunctioning and compare your maintenance options on the same screen.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/disco.png" alt="disco ball icon">
                </div>
                <h3>Events</h3>
                <div class="service-text">
                    <p>Predictive analytics lets you see what needs maintenance before it fails.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-icon">
                    <img src="http://192.168.100.9/veyvey/public/images/icons/train.png" alt="disco ball icon">
               </div>
                <h3>Railways</h3>
                <div class="service-text">
                    <p>Siphome monitors your critical systems 24/7 so you can enjoy peace of mind.</p>
                    <div>
                        <a href="" class="service-link">View</a>
                        <span uk-icon="arrow-right" class="service-arrow uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline><line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line></svg></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit-icons.min.js"></script>
@include('frontend.components.footer')
