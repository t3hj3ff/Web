<?php do_action('init'); ?>
<?php do_action('frontend_init'); ?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{__('Page Not Found')}}</title>

    <link href="{{asset('css/vendor.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body style="background: white;" class="veyvey-main authentication-bg authentication-bg-pattern">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <div class="card-body p-4">



                        <div class="text-center">
                            <h3 class="mt-4">404</h3>
                            <p class="text-muted mb-0">Error 404</p>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p style="color:black;" class="text-black-50">{{__('Return to')}} <a href="{{ url('/') }}" class="text-black ml-1"><b>{{__('Home page')}}</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    Copyright VeyVey
</footer>

<script src="{{asset('js/vendor.min.js')}}"></script>

<?php do_action('footer'); ?>

<script src="{{asset('js/frontend.js')}}"></script>
</body>
</html>
