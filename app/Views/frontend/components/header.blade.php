<?php do_action('init'); ?>
<?php do_action('frontend_init'); ?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/css/uikit.min.css" />
	<link rel="stylesheet" href="http://192.168.100.9/veyvey/public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit-icons.min.js"></script>
    <title>{{ page_title() }}</title>

    <?php
    $hh_params = [
        'timezone' => e(config('app.timezone')),
        'mapbox_token' => e(get_option('mapbox_key')),
        'currency' => current_currency(),
        'add_media_url' => e(dashboard_url('add-media')),
        'facebook_login' => e(get_option('facebook_login', 'off')),
        'facebook_api' => e(get_option('facebook_api')),
        'use_google_captcha' => e(get_option('use_google_captcha', 'off')),
        'google_captcha_key' => e(get_option('google_captcha_site_key')),
        'media_upload_permission' => get_media_upload_permission(),
        'media_upload_size' => get_media_upload_size(),
        'media_upload_message' => get_media_upload_message(),
        'enable_gdpr' => e(get_option('enable_gdpr', 'off')),
        'gdpr_page' => e(get_the_permalink(get_option('gdpr_page', ''), '', 'page')),
        'gdpr_lang' => [
            'description' => __('We use cookies to offer you a better browsing experience, personalise content and ads, to provide social media features and to analyse our traffic. Read about how we use cookies and how you can control them by clicking Cookie Settings. You consent to our cookies if you continue to use this website.'),
            'settings' => __('Cookie settings'),
            'accept' => __('Accept cookies'),
            'statement' => __('Our cookie statement'),
            'save' => __('Save settings'),
            'always_on' => __('Always on'),
            'cookie_essential_title' => __('Essential website cookies'),
            'cookie_essential_desc' => __('Necessary cookies help make a website usable by enabling basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.'),
            'cookie_performance_title' => __('Performance cookies'),
            'cookie_performance_desc' => __('These cookies are used to enhance the performance and functionality of our websites but are non-essential to their use. For example it stores your preferred language or the region that you are in.'),
            'cookie_analytics_title' => __('Analytics cookies'),
            'cookie_analytics_desc' => __('We use analytics cookies to help us measure how users interact with website content, which helps us customize our websites and application for you in order to enhance your experience.'),
            'cookie_marketing_title' => __('Marketing cookies'),
            'cookie_marketing_desc' => __('These cookies are used to make advertising messages more relevant to you and your interests. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third party advertisers.')
        ],
        'lazy_load' => get_option('enable_lazyload', 'off')
    ];
    ?>
    <script>
        var hh_params = <?php echo json_encode($hh_params); ?>
    </script>
    <?php do_action('header'); ?>
    <?php do_action('init_header'); ?>
    <?php do_action('init_frontend_header'); ?>
    @php
        $body_class = isset($bodyClass)? $bodyClass: '';
        if(is_user_logged_in() && (is_admin() || is_partner())){
            $body_class .= ' has-admin-bar';
        }
    @endphp
</head>
<body class="veyvey-main {{ $body_class }}">
<?php do_action('after_body_frontend'); ?>
<nav id="mobile-navigation" class="main-navigation mobile-natigation d-lg-none"
     aria-label="{{__('Top Menu')}}">
    <div class="menu-primary-container">
        <?php
        if (has_nav_primary()) {
            get_nav([
                'location' => 'primary',
                'walker' => 'main-mobile'
            ]);
        }
        ?>
    </div>
