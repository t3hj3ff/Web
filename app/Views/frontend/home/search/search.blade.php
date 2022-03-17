@include('frontend.components.header-white')
@php
    enqueue_style('mapbox-gl-css');
    enqueue_style('mapbox-gl-geocoder-css');
    enqueue_script('mapbox-gl-js');
    enqueue_script('mapbox-gl-geocoder-js');
    enqueue_script('search-home-js');

    $showmap = request()->get('showmap','yes');
@endphp

<div style="width: auto; margin-left: 120px;" class="hh-search-result" data-url="{{ get_home_search_page()}}">
    @include('frontend.home.search.search_bar')
    <div class="hh-search-content-wrapper @if($showmap == 'no') no-map @endif">
        @include('common.loading')
        <div style="width:60%;" class="hh-search-results-render" data-url="{{ url(Route::currentRouteName()) }}">
            <div class="render">
                <div class="hh-search-results-string">
                    <span class="item-found">{{__('Searching home...')}}</span>
                    

                </div>
                <div class="hh-search-content">
                    <div class="service-item list">


                    </div>
                </div>
                <div class="hh-search-pagination">

                </div>
            </div>
        </div>
        <div style="width:40%;margin-left:60%;" class="hh-search-results-map">
            @php
                $lat = request()->get('lat');
                $lng = request()->get('lng');
                $zoom = request()->get('zoom', 10);
                $in_map = true;
            @endphp
            <div class="hh-mapbox-search" data-lat="{{ $lat }}"
                 data-lng="{{ $lng }}" data-zoom="{{ $zoom }}"></div>
            <div class="hh-close-map-popup" id="hide-map-mobile">{{__('Close')}}</div>
            <div style="top: 25px; left: 19%;" class="hh-map-tooltip">
                <div class="checkbox checkbox-success">
                    <input id="chk-map-move" type="checkbox" name="map_move" value="1">
                    <label for="chk-map-move">{{__('Search as I move the map')}}</label>
                </div>
                @include('common.loading')
            </div>
            <div style="border: none;box-shadow: none;background: none;top: 25px; left: 550px;display:block;" class="hh-map-tooltip">
                <div style="width: 50px;display:block;" class="checkbox checkbox-success">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="40" height="40" rx="10" fill="white"/>
                  <path d="M24.2434 15.7581L15.7581 24.2434" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M24.2426 24.2426L15.7574 15.7573" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>


                  <svg style="margin-top:12px;" width="40" height="77" viewBox="0 0 40 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="40" height="77" rx="10" fill="white"/>
                  <path d="M20.0011 14V26" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M26 19.9999H14" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <rect x="10" y="38" width="20" height="1" rx="0.5" fill="#040921" fill-opacity="0.08"/>
                  <path d="M26 57.5H14" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>




                </div>
                @include('common.loading')
            </div>
        </div>
    </div>
</div>
@include('frontend.components.footer-nofooter')
