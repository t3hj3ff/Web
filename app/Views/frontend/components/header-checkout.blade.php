<?php do_action('init'); ?>
<?php do_action('frontend_init'); ?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $favicon = get_option('favicon');
        $favicon_url = get_attachment_url($favicon);
    @endphp
    <link rel="shortcut icon" type="image/png" href="{{ $favicon_url }}"/>

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
<body class="awe-booking {{ $body_class }}">
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
    <header id="header" class="header {{$classSticky}}">

        
    </header>
        <div id="content-area">