</nav><!-- #site-navigation -->
@include('common.loading', ['class' => 'page-loading'])
@if(!is_user_logged_in())
    <div id="hh-login-modal" class="modal fade modal-no-footer" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">{{__('Login')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <form id="hh-login-form" class="form form-sm form-action" action="{{ url('auth/login') }}"
                          data-reload-time="1500"
                          method="post">
                        @include('common.loading')
                        <div class="form-group mb-3">
                            <label for="email-login-form">{{__('Email address')}}</label>
                            <input class="form-control has-validation" data-validation="required" type="text"
                                   id="email-login-form" name="email" placeholder="{{__('Enter your email')}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password-login-form">{{__('Password')}}</label>
                            <input class="form-control has-validation" data-validation="required|min:6:ms"
                                   type="password" id="password-login-form" name="password"
                                   placeholder="{{__('Enter your password')}}">
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin-login-form"
                                       checked>
                                <label class="custom-control-label"
                                       for="checkbox-signin-login-form">{{__('Remember me')}}</label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            {!! referer_field(false) !!}
                            <button class="btn btn-primary btn-block text-uppercase"
                                    type="submit"> {{__('Log In')}}</button>
                        </div>
                        <div class="form-message"></div>
                        @if(has_social_login())
                            <div class="text-center">
                                <p class="mt-3 text-muted">{{__('Log in with')}}</p>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    @if(social_enable('facebook'))
                                        <li class="list-inline-item">
                                            <a href="{{ FacebookLogin::get_inst()->getLoginUrl() }}"
                                               class="social-list-item border-primary text-primary"><i
                                                        class="mdi mdi-facebook"></i></a>
                                        </li>
                                    @endif
                                    @if(social_enable('google'))
                                        <li class="list-inline-item">
                                            <a href="{{ GoogleLogin::get_inst()->getLoginUrl() }}"
                                               class="social-list-item border-danger text-danger"><i
                                                        class="mdi mdi-google"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <div class="mt-3 d-sm-flex align-items-center justify-content-between">
                            <p>{{__('Don\'t have an account?')}}
                                <a href="javascript: void(0)" data-toggle="modal" data-target="#hh-register-modal"
                                   class="font-weight-bold">{{__('Sign Up')}}</a>
                            </p>
                            <p>
                                <a href="javascript: void(0)" data-toggle="modal" data-target="#hh-fogot-password-modal"
                                   class="font-weight-bold">{{__('Reset Password')}}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    <div id="hh-register-modal" class="modal fade modal-no-footer" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">{{__('Sign Up')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <form id="hh-sign-up-form" action="{{ url('auth/sign-up') }}" method="post" data-reload-time="1500"
                          class="form form-action">
                        @include('common.loading')
                        <div class="form-group">
                            <label for="first-name-reg-form">{{__('First Name')}}</label>
                            <input class="form-control" type="text" id="first-name-reg-form" name="first_name"
                                   placeholder="{{__('First Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="last-name-reg-form">{{__('Last Name')}}</label>
                            <input class="form-control" type="text" id="last-name-reg-form" name="last_name"
                                   placeholder="{{__('Last Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email-address-reg-form">{{__('Email address')}}</label>
                            <input class="form-control has-validation" data-validation="required|email" type="email"
                                   id="email-address-reg-form" name="email" placeholder="{{__('Email')}}">
                        </div>
                        <div class="form-group">
                            <label for="password-reg-form">{{__('Password')}}</label>
                            <input class="form-control has-validation" data-validation="required|min:6:ms"
                                   name="password" type="password" id="password-reg-form"
                                   placeholder="{{__('Password')}}">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-success">
                                <input type="checkbox" id="reg-term-condition" name="term_condition" value="1">
                                <label for="reg-term-condition">
                                    {!! sprintf(__('I accept %s'), '<a class="c-pink" href="" class="text-dark">'. __('Terms and Conditions') .'</a>') !!}
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block text-uppercase"
                                    type="submit"> {{__('Sign Up')}}</button>
                        </div>
                        <div class="form-message"></div>
                        <div class="mt-3 d-sm-flex align-items-center justify-content-between">
                            <p>{{__('Have an account?')}}
                                <a href="javascript: void(0)" data-toggle="modal" data-target="#hh-login-modal"
                                   class="font-weight-bold">{{__('Log In')}}</a>
                            </p>
                        </div>
                    </form>

                    @if(has_social_login())
                        <div class="text-center">
                            <h5 class="mt-3 text-muted">{{__('Sign up using')}}</h5>
                            <ul class="social-list list-inline mt-3 mb-0">
                                @if(social_enable('facebook'))
                                    <li class="list-inline-item">
                                        <a href="{{ FacebookLogin::get_inst()->getLoginUrl() }}"
                                           class="social-list-item border-primary text-primary"><i
                                                    class="mdi mdi-facebook"></i></a>
                                    </li>
                                @endif
                                @if(social_enable('google'))
                                    <li class="list-inline-item">
                                        <a href="{{ GoogleLogin::get_inst()->getLoginUrl() }}"
                                           class="social-list-item border-danger text-danger"><i
                                                    class="mdi mdi-google"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    <div id="hh-fogot-password-modal" class="modal fade modal-no-footer" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">{{__('Reset Password')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <form id="hh-reset-password-form" action="{{ url('auth/reset-password') }}" method="post"
                          data-reload-time="1500"
                          class="form form-action">
                        @include('common.loading')
                        <div class="form-group">
                            <label for="email-address-reset-pass-form">{{__('Email address')}}</label>
                            <input class="form-control has-validation" data-validation="required|email" type="email"
                                   id="email-address-reset-pass-form" name="email" placeholder="{{__('Email')}}">
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block text-uppercase"
                                    type="submit"> {{__('Reset Password')}}</button>
                        </div>
                        <div class="form-message"></div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
