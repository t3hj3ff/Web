@include('frontend.components.header-white')
@php
    enqueue_script('scroll-magic-js');
    global $post;
@endphp
@php
    enqueue_style('daterangepicker-css');
    enqueue_script('daterangepicker-js');
    enqueue_script('daterangepicker-lang-js');
@endphp
@php
    $booking_form  = $post->booking_form;
@endphp
<link rel="stylesheet" href="http://test.gtrun.ge/home/css/product-page-style.css">
<link rel="stylesheet" href="http://test.gtrun.ge/home/css/style-prod.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit-icons.min.js"></script>








<body>
    <section>
        <div class="product-page-slider">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                <ul class="uk-slider-items uk-child-width-1-3">
                    <li>
                        <img src="image/hotel-img1.png" alt="">
                    </li>
                    <li>
                        <img src="image/hotel-img2.png" alt="" active>
                    </li>
                    <li>
                        <img src="image/hotel-img3.png" alt="">
                    </li>
                    <li>
                        <img src="image/hotel-img3.png" alt="">
                    </li>
                    <li>
                        <img src="image/hotel-img4.png" alt="">
                    </li>
                </ul>
                <a class="uk-position-center-left uk-position-small slider-arrow-left slider-arrow" href="#" uk-slidenav-previous uk-slider-item="previous">
                    <img src="image/slider-arrow-left.png" alt="">
                </a>
                <a class="uk-position-center-right uk-position-small slider-arrow-right slider-arrow" href="#" uk-slidenav-next uk-slider-item="next">
                    <img src="image/slider-arrow-right.png" alt="">
                </a>
                <div class="product-page-slider-button">
                    <div class="profile-container">
                        <div class="slider-button-block">
                            <button class="tour">
                                <img src="image/3Drotation.png" alt="">
                                3D Tour
                            </button>
                            <button class="all-photo">
                                <img src="image/image-icon.png" alt="">
                                All photos +15
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="overview-section">
        <div class="profile-container">
            <div class="product-page-wrapper">
                <div class="product-page-conent">
                    <div class="product-page-main-features">
                        <h2>Main Features</h2>
                        <div class="product-main-features-wrapper">
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['parking'] ?> <?php echo $result['parking_price'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['language_1'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['language'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['breakfast'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['extra_bed'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['extra_children'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['facilities_1'] ?></h5>
                            </div>
                            <div class="main-features-block">
                                <div class="main-features-icon">
                                    <img src="image/lightning.png" alt="">
                                </div>
                                <h5><?php echo $result['facilities_2'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-page-description">
                        <h2>Description</h2>
                        <div class="product-page-description-block">
                            <p>
                                {{ get_translate($post->post_description) }}
                                <span id="dots">...</span>
                                <span id="more">

                                </span>
                            </p>
                            <div class="read-more-button-block">
                                <span class="read-more-button" onclick="readMore()" id="myBtn">
                                    Read more
                                </span>
                                <img src="image/arrow-down-light.png" alt="">
                            </div>
                            <button class="translate-button">
                                <img src="image/google-translate.png" alt="">
                                Google Translate
                            </button>
                        </div>
                    </div>
                    <div class="product-page-room-type-room-wrapper">
                        <h2>Room types</h2>
<?php foreach ($finalrooms as $finalroom): ?>
                        <!-- Start -->
                        <div class="product-page-room-type">
                            <div class="product-page-room-type-block">
                                <div class="room-images">
                                    <div class="room-image-modal-button">
                                        <div class="room-images-main-ph" uk-toggle="target: #my-id">
                                            <img src="image/hotel-img4.png" alt="">
                                        </div>
                                        <div class="room-images-alt-ph" uk-toggle="target: #my-id">
                                            <div class="alt-img-block modal-sections">
                                                <img src="image/hotel-img4.png" alt="">
                                            </div>
                                            <div class="alt-img-block modal-sections">
                                                <img src="image/hotel-img4.png" alt="">
                                            </div>
                                            <div class="alt-img-block modal-sections">
                                                <img src="image/hotel-img4.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="room-options">
                                    <div>

                                        <h3><?php echo $finalroom['room_name'] ?></h3>
                                        <span class="room-size">Room Size : <?php echo $finalroom['room_size'] ?>m2</span>
                                        <ul>
                                            <li><span>&#183;</span> <?php echo $finalroom['hotel_room_type'] ?></li>
                                            <li><span>&#183;</span> <?php echo $finalroom['guest_number'] ?> guests</li>
                                            <li><span>&#183;</span> <?php echo $finalroom['bathroom'] ?> bath</li>
                                            <li><span>&#183;</span> Wifi</li>
                                            <li><span>&#183;</span> Heating</li>
                                            <li><span>&#183;</span> Pool</li>
                                            <li><span>&#183;</span> Kitchen</li>
                                            <li><span>&#183;</span> Room</li>
                                            <li><span>&#183;</span> Air conditioning</li>

                                        </ul>
                                    </div>
                                    <div class="room-options-footer">
                                        <div class="room-rating-block">
                                            <span>4.9</span>
                                            <span class="room-voice">(143)</span>
                                        </div>
                                        <button uk-toggle="target: #my-id" class="view-details">
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-page-room-option">


                                <div class="room-option-block">
                                    <div class="room-option-text">
                                        <h4>Room Option 1</h4>
                                        <ul>
                                            <li><?php echo $result['breakfast'] ?></li>
                                            <?php if ($post->enable_cancellation == "off"): ?>
                                              <li>Non-Refoundable</li>
                                            <?php endif; ?>
                                            <?php if ($post->enable_cancellation == "on"): ?>
                                              <li>Cancel Before {{$post->cancel_before}}</li>
                                            <?php endif; ?>

                                            <li>PREPAYMENT NEEDED</li>
                                        </ul>
                                    </div>
                                    <div class="room-option-price">
                                        <div class="sale-block">
                                            <?php echo $finalroom['discount_early3'] ?>%
                                        </div>
                                        <div class="price-block">
                                            <span class="old-price">
                                                <?php echo $finalroom['room_price'] ?>$
                                            </span>
                                            <span class="new-price">
                                              <?php
                                                $roomp = $finalroom['room_price'];
                                                $disc = $finalroom['discount_early3'];

                                                $sum = $roomp/100*$disc;
                                                $totalsum = $roomp-$sum;

                                              ?>
                                                <?php echo $totalsum; ?>$
                                            </span>
                                        </div>
                                        <button class="book-now">
                                            Book now
                                        </button>
                                        <div class="price-detals">
                                            <button class="price-detals-button" >Price details</button>
                                            <div class="price-detals-popup" uk-drop="mode: click">
                                                <div class="price-detals-title">
                                                    <h4>Price Details</h4>
                                                    <button class="uk-drop-close uk-right-top" type="button">
                                                        <img src="image/close.png" alt="">
                                                    </button>
                                                </div>
                                                <div class="price-detals-list">
                                                    <ul>
                                                        <li>
                                                            <div class="price-of"><?php echo $finalroom['room_price']; ?> x 3 nights</div>
                                                            <div class="price-detals-list-number">$330</div>
                                                        </li>
                                                        <li>
                                                            <div class="price-of">Cleaning fee</div>
                                                            <div class="price-detals-list-number"><?php echo $result['cleaning_price'] ?>$</div>
                                                        </li>
                                                        <li>
                                                            <div class="price-of">Service fee</div>
                                                            <div class="price-detals-list-number">$48</div>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        This place is $12 less than its median
                                                        60-day price for your trip dates.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="room-option-block">
                                    <div class="room-option-text">
                                        <h4>Room Option 1</h4>
                                        <ul>
                                            <li>Breakfast included</li>
                                            <li>Free Cancelation before July 17</li>
                                            <li>PREPAYMENT NEEDED</li>
                                            <li>Breakfast included</li>
                                        </ul>
                                    </div>
                                    <div class="room-option-price">
                                        <div class="sale-block">
                                            -10%
                                        </div>
                                        <div class="price-block">
                                            <span class="old-price">
                                                $60
                                            </span>
                                            <span class="new-price">
                                                $50
                                            </span>
                                        </div>
                                        <button class="book-now">
                                            Book now
                                        </button>
                                        <div class="price-detals">
                                            <button class="price-detals-button" >Price details</button>
                                            <div class="price-detals-popup" uk-drop="mode: click">
                                                <div class="price-detals-title">
                                                    <h4>Price Details</h4>
                                                    <button class="uk-drop-close uk-right-top" type="button">
                                                        <img src="image/close.png" alt="">
                                                    </button>
                                                </div>
                                                <div class="price-detals-list">
                                                    <ul>
                                                        <li>
                                                            <div class="price-of">$110 x 3 nights</div>
                                                            <div class="price-detals-list-number">$330</div>
                                                        </li>
                                                        <li>
                                                            <div class="price-of">Cleaning fee</div>
                                                            <div class="price-detals-list-number">$12</div>
                                                        </li>
                                                        <li>
                                                            <div class="price-of">Service fee</div>
                                                            <div class="price-detals-list-number">$48</div>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        This place is $12 less than its median
                                                        60-day price for your trip dates.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </div>
                            <div id="my-id" class="prouct-page-modal" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <div class="prouct-page-price-modal">
                                        <div class="price-modal-header">
                                            <h2>Room information</h2>
                                            <button class="uk-modal-close" type="button" uk-close></button>
                                        </div>
                                        <div class="price-modal-body">
                                            <div class="profile-container">
                                                <div class="price-modal-wrapper">
                                                    <div class="price-modal-content">
                                                        <div class="price-modal-slider">
                                                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                                                                <ul class="uk-slider-items uk-child-width-1-1">
                                                                    <li>
                                                                        <img src="image/hotel-img1.png" alt="">
                                                                    </li>
                                                                    <li>
                                                                        <img src="image/hotel-img2.png" alt="">
                                                                    </li>
                                                                    <li>
                                                                        <img src="image/hotel-img3.png" alt="">
                                                                    </li>
                                                                </ul>
                                                                <a class="uk-position-center-left uk-position-small slider-arrow-left slider-arrow" href="#" uk-slidenav-previous uk-slider-item="previous">
                                                                    <img src="image/slider-arrow-left.png" alt="">
                                                                </a>
                                                                <a class="uk-position-center-right uk-position-small slider-arrow-right slider-arrow" href="#" uk-slidenav-next uk-slider-item="next">
                                                                    <img src="image/slider-arrow-right.png" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="price-modal-room-option-wrapper">
                                                            <div class="price-modal-room-title">
                                                                <h2>Room options</h2>
                                                            </div>
                                                            <div class="room-option-block">
                                                                <div class="room-option-text">
                                                                    <h4>Room Option 1</h4>
                                                                    <ul>
                                                                        <li><?php echo $result['breakfast'] ?></li>
                                                                        <?php if ($post->enable_cancellation == "off"): ?>
                                                                          <li>Non-Refoundable</li>
                                                                        <?php endif; ?>
                                                                        <?php if ($post->enable_cancellation == "on"): ?>
                                                                          <li>Cancel Before {{$post->cancel_before}}</li>
                                                                        <?php endif; ?>

                                                                        <li>PREPAYMENT NEEDED</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="room-option-price">
                                                                    <div class="sale-block">
                                                                        <?php echo $finalroom['discount_early3'] ?>%
                                                                    </div>
                                                                    <div class="price-block">
                                                                        <span class="old-price">
                                                                            <?php echo $finalroom['room_price'] ?>$
                                                                        </span>
                                                                        <span class="new-price">
                                                                          <?php
                                                                            $roomp = $finalroom['room_price'];
                                                                            $disc = $finalroom['discount_early3'];

                                                                            $sum = $roomp/100*$disc;
                                                                            $totalsum = $roomp-$sum;

                                                                          ?>
                                                                            <?php echo $totalsum; ?>$
                                                                        </span>
                                                                    </div>
                                                                    <button class="book-now">
                                                                        Book now
                                                                    </button>
                                                                    <div class="price-detals">
                                                                        <button class="price-detals-button" >Price details</button>
                                                                        <div class="price-detals-popup" uk-drop="mode: click">
                                                                            <div class="price-detals-title">
                                                                                <h4>Price Details</h4>
                                                                                <button class="uk-drop-close uk-right-top" type="button">
                                                                                    <img src="image/close.png" alt="">
                                                                                </button>
                                                                            </div>
                                                                            <div class="price-detals-list">
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="price-of"><?php echo $finalroom['room_price']; ?> x 3 nights</div>
                                                                                        <div class="price-detals-list-number">$330</div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="price-of">Cleaning fee</div>
                                                                                        <div class="price-detals-list-number"><?php echo $result['cleaning_price'] ?>$</div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="price-of">Service fee</div>
                                                                                        <div class="price-detals-list-number">$48</div>
                                                                                    </li>
                                                                                </ul>
                                                                                <p>
                                                                                    This place is $12 less than its median
                                                                                    60-day price for your trip dates.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="room-option-block">
                                                                <div class="room-option-text">
                                                                    <h4>Room Option 1</h4>
                                                                    <ul>
                                                                        <li>Breakfast included</li>
                                                                        <li>Free Cancelation before July 17</li>
                                                                        <li>PREPAYMENT NEEDED</li>
                                                                        <li>Breakfast included</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="room-option-price">
                                                                    <div class="sale-block">
                                                                        -10%
                                                                    </div>
                                                                    <div class="price-block">
                                                                        <span class="old-price">
                                                                            $60
                                                                        </span>
                                                                        <span class="new-price">
                                                                            $50
                                                                        </span>
                                                                    </div>
                                                                    <button class="book-now">
                                                                        Book now
                                                                    </button>
                                                                    <div class="price-detals">
                                                                        <button class="price-detals-button" >Price details</button>
                                                                        <div class="price-detals-popup" uk-drop="mode: click">
                                                                            <div class="price-detals-title">
                                                                                <h4>Price Details</h4>
                                                                                <button class="uk-drop-close uk-right-top" type="button">
                                                                                    <img src="image/close.png" alt="">
                                                                                </button>
                                                                            </div>
                                                                            <div class="price-detals-list">
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="price-of">$110 x 3 nights</div>
                                                                                        <div class="price-detals-list-number">$330</div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="price-of">Cleaning fee</div>
                                                                                        <div class="price-detals-list-number">$12</div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="price-of">Service fee</div>
                                                                                        <div class="price-detals-list-number">$48</div>
                                                                                    </li>
                                                                                </ul>
                                                                                <p>
                                                                                    This place is $12 less than its median
                                                                                    60-day price for your trip dates.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    <div>
                                                        </div>
                                                    </div>
                                                    <div class="price-modal-sidebar">
                                                        <div class="price-modal-sidebar-room-info">
                                                            <h4><?php echo $finalroom['room_name'] ?></h4>
                                                            <span class="room-size"><?php echo $finalroom['room_size'] ?> m2r</span>
                                                            <ul>
                                                              <li><span>&#183;</span> <?php echo $finalroom['hotel_room_type'] ?></li>
                                                              <li><span>&#183;</span> <?php echo $finalroom['guest_number'] ?> guests</li>
                                                              <li><span>&#183;</span> <?php echo $finalroom['bathroom'] ?> bath</li>
                                                                <li><span>&#183;</span> Wifi</li>
                                                                <li><span>&#183;</span> Heating</li>
                                                                <li><span>&#183;</span> Pool</li>
                                                                <li><span>&#183;</span> Kitchen</li>
                                                                <li><span>&#183;</span> Room</li>
                                                                <li><span>&#183;</span> Air conditioning</li>
                                                            </ul>
                                                            <div class="price-modal-sideb-rating">
                                                                <span>4.9</span>
                                                                <span class="room-voice">(143)</span>
                                                            </div>
                                                        </div>
                                                        <div class="price-modal-sidebar-Amenities">
                                                            <h2>Amenities</h2>
                                                            <div class="amenities-list">
                                                                <div class="amenities-list-title">
                                                                    <img src="image/Search.png" alt="">
                                                                    <h4>Entire Home</h4>
                                                                </div>
                                                                <ul>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet paper</span>
                                                                    </li>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Towels</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Bath or shower</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Bath or shower</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="amenities-list">
                                                                <div class="amenities-list-title">
                                                                    <img src="image/Scan.png" alt="">
                                                                    <h4>Bathroom</h4>
                                                                </div>
                                                                <ul>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet paper</span>
                                                                    </li>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Towels</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Bath or shower</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="amenities-list">
                                                                <div class="amenities-list-title">
                                                                    <img src="image/discovery.png" alt="">
                                                                    <h4>Bathroom</h4>
                                                                </div>
                                                                <ul>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet paper</span>
                                                                    </li>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Towels</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="amenities-list">
                                                                <div class="amenities-list-title">
                                                                    <img src="image/Folder.png" alt="">
                                                                    <h4>House Rules</h4>
                                                                </div>
                                                                <ul>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Toilet paper</span>
                                                                    </li>
                                                                    <li class="amenities-pricey">
                                                                        <div class="amenities-dot"></div>
                                                                        <span>Towels</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="price-modal-sidebar-most-popular">
                                                            <h2>Most popular facilities</h2>
                                                            <ul>
                                                                <li><?php echo $result['facilities_1'] ?></li>
                                                                <li><?php echo $result['facilities_2'] ?></li>
                                                                <li><?php echo $result['facilities_3'] ?></li>
                                                                <li>Bath or shower</li>
                                                                <li>Socket near the bed</li>
                                                                <li>Desk</li>
                                                                <li>TV</li>
                                                                <li>Slippers</li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-modal-sidebar-food">
                                                            <h2>Food and drinks</h2>
                                                            <ul>
                                                                <li>✅ 24-hour room service</li>
                                                                <li>✅ Coffee/tea maker</li>
                                                                <li>✅ Free bottled water</li>
                                                                <li>✅ Minibar</li>
                                                                <li>✅ 5M.Star restaurant</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
<?php endforeach; ?>
                        <!-- /*end -->


                    </div>
                    <section class="amenities-section">
                        <div class="product-page-amenities">
                            <h2>Amenities</h2>
                            <h5>
                                <div class="amenities-dot"></div>
                                Additional charges may apply for some amenities
                            </h5>
                            <div class="product-page-amenities-block">
                                <div class="amenities-list-block">
                                    <div class="amenities-list">
                                        <div class="amenities-list-title">
                                            <img src="image/Search.png" alt="">
                                            <h4>Bathroom</h4>
                                        </div>
                                        <ul>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Toilet paper</span>
                                            </li>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Towels</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="amenities-list">
                                        <div class="amenities-list-title">
                                            <img src="image/discovery.png" alt="">
                                            <h4>Self check-in</h4>
                                        </div>
                                        <ul>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Toilet paper</span>
                                            </li>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Towels</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="amenities-list">
                                        <div class="amenities-list-title">
                                            <img src="image/Scan.png" alt="">
                                            <h4>Bathroom</h4>
                                        </div>
                                        <ul>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Toilet paper</span>
                                            </li>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Towels</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="amenities-list">
                                        <div class="amenities-list-title">
                                            <img src="image/Search.png" alt="">
                                            <h4>Bathroom</h4>
                                        </div>
                                        <ul>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Toilet paper</span>
                                            </li>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Towels</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="amenities-list">
                                        <div class="amenities-list-title">
                                            <img src="image/Search.png" alt="">
                                            <h4>Bathroom</h4>
                                        </div>
                                        <ul>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Toilet paper</span>
                                            </li>
                                            <li class="amenities-pricey">
                                                <div class="amenities-dot"></div>
                                                <span>Towels</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Bath or shower</span>
                                            </li>
                                            <li>
                                                <div class="amenities-dot"></div>
                                                <span>Toilet</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="amenities-see-more">
                                    <span>See more</span>
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="product-page-sidebar">
                    <div class="hotel-shear-bock">
                        <div class="hotel-shear-wrapper">
                            <div class="share">
                                Share
                            </div>
                            <button class="hart">
                                <img src="image/heart.png" alt="">
                            </button>
                        </div>
                    </div>
                    <div class="product-page-price-wrapper">
                        <div class="product-page-price-block form-book-1" id="form-book-home" class="" data-real-price="{{ url('get-home-price-realtime') }}">
                            <div class="product-page-price-block-header">
                                <div class="price-block-header">
                                    <div class="product-page-hotel-logo">
                                        <img src="image/hotel-logo1.png" alt="">
                                    </div>
                                    <div class="product-page-price-title">
                                        <h2>{{ get_translate($post->post_title) }}</h2>
                                        <span>Hotels in · {{ get_translate($post->location_state) }}, {{ get_translate($post->location_country) }}  ·  <a href="">Show on map</a></span>
                                    </div>
                                </div>
                                <div class="one-night-price" onclick="scrollChange()">
                                    {{ convert_price($post->base_price) }}$/night
                                </div>
                            </div>



                            <div class="form-body relative">
                                @include('common.loading', ['class' => 'booking-loading'])
                                @if($booking_form == 'instant_enquiry')
                                    <ul class="nav nav-tabs nav-bordered row">
                                        <li class="nav-item nav-item-booking-form-instant col">
                                            <a href="#booking-form-instant"
                                               data-toggle="tab"
                                               aria-expanded="false"
                                               class="nav-link @if($booking_form == 'instant_enquiry' ||$booking_form == 'instant') active @endif">
                                                {{ __('Instant') }}
                                            </a>
                                        </li>
                                        <li class="nav-item nav-item-booking-form-instant col">
                                            <a href="#booking-form-enquiry"
                                               data-toggle="tab"
                                               aria-expanded="false"
                                               class="nav-link @if($booking_form == 'enquiry') active @endif">
                                                {{ __('Enquiry') }}
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                                @if($booking_form == 'instant_enquiry')
                                    <div class="tab-content">
                                        @endif
                                        @if($booking_form == 'instant_enquiry' || $booking_form == 'instant')
                                            <div
                                                class="tab-pane @if($booking_form == 'instant_enquiry' ||$booking_form == 'instant') active @endif"
                                                id="booking-form-instant">
                                                <svg style="margin-top:24px;" width="400" height="1" viewBox="0 0 400 1" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect opacity="0.5" x="400" width="1.00002" height="400" transform="rotate(90 400 0)" fill="#E2E2E2"/>
        </svg>

                                                <form class="form-action" action="{{ url('add-to-cart-home') }}" method="post"
                                                      data-loading-from=".form-body">
                                                    @if($post->booking_type == 'per_night')
                                                        <div class="form-group">
                                                            <div style="background: #FFFFFF;border: 1px solid #F0F1F3;box-sizing: border-box;border-radius: 16px;margin-top: 24px;" class="date-wrapper date-double"
                                                                 data-date-format="{{ hh_date_format_moment() }}"
                                                                 data-action="{{ url('get-home-availability-single') }}">
                                                                <input type="text" class="input-hidden check-in-out-field"
                                                                       name="checkInOut" data-home-id="{{ $post->post_id }}"
                                                                       data-home-encrypt="{{ hh_encrypt($post->post_id) }}">
                                                                <input type="text" class="input-hidden check-in-field"
                                                                       name="checkIn">
                                                                <input type="text" class="input-hidden check-out-field"
                                                                       name="checkOut">
                                                                <span style="font-weight: bold;font-size: 16px;color: #040921;" class="check-in-render"
                                                                      data-date-format="{{ hh_date_format_moment() }}"></span>
                                                                <span style="font-weight: bold;font-size: 16px;color: #040921;" class="check-out-render"
                                                                      data-date-format="{{ hh_date_format_moment() }}"></span>
                                                            </div>
                                                        </div>
                                                    @elseif($post->booking_type == 'per_hour')
                                                        <div class="form-group">
                                                            <label for="checkinout">{{__('Check In')}}</label>
                                                            <div class="date-wrapper date-single"
                                                                 data-date-format="{{ hh_date_format_moment() }}"
                                                                 data-action-time="{{ url('get-home-availability-time-single') }}"
                                                                 data-action="{{ url('get-home-availability-single') }}">
                                                                <input type="text"
                                                                       class="input-hidden check-in-out-single-field"
                                                                       name="checkInOut" data-home-id="{{ $post->post_id }}"
                                                                       data-home-encrypt="{{ hh_encrypt($post->post_id) }}">
                                                                <input type="text" class="input-hidden check-in-field"
                                                                       name="checkIn">
                                                                <input type="text" class="input-hidden check-out-field"
                                                                       name="checkOut">
                                                                <span class="check-in-render"
                                                                      data-date-format="{{ hh_date_format_moment() }}"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-date-time d-none">
                                                            <label>{{ __('Time') }}</label>
                                                            <div class="date-wrapper date-time">
                                                                <div class="date-render check-in-render"
                                                                     data-time-format="{{ hh_time_format() }}">
                                                                    <div class="render">{{__('Start Time')}}</div>
                                                                    <div class="dropdown-time">

                                                                    </div>
                                                                    <input type="hidden" name="startTime" value=""
                                                                           class="input-checkin"/>
                                                                </div>
                                                                <span class="divider"></span>
                                                                <div class="date-render check-out-render"
                                                                     data-time-format="{{ hh_time_format() }}">
                                                                    <div class="render">{{__('End Time')}}</div>
                                                                    <div class="dropdown-time">

                                                                    </div>
                                                                    <input type="hidden" name="endTime" value=""
                                                                           class="input-checkin"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @php
                                                        $max_guest = (int) $post->number_of_guest;
                                                    @endphp
                                                    <div class="form-group">

                                                        <div
                                                            class="guest-group @if($post->enable_extra_guest == 'on') has-extra-guest @endif">
                                                            <button style="color: #040921;font-weight: bold;font-size: 16px;background: #FFFFFF;border: 1px solid #F0F1F3;box-sizing: border-box;border-radius: 16px;" type="button" class="btn btn-light dropdown-toggle"
                                                                    data-toggle="dropdown"
                                                                    data-text-guest="{{__('Guest')}}"
                                                                    data-text-guests="{{__('Guests')}}"
                                                                    data-text-infant="{{__('Infant')}}"
                                                                    data-text-infants="{{__('Infants')}}"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                &nbsp;
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <div class="group">
                                                                    <span class="pull-left">{{__('Adults')}}</span>
                                                                    <div class="control-item">
                                                                        <i class="decrease ti-minus"></i>
                                                                        <input type="number" min="1" step="1"
                                                                               max="{{ $max_guest }}"
                                                                               name="num_adults"
                                                                               value="1">
                                                                        <i class="increase ti-plus"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="group">
                                                                    <span class="pull-left">{{__('Children')}}</span>
                                                                    <div class="control-item">
                                                                        <i class="decrease ti-minus"></i>
                                                                        <input type="number" min="0" step="1"
                                                                               max="{{ $max_guest }}"
                                                                               name="num_children"
                                                                               value="0">
                                                                        <i class="increase ti-plus"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="group">
                                                                    <span class="pull-left">{{__('Infants')}}</span>
                                                                    <div class="control-item">
                                                                        <i class="decrease ti-minus"></i>
                                                                        <input type="number" min="0" step="1"
                                                                               max="{{ $max_guest }}"
                                                                               name="num_infants"
                                                                               value="0">
                                                                        <i class="increase ti-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-page-price-block-body">
                                                      <div class="price-block-info-wrapper">

                                                        <button class="info-block">
                                                            <div class="from-until">
                                                                <span>Room option</span>
                                                                <div class="info-block-data">Room option 2<span class="x">(1x)</span></div>
                                                            </div>
                                                            <div class="info-block-button">
                                                                <div class="info-block-icon">
                                                                    <img src="image/small-home.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div uk-drop="mode: click" class="info-block-dropdown">
                                                              <ul>

                                                              </ul>
                                                            </div>
                                                        </button>

                                                        <button class="info-block">
                                                                <div class="from-until">
                                                                    <span>Choose rate</span>
                                                                    <div class="info-block-data">Non-refundable • $1,373</div>
                                                                </div>
                                                                <div class="info-block-button">
                                                                    <div class="info-block-icon">
                                                                        <img src="image/arrow-down-small-product.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <div uk-drop="mode: click" class="info-block-dropdown">
                                                                    <ul>
                                                                      <?php foreach ($finalrooms as $finalroom): ?>
                                                                        <?php if ($finalroom['discount_early3'] > 0): ?>
                                                                          <li>Early Bird <?php echo $finalroom['room_price'] ?></li>
                                                                        <?php endif; ?>
                                                                      <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                        </button>

                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                        @php
                                                            $requiredExtra = $post->required_extra;
                                                        @endphp
                                                        @if ($requiredExtra)
                                                            <div class="extra-services">
                                                                <label class="d-block mb-2" for="extra-services">
                                                                    {{__('Extra')}}
                                                                    <span class="text-danger f12">{{__('(required)')}}</span>
                                                                    <a href="#extra-collapse" class="right"
                                                                       data-toggle="collapse">{!! get_icon('002_download_1', '#2a2a2a','15px') !!}</a>
                                                                </label>
                                                                <div id="extra-collapse" class="collapse show">
                                                                    @foreach ($requiredExtra as $ex)
                                                                        <div class="extra-item d-flex">
                                                                            <span
                                                                                class="name">{{ get_translate($ex['name']) }}</span>
                                                                            <span
                                                                                class="price ml-auto">{{ convert_price($ex['price']) }}</span>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @php
                                                            $extra = $post->not_required_extra;
                                                        @endphp
                                                        @if ($extra)
                                                            <div class="extra-services">
                                                                <label class="d-block mb-2" for="extra-services">
                                                                    <span>{{__('Extra (optional)')}}</span>
                                                                    <a href="#extra-not-required-collapse" class="right"
                                                                       data-toggle="collapse">{!! get_icon('002_download_1', '#2a2a2a','15px') !!}</a>
                                                                </label>
                                                                <div id="extra-not-required-collapse" class="collapse">
                                                                    @foreach ($extra as $ex)
                                                                        <div class="extra-item d-flex">
                                                                            <div class="checkbox checkbox-success">
                                                                                <input
                                                                                    id="extra-service-{{ $ex['name_unique'] }}"
                                                                                    class="input-extra"
                                                                                    type="checkbox" name="extraServices[]"
                                                                                    value="{{ $ex['name_unique'] }}">
                                                                                <label
                                                                                    for="extra-service-{{ $ex['name_unique'] }}">
                                                                                    <span
                                                                                        class="name">{{ get_translate($ex['name']) }}</span>
                                                                                </label>
                                                                            </div>
                                                                            <span
                                                                                class="price ml-auto">{{ convert_price($ex['price']) }}</span>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
        </svg>

                                                    <div class="form-group form-render">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="hidden" name="homeID" value="{{ $post->post_id }}">
                                                        <input type="hidden" name="homeEncrypt"
                                                               value="{{ hh_encrypt($post->post_id) }}">
                                                        <input style="font-weight: bold;font-size: 18px;letter-spacing: -0.32px;color: #FFFFFF;width: 368px;height: 68px;background: linear-gradient(246.12deg, #9D50FF 11.55%, #583CF0 104.8%);border-radius: 12px;" type="submit" class="btn btn-primary btn-block text-uppercase"
                                                               name="sm"
                                                               value="{{__('Reserve')}}">
                                                    </div>
                                                    <div class="form-message"></div>
                                                </form>
                                                <svg style="margin-left: 30%;" width="157" height="13" viewBox="0 0 157 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.5" d="M3.458 10H5.334V6.752L8.484 0.395999H6.412L4.396 4.596L2.38 0.395999H0.308L3.458 6.752V10ZM11.3712 10.196C13.6532 10.196 15.1652 8.712 15.1652 6.5C15.1652 4.288 13.6532 2.804 11.3712 2.804C9.0892 2.804 7.5772 4.288 7.5772 6.5C7.5772 8.712 9.0892 10.196 11.3712 10.196ZM11.3712 8.712C10.0972 8.712 9.2572 7.83 9.2572 6.5C9.2572 5.17 10.0972 4.288 11.3712 4.288C12.6452 4.288 13.4852 5.17 13.4852 6.5C13.4852 7.83 12.6452 8.712 11.3712 8.712ZM22.6257 3H20.9457V7.158C20.9457 8.096 20.2597 8.712 19.2377 8.712C18.2157 8.712 17.5297 8.096 17.5297 7.158V3H15.8497V7.354C15.8497 9.062 17.1237 10.196 19.0417 10.196C19.7277 10.196 20.4837 9.916 20.9457 9.482V10H22.6257V3ZM28.4383 10H30.1463L31.3363 5.478L32.5403 10H34.2483L36.6563 3H34.8923L33.4223 8.096L32.1203 3H30.5523L29.2503 8.096L27.7803 3H26.0163L28.4383 10ZM40.101 10.196C42.383 10.196 43.895 8.712 43.895 6.5C43.895 4.288 42.383 2.804 40.101 2.804C37.819 2.804 36.307 4.288 36.307 6.5C36.307 8.712 37.819 10.196 40.101 10.196ZM40.101 8.712C38.827 8.712 37.987 7.83 37.987 6.5C37.987 5.17 38.827 4.288 40.101 4.288C41.375 4.288 42.215 5.17 42.215 6.5C42.215 7.83 41.375 8.712 40.101 8.712ZM44.4428 10H46.1228V5.842C46.1228 4.904 46.8088 4.288 47.8308 4.288C48.8528 4.288 49.5388 4.904 49.5388 5.842V10H51.2188V5.646C51.2188 3.938 49.9448 2.804 48.0268 2.804C47.3408 2.804 46.5848 3.084 46.1228 3.518V3H44.4428V10ZM50.9313 4.554C52.1773 4.554 53.0033 3.714 53.0033 2.468V0.395999H50.9313V2.468H51.6593C51.6593 2.902 51.3653 3.196 50.9313 3.196V4.554ZM57.1666 10.196C57.6286 10.196 58.1046 10.112 58.3566 10V8.796H57.1386C56.7746 8.796 56.5226 8.558 56.5226 8.208V4.4H58.2866V3H56.5226V0.395999H54.8426V3H53.7226V4.4H54.8426V8.208C54.8426 9.398 55.7666 10.196 57.1666 10.196ZM65.9792 10.196C68.1912 10.196 69.6752 8.712 69.6752 6.5C69.6752 4.288 68.1912 2.804 65.9792 2.804C65.1252 2.804 64.1872 3.196 63.6552 3.77V0.395999H61.9752V10H63.6552V9.23C64.1872 9.804 65.1252 10.196 65.9792 10.196ZM65.8112 8.712C64.5232 8.712 63.6552 7.83 63.6552 6.5C63.6552 5.17 64.5232 4.288 65.8112 4.288C67.1272 4.288 67.9952 5.17 67.9952 6.5C67.9952 7.83 67.1272 8.712 65.8112 8.712ZM73.8782 10.196C75.5862 10.196 77.0422 9.16 77.5042 7.62H75.7962C75.4742 8.32 74.7042 8.796 73.8782 8.796C72.7862 8.796 71.9462 8.068 71.7922 6.962H77.5322L77.6722 6.822V6.5C77.6722 4.288 76.1602 2.804 73.8782 2.804C71.5962 2.804 70.0842 4.288 70.0842 6.5C70.0842 8.712 71.5962 10.196 73.8782 10.196ZM71.9042 5.562C72.2262 4.694 72.9402 4.204 73.8782 4.204C74.8162 4.204 75.5302 4.694 75.8522 5.562H71.9042ZM84.5039 10.196C86.4079 10.196 87.8779 8.978 88.1719 7.158H86.5619C86.3519 8.096 85.5259 8.712 84.5039 8.712C83.2299 8.712 82.3899 7.83 82.3899 6.5C82.3899 5.17 83.2299 4.288 84.5039 4.288C85.5119 4.288 86.3239 4.876 86.5479 5.772H88.1579C87.8499 3.994 86.3939 2.804 84.5039 2.804C82.2219 2.804 80.7099 4.288 80.7099 6.5C80.7099 8.712 82.2219 10.196 84.5039 10.196ZM88.8593 10H90.5393V5.842C90.5393 4.904 91.2253 4.288 92.2473 4.288C93.2693 4.288 93.9553 4.904 93.9553 5.842V10H95.6353V5.646C95.6353 3.938 94.3613 2.804 92.4433 2.804C91.7573 2.804 91.0013 3.084 90.5393 3.518V0.395999H88.8593V10ZM99.9657 10.196C100.792 10.196 101.702 9.818 102.234 9.244V10H103.914V3H102.234V3.756C101.702 3.182 100.792 2.804 99.9657 2.804C97.7817 2.804 96.3257 4.288 96.3257 6.5C96.3257 8.712 97.7817 10.196 99.9657 10.196ZM100.134 8.712C98.8597 8.712 98.0057 7.83 98.0057 6.5C98.0057 5.17 98.8597 4.288 100.134 4.288C101.394 4.288 102.234 5.17 102.234 6.5C102.234 7.83 101.394 8.712 100.134 8.712ZM104.885 10H106.565V5.856C106.565 4.918 107.307 4.288 108.427 4.288H109.001V3C108.805 2.916 108.511 2.86 108.259 2.86C107.615 2.86 106.929 3.252 106.565 3.826V3H104.885V10ZM112.41 12.8C114.762 12.8 116.078 11.512 116.078 9.23V3H114.398V3.686C113.88 3.154 113.026 2.804 112.256 2.804C110.142 2.804 108.742 4.246 108.742 6.402C108.742 8.558 110.142 10 112.256 10C113.026 10 113.88 9.65 114.398 9.118V9.23C114.398 10.56 113.684 11.316 112.41 11.316C111.472 11.316 110.716 10.784 110.506 10H108.826C109.064 11.68 110.492 12.8 112.41 12.8ZM112.424 8.516C111.22 8.516 110.422 7.676 110.422 6.402C110.422 5.128 111.22 4.288 112.424 4.288C113.614 4.288 114.398 5.128 114.398 6.402C114.398 7.676 113.614 8.516 112.424 8.516ZM120.419 10.196C122.127 10.196 123.583 9.16 124.045 7.62H122.337C122.015 8.32 121.245 8.796 120.419 8.796C119.327 8.796 118.487 8.068 118.333 6.962H124.073L124.213 6.822V6.5C124.213 4.288 122.701 2.804 120.419 2.804C118.137 2.804 116.625 4.288 116.625 6.5C116.625 8.712 118.137 10.196 120.419 10.196ZM118.445 5.562C118.767 4.694 119.481 4.204 120.419 4.204C121.357 4.204 122.071 4.694 122.393 5.562H118.445ZM128.314 10.196C129.168 10.196 130.106 9.804 130.638 9.23V10H132.318V0.395999H130.638V3.77C130.106 3.196 129.168 2.804 128.314 2.804C126.102 2.804 124.618 4.288 124.618 6.5C124.618 8.712 126.102 10.196 128.314 10.196ZM128.482 8.712C127.166 8.712 126.298 7.83 126.298 6.5C126.298 5.17 127.166 4.288 128.482 4.288C129.77 4.288 130.638 5.17 130.638 6.5C130.638 7.83 129.77 8.712 128.482 8.712ZM136.767 12.604H138.573L142.353 3H140.547L138.825 7.396L137.089 3H135.297L137.971 9.552L136.767 12.604ZM145.936 10.196C147.644 10.196 149.1 9.16 149.562 7.62H147.854C147.532 8.32 146.762 8.796 145.936 8.796C144.844 8.796 144.004 8.068 143.85 6.962H149.59L149.73 6.822V6.5C149.73 4.288 148.218 2.804 145.936 2.804C143.654 2.804 142.142 4.288 142.142 6.5C142.142 8.712 143.654 10.196 145.936 10.196ZM143.962 5.562C144.284 4.694 144.998 4.204 145.936 4.204C146.874 4.204 147.588 4.694 147.91 5.562H143.962ZM153.046 10.196C153.508 10.196 153.984 10.112 154.236 10V8.796H153.018C152.654 8.796 152.402 8.558 152.402 8.208V4.4H154.166V3H152.402V0.395999H150.722V3H149.602V4.4H150.722V8.208C150.722 9.398 151.646 10.196 153.046 10.196ZM154.675 10H156.747V7.928H154.675V10Z" fill="#040921"/>
        </svg>

                                            </div>
                                        @endif
                                        @if($booking_form == 'instant_enquiry' || $booking_form == 'enquiry')

                                        @endif
                                        @if($booking_form == 'instant_enquiry')
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="free-cancellation">
                            <img src="image/Password.png" alt="">
                            <div class="free-cancellation-text">
                                <span>Free cancellation</span>
                                <span>Full refund before Jan 17, 10:00 AM</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section class="options-section">
        <div class="profile-container">
            <div class="product-page-experience">
                <h2>Experience</h2>
                <div class="product-page-experience-wrapper">
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img5.png" alt="">
                        </div>
                        <h3>Umami Asian Fusion Restaurant</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Chinese,</span>
                            <span>Japanese,</span>
                            <span>Sushi,</span>
                            <span>Thai,</span>
                            <span>Asian</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img6.png" alt="">
                        </div>
                        <h3>Andropov’s Ears</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Italian,</span>
                            <span>Pizza,</span>
                            <span>Local,</span>
                            <span>International,</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img7.png" alt="">
                        </div>
                        <h3>Iveria Cafe</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Seafood</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img8.png" alt="">
                        </div>
                        <h3>Iveria Cafe</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>International,</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-page-experience">
                <h2>Experience</h2>
                <div class="product-page-experience-wrapper">
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img5.png" alt="">
                        </div>
                        <h3>Umami Asian Fusion Restaurant</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Chinese,</span>
                            <span>Japanese,</span>
                            <span>Sushi,</span>
                            <span>Thai,</span>
                            <span>Asian</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img6.png" alt="">
                        </div>
                        <h3>Andropov’s Ears</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Italian,</span>
                            <span>Pizza,</span>
                            <span>Local,</span>
                            <span>International,</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img7.png" alt="">
                        </div>
                        <h3>Iveria Cafe</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Seafood</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img8.png" alt="">
                        </div>
                        <h3>Iveria Cafe</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>International,</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="location-section" id="gela">
        <div class="profile-container">
            <div class="product-page-location">
                <h2>Location</h2>
                <div class="product-page-location-map">
                    <img src="image/map.png" alt="">
                </div>
            </div>
            <div class="property-surroundings">
                <h2>Property surroundings</h2>
                <div class="property-surroundings-wrapper">
                    <div class="property-surroundings-block">
                        <div class="property-surroundings-header">
                            <div class="property-surroundings-title">
                                <img src="image/star-icon.png" alt="">
                                <h3>What’s nearby</h3>
                            </div>
                            <button class="see-all-surroundings">See all</button>
                        </div>
                        <div class="property-surroundings-list">
                            <ul>
                                <li>
                                    <h6>Tbilisi Botanical Garden</h6>
                                    <span>5 min by foot</span>
                                </li>
                                <li>
                                    <h6>Mtatsminda Park</h6>
                                    <span>10 min by foot</span>
                                </li>
                                <li>
                                    <h6>Tbilisi Parliament</h6>
                                    <span>15 min by foot</span>
                                </li>
                                <li>
                                    <h6>Red light district</h6>
                                    <span>10 min by car</span>
                                </li>
                                <li>
                                    <h6>Rustaveli theater</h6>
                                    <span>15 min by car</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="property-surroundings-block">
                        <div class="property-surroundings-header">
                            <div class="property-surroundings-title">
                                <img src="image/activity.png" alt="">
                                <h3>Top Attractions</h3>
                            </div>
                            <button class="see-all-surroundings">See all</button>
                        </div>
                        <div class="property-surroundings-list">
                            <ul>
                                <li>
                                    <h6>Bassiani Club</h6>
                                    <span>5 min by foot</span>
                                </li>
                                <li>
                                    <h6>Khidi Club</h6>
                                    <span>10 min by foot</span>
                                </li>
                                <li>
                                    <h6>Cafe Gallery</h6>
                                    <span>15 min by foot</span>
                                </li>
                                <li>
                                    <h6>Ubani Studio</h6>
                                    <span>10 min by car</span>
                                </li>
                                <li>
                                    <h6>Dzala Ertobashia</h6>
                                    <span>15 min by car</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="property-surroundings-block">
                        <div class="property-surroundings-header">
                            <div class="property-surroundings-title">
                                <img src="image/vertalioti.png" alt="">
                                <h3>Closest Airport</h3>
                            </div>
                            <button class="see-all-surroundings">See all</button>
                        </div>
                        <div class="property-surroundings-list">
                            <ul>
                                <li>
                                    <h6>Tbilisi International Airport</h6>
                                    <span>40 min by car</span>
                                </li>
                                <li>
                                    <h6>Mestia Airport</h6>
                                    <span>3hr by car</span>
                                </li>
                                <li>
                                    <h6>Kutaisi Airport</h6>
                                    <span>15 min by foot</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="profile-container">
            <div class="things-to-know">
                <h2>Things to know</h2>
                <div class="things-to-know-wrapper">
                    <div class="things-to-know-list">
                        <h4>Health & Safety</h4>
                        <ul>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Info-circle.png" alt="">
                                </div>
                                <span>Committed to Airbnb's enhanced cleaning process.</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Info-circle.png" alt="">
                                </div>
                                <span>Airbnb's social-distancing and other COVID-19-related guidelines apply</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Info-circle.png" alt="">
                                </div>
                                <span>Carbon monoxide alarm not reported</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Info-circle.png" alt="">
                                </div>
                                <span>Smoke alarm not reported</span>
                            </li>
                        </ul>
                        <a href="">See all</a>
                    </div>
                    <div class="things-to-know-list">
                        <h4>Cancellation policy</h4>
                        <ul>
                            <li>
                                <span>Free cancellation until 4:00 PM on Feb 16</span>
                            </li>
                            <li>
                                <span>After that, cancel before 4:00 PM on Feb 17 and get a full refund, minus the first night and service fee.</span>
                            </li>
                        </ul>
                        <a href="">See all</a>
                    </div>
                    <div class="things-to-know-list">
                        <h4>Health & Safety</h4>
                        <ul>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Info-circle.png" alt="">
                                </div>
                                <span>Check-in: After 4:00 PM</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Users.png" alt="">
                                </div>
                                <span>Checkout: 12:00 AM</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Info-circle.png" alt="">
                                </div>
                                <span>No smoking</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Users.png" alt="">
                                </div>
                                <span>No age restriction</span>
                            </li>
                            <li>
                                <div class="things-to-know-list-icon">
                                    <img src="image/Users.png" alt="">
                                </div>
                                <span>Pets</span>
                            </li>
                        </ul>
                        <a href="">See all</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="profile-container">
            <div class="reviews">
                <div class="reviews-title">
                    <h2>Reviews</h2>
                    <div class="total-review">
                        <span class="review-number">4.9</span>
                        <span class="review-amount">(2,429)</span>
                    </div>
                </div>
                <div class="reviews-wrapper">
                    <div class="review-points">
                        <ul>
                            <li>
                                <a href="@">
                                    <img src="image/Wallet.png" alt="">
                                    Cleanliness
                                </a>
                                <span>5.0</span>
                            </li>
                            <li>
                                <a href="@">
                                    <img src="image/Discovery.png" alt="">
                                    Communication
                                </a>
                                <span>4.4</span>
                            </li>
                            <li>
                                <a href="@">
                                    <img src="image/Scan.png" alt="">
                                    Check-in
                                </a>
                                <span>4.4</span>
                            </li>
                            <li>
                                <a href="@">
                                    <img src="image/Calendar.png" alt="">
                                    Accuracy
                                </a>
                                <span>5.0</span>
                            </li>
                            <li>
                                <a href="@">
                                    <img src="image/Activity.png" alt="">
                                    Location
                                </a>
                                <span>4.7</span>
                            </li>
                            <li>
                                <a href="@">
                                    <img src="image/Discovery.png" alt="">
                                    Value
                                </a>
                                <span>4.7</span>
                            </li>
                        </ul>
                    </div>
                    <div class="review-comments">
                        <div class="comment">
                            <div class="comment-author">
                                <div class="comment-author-image">
                                    <img src="image/sergio.png" alt="">
                                </div>
                                <div class="comment-author-name">
                                    <h5>Jonathan</h5>
                                    <span>June 2020 · Tbilisi, Georgia</span>
                                </div>
                            </div>
                            <div class="comment-text">
                                <p>
                                    The place was very specious and cozy with the amazing
                                    balcony and view on Tbilisi. Had a lovely time there
                                    so highly recommended.
                                </p>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="comment-author">
                                <div class="comment-author-image">
                                    <img src="image/sergio.png" alt="">
                                </div>
                                <div class="comment-author-name">
                                    <h5>Jonathan</h5>
                                    <span>June 2020 · Tbilisi, Georgia</span>
                                </div>
                            </div>
                            <div class="comment-text">
                                <p>
                                    The place was very specious and cozy with the amazing
                                    balcony and view on Tbilisi. Had a lovely time there
                                    so highly recommended.
                                </p>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="comment-author">
                                <div class="comment-author-image">
                                    <img src="image/sergio.png" alt="">
                                </div>
                                <div class="comment-author-name">
                                    <h5>Jonathan</h5>
                                    <span>June 2020 · Tbilisi, Georgia</span>
                                </div>
                            </div>
                            <div class="comment-text">
                                <p>
                                    The place was very specious and cozy with the amazing
                                    balcony and view on Tbilisi. Had a lovely time there
                                    so highly recommended.
                                </p>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="comment-author">
                                <div class="comment-author-image">
                                    <img src="image/sergio.png" alt="">
                                </div>
                                <div class="comment-author-name">
                                    <h5>Jonathan</h5>
                                    <span>June 2020 · Tbilisi, Georgia</span>
                                </div>
                            </div>
                            <div class="comment-text">
                                <p>
                                    The place was very specious and cozy with the amazing
                                    balcony and view on Tbilisi. Had a lovely time there
                                    so highly recommended.
                                </p>
                            </div>
                        </div>
                        <div class="amenities-main-button">
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="profile-container">
            <div class="faq">
                <h2>FAQ</h2>
                <div class="faq-wrapper uk-accordion" uk-accordion="multiple: true">
                    <div class="faq-block">
                        <a class="uk-accordion-title" href="#" aria-expanded="false">When and how do I get my rebate?</a>
                        <div class="uk-accordion-content faq-block-text" hidden="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="faq-block">
                        <a class="uk-accordion-title" href="#">When and how do I get my rebate?</a>
                        <div class="uk-accordion-content faq-block-text" hidden="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="faq-block">
                        <a class="uk-accordion-title" href="#" aria-expanded="false"> When and how do I get my rebate? </a>
                        <div class="uk-accordion-content faq-block-text" hidden="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="faq-block">
                        <a class="uk-accordion-title" href="#"> So I get full service AND a commission rebate sale sadsa.....</a>
                        <div class="uk-accordion-content faq-block-text" hidden="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="faq-block">
                        <a class="uk-accordion-title" href="#" aria-expanded="false">Get full  When and how do I get my rebate or sadsada....</a>
                        <div class="uk-accordion-content faq-block-text" hidden="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="faq-block">
                        <a class="uk-accordion-title" href="#">When and how do I get my rebate?</a>
                        <div class="uk-accordion-content faq-block-text" hidden="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="profile-container">
            <div class="also-like">
                <h2>You might also like</h2>
                <div class="also-like-wrapper">
                    <div class="also-like-block">
                        <div class="also-like-img">
                             <img src="image/hotel-img6.png" alt="">
                        </div>
                        <span class="also-like-location">Hotels in Tbilisi</span>
                        <h3>Stambas Sastumros Saxeli</h3>
                        <div class="also-like-hotel-info">
                            <ul>
                                <li>1 bedroom<span>&#183;</span></li>
                                <li>4 guests<span>&#183;</span></li>
                            </ul>
                            <ul>
                                <li>Pool<span>&#183;</span></li>
                                <li>Kitchen<span>&#183;</span></li>
                                <li>Room<span>&#183;</span></li>
                            </ul>
                        </div>
                        <div class="also-like-hotel-price-info">
                            <div class="also-like-hotel-rating">
                                <img src="image/Star-rating.png" alt="">
                                <span>4.8</span>
                                <span class="room-voice">(23)</span>
                            </div>
                            <div class="also-like-hotel-price">
                                <span>From $45 / night</span>
                            </div>
                        </div>
                    </div>
                    <div class="also-like-block">
                        <div class="also-like-img">
                             <img src="image/hotel-img6.png" alt="">
                        </div>
                        <span class="also-like-location">Hotels in Tbilisi</span>
                        <h3>Stambas Sastumros Saxeli</h3>
                        <div class="also-like-hotel-info">
                            <ul>
                                <li>1 bedroom<span>&#183;</span></li>
                                <li>4 guests<span>&#183;</span></li>
                            </ul>
                            <ul>
                                <li>Pool<span>&#183;</span></li>
                                <li>Kitchen<span>&#183;</span></li>
                                <li>Room<span>&#183;</span></li>
                            </ul>
                        </div>
                        <div class="also-like-hotel-price-info">
                            <div class="also-like-hotel-rating">
                                <img src="image/Star-rating.png" alt="">
                                <span>4.8</span>
                                <span class="room-voice">(23)</span>
                            </div>
                            <div class="also-like-hotel-price">
                                <span>From $45 / night</span>
                            </div>
                        </div>
                    </div>
                    <div class="also-like-block">
                        <div class="also-like-img">
                             <img src="image/hotel-img6.png" alt="">
                        </div>
                        <span class="also-like-location">Hotels in Tbilisi</span>
                        <h3>Stambas Sastumros Saxeli</h3>
                        <div class="also-like-hotel-info">
                            <ul>
                                <li>1 bedroom<span>&#183;</span></li>
                                <li>4 guests<span>&#183;</span></li>
                            </ul>
                            <ul>
                                <li>Pool<span>&#183;</span></li>
                                <li>Kitchen<span>&#183;</span></li>
                                <li>Room<span>&#183;</span></li>
                            </ul>
                        </div>
                        <div class="also-like-hotel-price-info">
                            <div class="also-like-hotel-rating">
                                <img src="image/Star-rating.png" alt="">
                                <span>4.8</span>
                                <span class="room-voice">(23)</span>
                            </div>
                            <div class="also-like-hotel-price">
                                <span>From $45 / night</span>
                            </div>
                        </div>
                    </div>
                    <div class="also-like-block">
                        <div class="also-like-img">
                             <img src="image/hotel-img6.png" alt="">
                        </div>
                        <span class="also-like-location">Hotels in Tbilisi</span>
                        <h3>Stambas Sastumros Saxeli</h3>
                        <div class="also-like-hotel-info">
                            <ul>
                                <li>1 bedroom<span>&#183;</span></li>
                                <li>4 guests<span>&#183;</span></li>
                            </ul>
                            <ul>
                                <li>Pool<span>&#183;</span></li>
                                <li>Kitchen<span>&#183;</span></li>
                                <li>Room<span>&#183;</span></li>
                            </ul>
                        </div>
                        <div class="also-like-hotel-price-info">
                            <div class="also-like-hotel-rating">
                                <img src="image/Star-rating.png" alt="">
                                <span>4.8</span>
                                <span class="room-voice">(23)</span>
                            </div>
                            <div class="also-like-hotel-price">
                                <span>From $45 / night</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="profile-container">
            <div class="product-page-experience">
                <h2>Other products</h2>
                <div class="product-page-experience-wrapper">
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img5.png" alt="">
                        </div>
                        <h3>Umami Asian Fusion Restaurant</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Chinese,</span>
                            <span>Japanese,</span>
                            <span>Sushi,</span>
                            <span>Thai,</span>
                            <span>Asian</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img6.png" alt="">
                        </div>
                        <h3>Andropov’s Ears</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Italian,</span>
                            <span>Pizza,</span>
                            <span>Local,</span>
                            <span>International,</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img7.png" alt="">
                        </div>
                        <h3>Iveria Cafe</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>Seafood</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                    <div class="product-page-experience-block">
                        <div class="experience-image">
                            <img src="image/hotel-img8.png" alt="">
                        </div>
                        <h3>Iveria Cafe</h3>
                        <div class="cuisine">
                            <h5>Cuisine:</h5>
                            <span>International,</span>
                        </div>
                        <div class="menu">
                            <h5>Menu:</h5>
                            <span>A la carte</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="homepage-footer">
        <div class="profile-container">
            <div class="footer-content">
                <div class="footer-inspiration">
                    <img src="image/hair-dryer.png" alt="hair dryer" class="hair-dryer-icon">
                    <img src="image/washing-machine.png" alt="washing machine" class="washing-machine">
                    <div class="footer-box">
                            <img src="image/footer-logo.png" alt="vayvay logo">
                            <h2>All the benefits are<br>
                                at your hand </h2>
                            <p>Register your profile and get additional permitions and etc.</p>
                            <div class="footer-signup"><a href="#">Create your account</a></div>
                    </div>
                </div>
                <div class="footer-nav-box">
                    <div class="footer-nav">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="">Homes</a></li>
                            <li><a href="">Apartments</a></li>
                            <li><a href="">Cottages</a></li>
                            <li><a href="">Villas</a></li>
                            <li><a href="">Tickets</a></li>
                            <li><a href="">Car hire</a></li>
                            <li><a href="">Local dining</a></li>
                            <li><a href="">Tours</a></li>
                            <li><a href="">Sightseeings</a></li>
                            <li><a href="">Hiking</a></li>
                            <li><a href="">Experiences</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav">
                        <h3>Additional</h3>
                        <ul>
                            <li><a href="">Reviews</a></li>
                            <li><a href="">Blogs</a></li>
                            <li><a href="">Ad placement</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Forum</a></li>
                            <li><a href="">Covid-19</a></li>
                            <li><a href="">Sustainability</a></li>
                            <li><a href="">Static pages</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav">
                        <h3>About</h3>
                        <ul>
                            <li><a href="">How VeyVey works</a></li>
                            <li><a href="">Partner Help</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                        </ul>
                        <h3>Social media</h3>
                        <ul>
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Instagram</a></li>
                            <li><a href="">Youtube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-police">
                <div class="copyright">
                    <span>2020 VeyVey Inc. All Rights Reserved</span>
                </div>
                <div class="private-police">
                    <span>Privacy and policy</span>
                    <span>Terms and conditions</span>
                </div>
                <div class="secure-paiment">
                    <img src="image/Lock2.png" alt="lock" width="15.23" height="18.5">
                    <span>Secure payment:</span>
                    <img src="image/visa.png" alt="visa">
                    <img src="image//mastercard.png" alt="mastercard">
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit-icons.min.js"></script>
<script src="http://test.gtrun.ge/home/js/product-main.js"></script>



















@include('frontend.components.footer')
