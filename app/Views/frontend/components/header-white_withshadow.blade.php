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
                                    {!! sprintf(__('I accept %s'), '<a class="c-pink" href="'.get_the_permalink(get_option('term_condition_page'), '', 'page').'" class="text-dark">'. __('Terms and Conditions') .'</a>') !!}
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



    <section style="background-image: none; height: auto; padding-bottom: 0;margin-bottom:0;" class="header-section">
        <header style="height:150px;border:none;box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.04);" id="header" class="header {{$classSticky}}">
            <div class="container">
                <div class="top-header">
                    <a href="http://test.gtrun.ge/home"><div class="logo">
                        <img src="http://test.gtrun.ge/home/images/logo.png" alt="logo">
                        <img src="http://test.gtrun.ge/home/images/logo1.png" alt="logo">
                    </div>
                    </a>
                    <nav class="top-header-nav">
                        <ul class="top-nav-menu">
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">About</a></li>
                        </ul>
                        <ul class="top-nav-input">
                            <li>
                                <div class="currency">
                                    <div style="background: #FFFFFF;border: 1px solid #F5F5F5;box-sizing: border-box;border-radius: 10px;" class="currency-usa">
                                        <img src="http://test.gtrun.ge/home/images/icons/currency-usa.png" alt="usa flag icon">

                                          <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M9.0485 9.74095C8.97122 9.47929 8.87746 9.25155 8.76735 9.05816C8.6573 8.86457 8.49968 8.67574 8.29418 8.49104C8.08893 8.30643 7.90429 8.15776 7.74057 8.04473C7.57695 7.93162 7.35218 7.80515 7.06641 7.66517C6.78088 7.52522 6.55464 7.42107 6.38811 7.35259C6.22136 7.28419 5.98015 7.19043 5.66463 7.07137C5.38488 6.96429 5.1766 6.88242 5.03956 6.82591C4.90268 6.76933 4.72267 6.68902 4.49943 6.58479C4.2763 6.48071 4.10961 6.38839 3.99946 6.30808C3.88935 6.22777 3.77182 6.12957 3.64679 6.01351C3.52176 5.89746 3.43397 5.77392 3.38334 5.64298C3.33283 5.51201 3.3075 5.36912 3.3075 5.21435C3.3075 4.80966 3.48601 4.4792 3.84316 4.22332C4.20033 3.96743 4.66171 3.83943 5.22723 3.83943C5.47711 3.83943 5.73187 3.87361 5.99062 3.94213C6.24938 4.01065 6.47114 4.08784 6.65569 4.17422C6.84039 4.26059 7.01443 4.35585 7.17818 4.45996C7.3419 4.56417 7.45792 4.64298 7.52644 4.69655C7.5949 4.75015 7.63828 4.78583 7.65595 4.80372C7.73344 4.86324 7.8136 4.88403 7.89694 4.86624C7.9862 4.8603 8.05472 4.8126 8.10244 4.72341L8.8258 3.4198C8.8972 3.30081 8.88244 3.18769 8.78117 3.08048C8.74539 3.04477 8.70092 3.00314 8.64698 2.95548C8.59356 2.90782 8.47744 2.82154 8.29871 2.69647C8.12017 2.57151 7.93118 2.45989 7.73191 2.36166C7.53241 2.26352 7.27341 2.16376 6.95492 2.06262C6.63661 1.96133 6.30765 1.89293 5.96826 1.85725V0.285716C5.96826 0.202434 5.94152 0.133945 5.88811 0.0803419C5.83457 0.026864 5.76608 0 5.68261 0H4.47714C4.39977 0 4.33281 0.0282401 4.27627 0.0848141C4.21972 0.141388 4.19145 0.208314 4.19145 0.285716V1.8929C3.25687 2.07141 2.49792 2.47024 1.91457 3.0893C1.33129 3.7084 1.03954 4.42853 1.03954 5.25006C1.03954 5.49409 1.06493 5.72623 1.11553 5.94637C1.16607 6.16669 1.22862 6.36462 1.30305 6.54019C1.37742 6.71589 1.48312 6.88845 1.62001 7.05814C1.75689 7.22777 1.8864 7.37363 2.0084 7.4956C2.13046 7.61754 2.2897 7.74407 2.48607 7.87498C2.68256 8.00602 2.85072 8.11175 2.99064 8.19206C3.13059 8.27212 3.31657 8.36469 3.54865 8.46862C3.7808 8.57285 3.96391 8.65163 4.09785 8.70533C4.2318 8.75883 4.41481 8.83333 4.64705 8.92837C4.96845 9.05337 5.20659 9.15013 5.36134 9.21862C5.5162 9.28711 5.71257 9.38234 5.95081 9.50437C6.18884 9.62627 6.36287 9.73792 6.47308 9.83915C6.5832 9.94038 6.68287 10.0654 6.77222 10.2142C6.86156 10.3629 6.90632 10.5207 6.90632 10.6874C6.90632 11.1577 6.72327 11.5207 6.35709 11.7765C5.99106 12.0325 5.5668 12.1605 5.08472 12.1605C4.86468 12.1605 4.64426 12.1368 4.4241 12.0892C3.65026 11.9342 2.92706 11.5622 2.25443 10.9729L2.23657 10.9551C2.18296 10.8898 2.1115 10.863 2.02231 10.8749C1.92705 10.8868 1.85856 10.9226 1.81694 10.9822L0.897243 12.1875C0.807925 12.3065 0.813961 12.4285 0.915132 12.5535C0.944935 12.5893 0.997006 12.643 1.07137 12.7143C1.14593 12.7858 1.28435 12.8973 1.48663 13.0494C1.68897 13.2012 1.90923 13.3439 2.14738 13.478C2.38549 13.6119 2.68753 13.7443 3.05369 13.8753C3.41984 14.0061 3.79922 14.0983 4.19211 14.1518V15.7143C4.19211 15.7918 4.22041 15.8587 4.27692 15.9153C4.3335 15.972 4.40042 16.0001 4.47779 16.0001H5.68327C5.76674 16.0001 5.83523 15.9734 5.88874 15.9199C5.94224 15.8664 5.96889 15.7979 5.96889 15.7144V14.1518C6.91551 13.9971 7.68487 13.5908 8.27707 12.9331C8.86933 12.2753 9.16556 11.491 9.16556 10.5804C9.16524 10.2828 9.12662 10.003 9.0485 9.74095Z" fill="#040921"/>
                                          </svg>
                                          <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M9.08342 0.958313L5.00008 5.04165L0.916748 0.958313" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                    </div>
                                </div>
                            </li>
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

    </section>
    </header>
        <div id="content-area">
