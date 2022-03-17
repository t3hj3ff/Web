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
