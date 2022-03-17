@php
    $logo_footer = get_option('footer_logo');
    if(empty($logo_footer)){
        $logo_footer = get_option('logo');
    }
    $list_social = get_option('list_social');
    $screen = current_screen();
    $setup_mailc_api = get_option('mailchimp_api_key');
    $setup_mailc_list_id = get_option('mailchimp_list');
    enqueue_script('nice-select-js');
    enqueue_style('nice-select-css');
@endphp
</div>
<footer class="homepage-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-inspiration">
                    <div class="footer-box">
                            <img src="http://test.gtrun.ge/home/images/footer-logo.png" alt="vayvay logo">
                            <h2>All the benefits are
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
                    <div class="footer-nav footer-nav-row">
                        <div>
                            <h3>About</h3>
                            <ul>
                                <li><a href="">How VeyVey works</a></li>
                                <li><a href="">Partner Help</a></li>
                                <li><a href="">Careers</a></li>
                                <li><a href="">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div class="footer-nav-row-list">
                            <h3>Social media</h3>
                            <ul>
                                <li><a href="">Facebook</a></li>
                                <li><a href="">Instagram</a></li>
                                <li><a href="">Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-police">
                <div class="copyright">
                    <span>2020 VeyVey Inc. All Rights Reserved</span>
                </div>
                <div class="footer-police-row">
                    <div class="private-police">
                        <span>Privacy and policy</span>
                        <span>Terms and conditions</span>
                    </div>
                    <div class="secure-paiment">
                        <div class="secure">
                            <img src="http://test.gtrun.ge/home/images/icons/Lock2.png" alt="lock" width="15.23" height="18.5">
                            <span>Secure payment:</span>
                        </div>
                        <div>
                            <img src="http://test.gtrun.ge/home/images/icons/visa.png" alt="visa">
                            <img src="http://test.gtrun.ge/home/images/icons/mastercard.png" alt="mastercard">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php
    $enable_gdpr= get_option('enable_gdpr', 'off');
    if($enable_gdpr == 'on'){
        enqueue_script('gdpr-js');
        enqueue_style('gdpr-css');
    }
?>
<?php do_action('footer'); ?>
<?php do_action('init_footer'); ?>
<?php do_action('init_frontend_footer'); ?>
<script src="{{asset('js/frontend.js')}}"></script>
</body>
</html>