@endif
<?php
$langs = get_languages(true);
$currencies = list_currencies();
$current_lang = get_current_language();
?>
<div id="hh-modal-global" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header no-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @if(count($langs))
                    <h4 class="title mt-0">{{__('Select Language')}}</h4>
                    <ul class="list-unstyled list-languages row mt-3">
                        @foreach($langs as $key => $lang)
                            @if($current_lang == $lang['code'])
                                <li class="col-6 col-md-4 mb-3 item current">
                                    <a href="javascript: void(0)">{{__($lang['name'])}}</a>
                                </li>
                            @else
                                <li class="col-6 col-md-4 mb-3 item">
                                    <a href="{{add_query_arg('lang', $lang['code'], current_url())}}">{{$lang['name']}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
                @if(count($currencies))
                    <h4 class="title mt-0">{{__('Select Currency')}}</h4>
                    <ul class="list-unstyled list-currencies row mt-3">
                        @foreach($currencies as $key => $currency)
                            @if($currency['unit'] == current_currency('unit'))
                                <li class="col-6 col-md-4 mb-3 item current">
                                    <a href="javascript: void(0)">
                                        <span class="symbol">{{$currency['unit']}} - {{$currency['symbol']}}</span>
                                        <span class="name">{{get_translate($currency['name'])}}</span></a>
                                </li>
                            @else
                                <li class="col-6 col-md-4 mb-3 item">
                                    <a href="{{add_query_arg('currency', $currency['unit'], current_url())}}">
                                        <span class="symbol">{{$currency['unit']}} - {{$currency['symbol']}}</span>
                                        <span class="name">{{get_translate($currency['name'])}}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="body-wrapper">
    <?php
    $sticky = get_option('enable_sticky', 'off');
    $classSticky = '';
    if ($sticky == 'on') {
        enqueue_script('sticky-js');
        $classSticky = 'has-sticky';
    }
    ?>



    <section class="header-section">
        <header style="border:none;" id="header" class="header {{$classSticky}}">
            <div class="container">
                <div class="top-header">
                    <div class="logo">
                        <img src="http://test.gtrun.ge/home/images/logo.png" alt="logo">
                        <img src="http://test.gtrun.ge/home/images/logo1.png" alt="logo">
                    </div>
                    <nav class="top-header-nav">
                        <ul class="top-nav-menu">
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">About</a></li>
                        </ul>
                        <div class="currency">
                            <div class="currency-usa">
                                <img src="http://test.gtrun.ge/home/images/icons/currency-usa.png" alt="usa flag icon">
                                <img src="http://test.gtrun.ge/home/images/icons/dolar-sign.png" alt="dolar-sign" uk-svg>
                                <img src="http://test.gtrun.ge/home/images/icons/arrow-down.png" alt="arrow-down" uk-svg>
                            </div>
                        </div>
                        <ul class="top-nav-input">
                            @if (is_user_logged_in())
                            @php
                                $noti = Notifications::get_inst()->getLatestNotificationByUser(get_current_user_id(), 'to');
                                $user_id = get_current_user_id();
                                $args = [
                                    'user_id' => $user_id,
                                    'user_encrypt' => hh_encrypt($user_id)
                                ];
                                $userData = get_current_user_data();
                            @endphp
                            <li>
                              <form class="" action="http://192.168.100.9/dashboard2/Home/index" method="post">
                                <div class="make-listing">
                                  <input type="hidden" name="userId" value="<?php echo $user_id ?>">
                                    <button type="submit" href="http://192.168.100.9/dashboard2/Home/index">
                                        <img src="http://test.gtrun.ge/home/images/icons/make-a-listing.png" alt="make-a-listing">
                                        Make a listing
                                    </button>
                                </div>
                              </form>

                            </li>
                            <li>

                                <div class="join">
                                    <a href="{{ dashboard_url('profile') }}" class="nav-item">
                                        <img src="http://test.gtrun.ge/home/images/icons/Profile.png" alt="">
                                        Profile
                                    </a>
                                </div>
                            </li>
                            @else
                            <li>
                                <div class="make-listing">
                                  <a href="javascript: void(0);" class="nav-item "
                                     data-toggle="modal"
                                     data-target="#hh-login-modal">
                                        <img src="http://test.gtrun.ge/home/images/icons/make-a-listing.png" alt="make-a-listing">
                                        Make a listing
                                    </a>
                                </div>
                            </li>
                            <li>

                                <div class="join">
                                    <a href="javascript: void(0);" class="nav-item "
                                       data-toggle="modal"
                                       data-target="#hh-login-modal">
                                        <img src="http://test.gtrun.ge/home/images/icons/Profile.png" alt="">
                                        Join
                                    </a>
                                </div>
                            </li>
                            @endif
                        </ul>
                        <div class="top-header-mobile-menu" uk-toggle="target: #header-canvas">
                            <img src="http://192.168.100.9/veyvey/public/images/svg/burger-menu.svg" alt="">
                        </div>
                        <div id="header-canvas" uk-offcanvas="flip: true; overlay: true">
                                <div class="uk-offcanvas-bar categories-canvas">
                                    <button class="uk-offcanvas-close">
                                        <img src="http://192.168.100.9/veyvey/public/images/icons/canvas-close.png" alt="close icon x">
                                    </button>
                                    <h2>Categories</h2>
                                    <nav class="categories-navigation">
                                        <ul>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/hotel-bed.png" alt="hotel icon">
                                                    Hotels
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/appartments-icon.png" alt="appartments icon">
                                                    Appartments
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/target.png" alt="target icon">
                                                    Experiences
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/car-icon.png" alt="hotel icon">
                                                    Cars
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/restaurant-icon.png" alt="restaurant icon">
                                                    Restaurants
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/map-icon.png" alt="map icon">
                                                    Trails
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/calendar-icon.png" alt="calendar icon">
                                                    Events
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <img src="http://192.168.100.9/veyvey/public/images/icons/train-icon.png" alt="train icon">
                                                    Railways
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="navigation-common">
                                        <a href="">Create your account</a>
                                        <a href="">Become host</a>
                                        <a href="">Contact us</a>
                                    </div>
                                </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="main-nav">
                <div class="main-nav-menu">
                    <div class="main-title">
                        <h1>A better way to stay</h1>
                        <h3>Find deals on hotels, homes and more...</h3>
                    </div>
                    <nav>
                        <ul>
                            <li class="drop-down active">
                                <a href="">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 8.5C6.59334 8.5 7.17336 8.32405 7.66671 7.99441C8.16006 7.66476 8.54458 7.19623 8.77164 6.64805C8.9987 6.09987 9.05811 5.49667 8.94236 4.91473C8.8266 4.33279 8.54088 3.79824 8.12132 3.37868C7.70176 2.95912 7.16721 2.6734 6.58527 2.55764C6.00333 2.44189 5.40013 2.5013 4.85195 2.72836C4.30377 2.95542 3.83524 3.33994 3.50559 3.83329C3.17595 4.32664 3 4.90666 3 5.5C3 6.29565 3.31607 7.05871 3.87868 7.62132C4.44129 8.18393 5.20435 8.5 6 8.5ZM6 4.5C6.19778 4.5 6.39112 4.55865 6.55557 4.66853C6.72002 4.77841 6.84819 4.93459 6.92388 5.11732C6.99957 5.30004 7.01937 5.50111 6.98079 5.69509C6.9422 5.88907 6.84696 6.06725 6.70711 6.20711C6.56725 6.34696 6.38907 6.4422 6.19509 6.48079C6.00111 6.51937 5.80004 6.49957 5.61732 6.42388C5.43459 6.34819 5.27841 6.22002 5.16853 6.05557C5.05865 5.89112 5 5.69778 5 5.5C5 5.23478 5.10536 4.98043 5.29289 4.79289C5.48043 4.60536 5.73478 4.5 6 4.5ZM19 2.5H11C10.7348 2.5 10.4804 2.60536 10.2929 2.79289C10.1054 2.98043 10 3.23478 10 3.5V9.5H2V1.5C2 1.23478 1.89464 0.98043 1.70711 0.792893C1.51957 0.605357 1.26522 0.5 1 0.5C0.734784 0.5 0.48043 0.605357 0.292893 0.792893C0.105357 0.98043 0 1.23478 0 1.5V14.5C0 14.7652 0.105357 15.0196 0.292893 15.2071C0.48043 15.3946 0.734784 15.5 1 15.5C1.26522 15.5 1.51957 15.3946 1.70711 15.2071C1.89464 15.0196 2 14.7652 2 14.5V11.5H20V14.5C20 14.7652 20.1054 15.0196 20.2929 15.2071C20.4804 15.3946 20.7348 15.5 21 15.5C21.2652 15.5 21.5196 15.3946 21.7071 15.2071C21.8946 15.0196 22 14.7652 22 14.5V5.5C22 4.70435 21.6839 3.94129 21.1213 3.37868C20.5587 2.81607 19.7956 2.5 19 2.5ZM20 9.5H12V4.5H19C19.2652 4.5 19.5196 4.60536 19.7071 4.79289C19.8946 4.98043 20 5.23478 20 5.5V9.5Z" fill="white"/>
                                    </svg>
                                    Hotels
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M12 6H13C13.2652 6 13.5196 5.89464 13.7071 5.70711C13.8946 5.51957 14 5.26522 14 5C14 4.73478 13.8946 4.48043 13.7071 4.29289C13.5196 4.10536 13.2652 4 13 4H12C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5C11 5.26522 11.1054 5.51957 11.2929 5.70711C11.4804 5.89464 11.7348 6 12 6ZM12 10H13C13.2652 10 13.5196 9.89464 13.7071 9.70711C13.8946 9.51957 14 9.26522 14 9C14 8.73478 13.8946 8.48043 13.7071 8.29289C13.5196 8.10536 13.2652 8 13 8H12C11.7348 8 11.4804 8.10536 11.2929 8.29289C11.1054 8.48043 11 8.73478 11 9C11 9.26522 11.1054 9.51957 11.2929 9.70711C11.4804 9.89464 11.7348 10 12 10ZM7 6H8C8.26522 6 8.51957 5.89464 8.70711 5.70711C8.89464 5.51957 9 5.26522 9 5C9 4.73478 8.89464 4.48043 8.70711 4.29289C8.51957 4.10536 8.26522 4 8 4H7C6.73478 4 6.48043 4.10536 6.29289 4.29289C6.10536 4.48043 6 4.73478 6 5C6 5.26522 6.10536 5.51957 6.29289 5.70711C6.48043 5.89464 6.73478 6 7 6ZM7 10H8C8.26522 10 8.51957 9.89464 8.70711 9.70711C8.89464 9.51957 9 9.26522 9 9C9 8.73478 8.89464 8.48043 8.70711 8.29289C8.51957 8.10536 8.26522 8 8 8H7C6.73478 8 6.48043 8.10536 6.29289 8.29289C6.10536 8.48043 6 8.73478 6 9C6 9.26522 6.10536 9.51957 6.29289 9.70711C6.48043 9.89464 6.73478 10 7 10ZM19 18H18V1C18 0.734784 17.8946 0.48043 17.7071 0.292893C17.5196 0.105357 17.2652 0 17 0H3C2.73478 0 2.48043 0.105357 2.29289 0.292893C2.10536 0.48043 2 0.734784 2 1V18H1C0.734784 18 0.48043 18.1054 0.292893 18.2929C0.105357 18.4804 0 18.7348 0 19C0 19.2652 0.105357 19.5196 0.292893 19.7071C0.48043 19.8946 0.734784 20 1 20H19C19.2652 20 19.5196 19.8946 19.7071 19.7071C19.8946 19.5196 20 19.2652 20 19C20 18.7348 19.8946 18.4804 19.7071 18.2929C19.5196 18.1054 19.2652 18 19 18ZM11 18H9V14H11V18ZM16 18H13V13C13 12.7348 12.8946 12.4804 12.7071 12.2929C12.5196 12.1054 12.2652 12 12 12H8C7.73478 12 7.48043 12.1054 7.29289 12.2929C7.10536 12.4804 7 12.7348 7 13V18H4V2H16V18Z" fill="#040921"/>
                                    </svg>
                                    Appartments
                                </a>
                            </li>
                            <li>
                                <a href="">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.3">
                                        <path d="M12 12L21 3" fill="#040921" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.1829 8.81799C14.474 8.10949 13.5488 7.658 12.5541 7.53515C11.5594 7.4123 10.5522 7.62512 9.69219 8.13986C8.83222 8.65459 8.16876 9.44176 7.80707 10.3765C7.44538 11.3112 7.40617 12.3399 7.69567 13.2994C7.98517 14.259 8.58679 15.0943 9.40509 15.673C10.2234 16.2517 11.2115 16.5406 12.2127 16.4938C13.2138 16.447 14.1707 16.0673 14.9314 15.4148C15.6922 14.7623 16.2133 13.8744 16.4121 12.8921" fill="#040921" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.3634 5.63618C16.7938 4.06893 14.7004 3.13701 12.4855 3.01948C10.2705 2.90195 8.09024 3.60711 6.36362 4.99946C4.63699 6.3918 3.48581 8.37311 3.13127 10.5627C2.77674 12.7522 3.24387 14.9956 4.4429 16.8617C5.64192 18.7277 7.48826 20.0849 9.62714 20.6723C11.766 21.2598 14.0465 21.0361 16.0305 20.0442C18.0144 19.0523 19.5619 17.3623 20.3755 15.2988C21.189 13.2353 21.2113 10.944 20.4381 8.86502" fill="#040921" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                </svg>

                                    Experiences
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 5.50001H16.68L15.43 2.38001C15.2068 1.82527 14.8228 1.3499 14.3275 1.01492C13.8321 0.679935 13.248 0.500629 12.65 0.500012H6.65C5.95529 0.498024 5.28142 0.737203 4.74342 1.17673C4.20541 1.61625 3.83662 2.22886 3.7 2.91001L3.18 5.50001H3C2.20435 5.50001 1.44129 5.81608 0.87868 6.37869C0.316071 6.9413 0 7.70436 0 8.50001V11.5C0 11.7652 0.105357 12.0196 0.292893 12.2071C0.48043 12.3947 0.734784 12.5 1 12.5H2C2 13.2957 2.31607 14.0587 2.87868 14.6213C3.44129 15.1839 4.20435 15.5 5 15.5C5.79565 15.5 6.55871 15.1839 7.12132 14.6213C7.68393 14.0587 8 13.2957 8 12.5H12C12 13.2957 12.3161 14.0587 12.8787 14.6213C13.4413 15.1839 14.2044 15.5 15 15.5C15.7956 15.5 16.5587 15.1839 17.1213 14.6213C17.6839 14.0587 18 13.2957 18 12.5H19C19.2652 12.5 19.5196 12.3947 19.7071 12.2071C19.8946 12.0196 20 11.7652 20 11.5V8.50001C20 7.70436 19.6839 6.9413 19.1213 6.37869C18.5587 5.81608 17.7956 5.50001 17 5.50001ZM11 2.50001H12.65C12.8486 2.50181 13.0421 2.56269 13.206 2.67488C13.3698 2.78708 13.4965 2.94552 13.57 3.13001L14.52 5.50001H11V2.50001ZM5.66 3.30001C5.70675 3.07074 5.83242 2.86511 6.01514 2.71894C6.19786 2.57277 6.42605 2.49529 6.66 2.50001H9V5.50001H5.22L5.66 3.30001ZM5 13.5C4.80222 13.5 4.60888 13.4414 4.44443 13.3315C4.27998 13.2216 4.15181 13.0654 4.07612 12.8827C4.00043 12.7 3.98063 12.4989 4.01921 12.3049C4.0578 12.1109 4.15304 11.9328 4.29289 11.7929C4.43275 11.6531 4.61093 11.5578 4.80491 11.5192C4.99889 11.4806 5.19996 11.5004 5.38268 11.5761C5.56541 11.6518 5.72159 11.78 5.83147 11.9444C5.94135 12.1089 6 12.3022 6 12.5C6 12.7652 5.89464 13.0196 5.70711 13.2071C5.51957 13.3947 5.26522 13.5 5 13.5ZM15 13.5C14.8022 13.5 14.6089 13.4414 14.4444 13.3315C14.28 13.2216 14.1518 13.0654 14.0761 12.8827C14.0004 12.7 13.9806 12.4989 14.0192 12.3049C14.0578 12.1109 14.153 11.9328 14.2929 11.7929C14.4327 11.6531 14.6109 11.5578 14.8049 11.5192C14.9989 11.4806 15.2 11.5004 15.3827 11.5761C15.5654 11.6518 15.7216 11.78 15.8315 11.9444C15.9414 12.1089 16 12.3022 16 12.5C16 12.7652 15.8946 13.0196 15.7071 13.2071C15.5196 13.3947 15.2652 13.5 15 13.5ZM18 10.5H17.22C16.9388 10.1907 16.5961 9.94348 16.2138 9.77434C15.8315 9.6052 15.418 9.51783 15 9.51783C14.582 9.51783 14.1685 9.6052 13.7862 9.77434C13.4039 9.94348 13.0612 10.1907 12.78 10.5H7.22C6.93882 10.1907 6.59609 9.94348 6.21378 9.77434C5.83148 9.6052 5.41805 9.51783 5 9.51783C4.58195 9.51783 4.16852 9.6052 3.78622 9.77434C3.40391 9.94348 3.06118 10.1907 2.78 10.5H2V8.50001C2 8.2348 2.10536 7.98044 2.29289 7.79291C2.48043 7.60537 2.73478 7.50001 3 7.50001H17C17.2652 7.50001 17.5196 7.60537 17.7071 7.79291C17.8946 7.98044 18 8.2348 18 8.50001V10.5Z" fill="#B2B3BA"/>
                                    </svg>
                                    Cars
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.8405 11.6299C17.241 11.6349 17.6385 11.5596 18.0095 11.4084C18.3805 11.2573 18.7174 11.0334 19.0005 10.7499L21.8305 7.91991C22.0167 7.73255 22.1213 7.4791 22.1213 7.21491C22.1213 6.95073 22.0167 6.69728 21.8305 6.50991C21.7375 6.41618 21.6269 6.34179 21.5051 6.29102C21.3832 6.24025 21.2525 6.21411 21.1205 6.21411C20.9885 6.21411 20.8578 6.24025 20.7359 6.29102C20.614 6.34179 20.5034 6.41618 20.4105 6.50991L17.5505 9.32991C17.4575 9.42364 17.3469 9.49803 17.2251 9.5488C17.1032 9.59957 16.9725 9.62571 16.8405 9.62571C16.7085 9.62571 16.5778 9.59957 16.4559 9.5488C16.334 9.49803 16.2234 9.42364 16.1305 9.32991L19.6705 5.79991C19.7637 5.70667 19.8377 5.59598 19.8881 5.47416C19.9386 5.35234 19.9646 5.22177 19.9646 5.08991C19.9646 4.95805 19.9386 4.82749 19.8881 4.70566C19.8377 4.58384 19.7637 4.47315 19.6705 4.37991C19.5772 4.28667 19.4665 4.21271 19.3447 4.16225C19.2229 4.11179 19.0923 4.08582 18.9605 4.08582C18.8286 4.08582 18.698 4.11179 18.5762 4.16225C18.4544 4.21271 18.3437 4.28667 18.2505 4.37991L14.7205 7.91991C14.5342 7.73255 14.4297 7.4791 14.4297 7.21491C14.4297 6.95073 14.5342 6.69728 14.7205 6.50991L17.5505 3.67991C17.6437 3.58667 17.7177 3.47598 17.7681 3.35416C17.8186 3.23234 17.8446 3.10177 17.8446 2.96991C17.8446 2.83805 17.8186 2.70748 17.7681 2.58566C17.7177 2.46384 17.6437 2.35315 17.5505 2.25991C17.4572 2.16667 17.3465 2.09271 17.2247 2.04225C17.1029 1.99179 16.9723 1.96582 16.8405 1.96582C16.7086 1.96582 16.578 1.99179 16.4562 2.04225C16.3344 2.09271 16.2237 2.16667 16.1305 2.25991L13.3005 5.08991C12.7387 5.65241 12.4231 6.41491 12.4231 7.20991C12.4231 8.00491 12.7387 8.76741 13.3005 9.32991L12.0005 10.6199L3.73048 2.31991L3.63048 2.25991C3.57936 2.21531 3.52211 2.17827 3.46048 2.14991L3.28048 2.07991L3.16048 1.99991H3.09048H2.89048C2.83085 1.99038 2.7701 1.99038 2.71048 1.99991C2.64994 2.02195 2.59273 2.05223 2.54048 2.08991L2.38048 2.18991H2.31048L2.25048 2.28991C2.20815 2.34271 2.1713 2.39967 2.14048 2.45991C2.11119 2.52089 2.08775 2.58451 2.07048 2.64991C2.07048 2.64991 2.07048 2.71991 2.07048 2.75991C1.82781 4.45132 1.98253 6.17601 2.52235 7.79723C3.06218 9.41844 3.97227 10.8916 5.18048 12.0999L7.82048 14.7299L2.41048 20.1299C2.31675 20.2229 2.24235 20.3335 2.19158 20.4553C2.14082 20.5772 2.11468 20.7079 2.11468 20.8399C2.11468 20.9719 2.14082 21.1026 2.19158 21.2245C2.24235 21.3463 2.31675 21.4569 2.41048 21.5499C2.50392 21.6426 2.61473 21.7159 2.73657 21.7657C2.85841 21.8154 2.98887 21.8407 3.12048 21.8399C3.25208 21.8407 3.38254 21.8154 3.50438 21.7657C3.62622 21.7159 3.73704 21.6426 3.83048 21.5499L9.90048 15.5699L12.7305 12.7399L14.7305 10.7399C15.2885 11.3039 16.0471 11.6239 16.8405 11.6299ZM9.19048 13.4499L6.56048 10.8099C5.11893 9.34865 4.21632 7.44118 4.00048 5.39991L10.6105 11.9999L9.19048 13.4499ZM15.4305 14.0199C15.2422 13.8303 14.9863 13.7232 14.719 13.7223C14.4518 13.7213 14.1951 13.8266 14.0055 14.0149C13.8158 14.2032 13.7088 14.4591 13.7078 14.7264C13.7069 14.9936 13.8122 15.2503 14.0005 15.4399L20.3005 21.7399C20.4915 21.9137 20.7423 22.0069 21.0005 21.9999C21.1321 22.0007 21.2625 21.9754 21.3844 21.9257C21.5062 21.8759 21.617 21.8026 21.7105 21.7099C21.8042 21.6169 21.8786 21.5063 21.9294 21.3845C21.9801 21.2626 22.0063 21.1319 22.0063 20.9999C22.0063 20.8679 21.9801 20.7372 21.9294 20.6153C21.8786 20.4935 21.8042 20.3829 21.7105 20.2899L15.4305 14.0199Z" fill="#B2B3BA"/>
                                    </svg>
                                    Restaurants
                                </a>
                            </li>
                            <li>
                                <a href="">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.32 5.05006L15.32 3.05005H15.25C15.2035 3.04538 15.1566 3.04538 15.11 3.05005H14.88H14.75H14.68L9 5.00005L3.32 3.05005C3.16962 3.00047 3.00961 2.9873 2.85314 3.01164C2.69667 3.03598 2.54822 3.09713 2.42 3.19005C2.29076 3.28207 2.18527 3.40352 2.11224 3.54436C2.03921 3.68521 2.00074 3.8414 2 4.00005V18.0001C1.99946 18.2097 2.06482 18.4142 2.18685 18.5847C2.30887 18.7552 2.48138 18.883 2.68 18.9501L8.68 20.9501C8.88145 21.0157 9.09856 21.0157 9.3 20.9501L15 19.0501L20.68 21.0001C20.7862 21.0145 20.8938 21.0145 21 21.0001C21.2091 21.003 21.4132 20.9361 21.58 20.8101C21.7092 20.718 21.8147 20.5966 21.8878 20.4557C21.9608 20.3149 21.9993 20.1587 22 20.0001V6.00005C22.0005 5.79041 21.9352 5.5859 21.8132 5.41543C21.6911 5.24495 21.5186 5.11714 21.32 5.05006ZM8 18.6101L4 17.2801V5.39005L8 6.72005V18.6101ZM14 17.2801L10 18.6101V6.72005L14 5.39005V17.2801ZM20 18.6101L16 17.2801V5.39005L20 6.72005V18.6101Z" fill="#B2B3BA"/>
                                </svg>
                                    Trails
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 19C12.1978 19 12.3911 18.9414 12.5556 18.8315C12.72 18.7216 12.8482 18.5654 12.9239 18.3827C12.9996 18.2 13.0194 17.9989 12.9808 17.8049C12.9422 17.6109 12.847 17.4327 12.7071 17.2929C12.5673 17.153 12.3891 17.0578 12.1951 17.0192C12.0011 16.9806 11.8 17.0004 11.6173 17.0761C11.4346 17.1518 11.2784 17.28 11.1685 17.4444C11.0586 17.6089 11 17.8022 11 18C11 18.2652 11.1054 18.5196 11.2929 18.7071C11.4804 18.8946 11.7348 19 12 19ZM17 19C17.1978 19 17.3911 18.9414 17.5556 18.8315C17.72 18.7216 17.8482 18.5654 17.9239 18.3827C17.9996 18.2 18.0194 17.9989 17.9808 17.8049C17.9422 17.6109 17.847 17.4327 17.7071 17.2929C17.5673 17.153 17.3891 17.0578 17.1951 17.0192C17.0011 16.9806 16.8 17.0004 16.6173 17.0761C16.4346 17.1518 16.2784 17.28 16.1685 17.4444C16.0586 17.6089 16 17.8022 16 18C16 18.2652 16.1054 18.5196 16.2929 18.7071C16.4804 18.8946 16.7348 19 17 19ZM17 15C17.1978 15 17.3911 14.9414 17.5556 14.8315C17.72 14.7216 17.8482 14.5654 17.9239 14.3827C17.9996 14.2 18.0194 13.9989 17.9808 13.8049C17.9422 13.6109 17.847 13.4327 17.7071 13.2929C17.5673 13.153 17.3891 13.0578 17.1951 13.0192C17.0011 12.9806 16.8 13.0004 16.6173 13.0761C16.4346 13.1518 16.2784 13.28 16.1685 13.4444C16.0586 13.6089 16 13.8022 16 14C16 14.2652 16.1054 14.5196 16.2929 14.7071C16.4804 14.8946 16.7348 15 17 15ZM12 15C12.1978 15 12.3911 14.9414 12.5556 14.8315C12.72 14.7216 12.8482 14.5654 12.9239 14.3827C12.9996 14.2 13.0194 13.9989 12.9808 13.8049C12.9422 13.6109 12.847 13.4327 12.7071 13.2929C12.5673 13.153 12.3891 13.0578 12.1951 13.0192C12.0011 12.9806 11.8 13.0004 11.6173 13.0761C11.4346 13.1518 11.2784 13.28 11.1685 13.4444C11.0586 13.6089 11 13.8022 11 14C11 14.2652 11.1054 14.5196 11.2929 14.7071C11.4804 14.8946 11.7348 15 12 15ZM19 3H18V2C18 1.73478 17.8946 1.48043 17.7071 1.29289C17.5196 1.10536 17.2652 1 17 1C16.7348 1 16.4804 1.10536 16.2929 1.29289C16.1054 1.48043 16 1.73478 16 2V3H8V2C8 1.73478 7.89464 1.48043 7.70711 1.29289C7.51957 1.10536 7.26522 1 7 1C6.73478 1 6.48043 1.10536 6.29289 1.29289C6.10536 1.48043 6 1.73478 6 2V3H5C4.20435 3 3.44129 3.31607 2.87868 3.87868C2.31607 4.44129 2 5.20435 2 6V20C2 20.7956 2.31607 21.5587 2.87868 22.1213C3.44129 22.6839 4.20435 23 5 23H19C19.7956 23 20.5587 22.6839 21.1213 22.1213C21.6839 21.5587 22 20.7956 22 20V6C22 5.20435 21.6839 4.44129 21.1213 3.87868C20.5587 3.31607 19.7956 3 19 3ZM20 20C20 20.2652 19.8946 20.5196 19.7071 20.7071C19.5196 20.8946 19.2652 21 19 21H5C4.73478 21 4.48043 20.8946 4.29289 20.7071C4.10536 20.5196 4 20.2652 4 20V11H20V20ZM20 9H4V6C4 5.73478 4.10536 5.48043 4.29289 5.29289C4.48043 5.10536 4.73478 5 5 5H6V6C6 6.26522 6.10536 6.51957 6.29289 6.70711C6.48043 6.89464 6.73478 7 7 7C7.26522 7 7.51957 6.89464 7.70711 6.70711C7.89464 6.51957 8 6.26522 8 6V5H16V6C16 6.26522 16.1054 6.51957 16.2929 6.70711C16.4804 6.89464 16.7348 7 17 7C17.2652 7 17.5196 6.89464 17.7071 6.70711C17.8946 6.51957 18 6.26522 18 6V5H19C19.2652 5 19.5196 5.10536 19.7071 5.29289C19.8946 5.48043 20 5.73478 20 6V9ZM7 15C7.19778 15 7.39112 14.9414 7.55557 14.8315C7.72002 14.7216 7.84819 14.5654 7.92388 14.3827C7.99957 14.2 8.01937 13.9989 7.98079 13.8049C7.9422 13.6109 7.84696 13.4327 7.70711 13.2929C7.56725 13.153 7.38907 13.0578 7.19509 13.0192C7.00111 12.9806 6.80004 13.0004 6.61732 13.0761C6.43459 13.1518 6.27841 13.28 6.16853 13.4444C6.05865 13.6089 6 13.8022 6 14C6 14.2652 6.10536 14.5196 6.29289 14.7071C6.48043 14.8946 6.73478 15 7 15ZM7 19C7.19778 19 7.39112 18.9414 7.55557 18.8315C7.72002 18.7216 7.84819 18.5654 7.92388 18.3827C7.99957 18.2 8.01937 17.9989 7.98079 17.8049C7.9422 17.6109 7.84696 17.4327 7.70711 17.2929C7.56725 17.153 7.38907 17.0578 7.19509 17.0192C7.00111 16.9806 6.80004 17.0004 6.61732 17.0761C6.43459 17.1518 6.27841 17.28 6.16853 17.4444C6.05865 17.6089 6 17.8022 6 18C6 18.2652 6.10536 18.5196 6.29289 18.7071C6.48043 18.8946 6.73478 19 7 19Z" fill="#B2B3BA"/>
                                    </svg>
                                    Events
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.125 12H19.875" stroke="#B2B3BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.125 6.75H19.875" stroke="#B2B3BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 19.5L6.75 22.5" stroke="#B2B3BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 19.5L17.25 22.5" stroke="#B2B3BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.625 3H6.375C5.13236 3 4.125 4.00736 4.125 5.25V17.25C4.125 18.4926 5.13236 19.5 6.375 19.5H17.625C18.8676 19.5 19.875 18.4926 19.875 17.25V5.25C19.875 4.00736 18.8676 3 17.625 3Z" stroke="#B2B3BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 6.75V12" stroke="#B2B3BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.25 17.25C9.07843 17.25 9.75 16.5784 9.75 15.75C9.75 14.9216 9.07843 14.25 8.25 14.25C7.42157 14.25 6.75 14.9216 6.75 15.75C6.75 16.5784 7.42157 17.25 8.25 17.25Z" fill="#B2B3BA"/>
                                        <path d="M15.75 17.25C16.5784 17.25 17.25 16.5784 17.25 15.75C17.25 14.9216 16.5784 14.25 15.75 14.25C14.9216 14.25 14.25 14.9216 14.25 15.75C14.25 16.5784 14.9216 17.25 15.75 17.25Z" fill="#B2B3BA"/>
                                    </svg>
                                    Railway
                                </a>
                            </li>
                        </ul>
                    </nav>
					<div class="hh-search-form-section">
						<div class="container">
							<div class="hh-search-form">
								@include('frontend.home.search.search-form')
							</div>
						</div>
					</div>
                    <div class="mobile-search-button">
                        <button uk-toggle="target: #explore-more-id">
                            <img src="http://192.168.100.9/veyvey/public/images/svg/search.svg" alt="">
                            <span>Search for Stays, Experiences & more</span>
                        </button>
                        <div id="explore-more-id" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body explore-more-modal">
                                <div class="modal-close uk-modal-close">
                                    <button></button>
                                </div>
                                <div class="search-mob-step active" data-step="1">
                                    <div style="margin: 0;" class="form-group find-location">
                                        <span>
                                            <label for="">Find location</label>
                                            <div class="form-control" data-plugin="mapbox-geocoder" data-value=""
                                                            data-current-location="1"
                                                            data-your-location="{{__('Your Location')}}"
                                                            data-placeholder="{{__('Enter a location ...')}}" data-lang="{{get_current_language()}}">
                                            </div>
                                            <div class="map d-none"></div>
                                            <input type="hidden" name="lat" value="">
                                            <input type="hidden" name="lng" value="">
                                            <input type="hidden" name="address" value="">
                                        </span>
                                        <button type="submit">
                                            <img src="http://test.gtrun.ge/home/images/icons/nav-icon.png" alt="navigation icon" uk-svg>
                                        </button>
                                    </div>
                                    <button class="search-next-step">
                                        Next
                                    </button>
                                </div>
                                <div class="search-mob-step" data-step="2">
                                <button class="search-next-step">
                                        Next 2
                                    </button>
                                </div>
                                <div class="search-mob-step" data-step="3">
                                    <button class="search-next-step">
                                        Next 3
                                    </button>
                                </div>
                                <div class="search-mob-step" data-step="4">
                                    <button class="search-next-step">
                                        Next 4
                                    </button>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </header>
    <div id="content-area">
