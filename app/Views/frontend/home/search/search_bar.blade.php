@php

    enqueue_style('daterangepicker-css');
    enqueue_script('daterangepicker-js');
    enqueue_script('daterangepicker-lang-js');

    enqueue_script('switchery-js');
    enqueue_style('switchery-css');

    enqueue_style('iconrange-slider');
    enqueue_script('iconrange-slider');
    enqueue_style('listing-css');
@endphp
<link rel="stylesheet" href="http://192.168.100.9/veyvey/public/css/listing.css">

<div class="hh-search-bar-wrapper">
    <div class="listing-container">
        <div class="hh-search-bar-buttons">
            @php
                $lat = request()->get('lat');
                $lng = request()->get('lng');
                $address = request()->get('address');
            @endphp
            <!-- <div class="listing-header-inputs">
                    <div class="listing-input" type="button">
                        <span class="input-title">Location</span>
                        <span class="input-text">Tbilisi</span>
                    </div>
                    <div class="listing-input" type="button">
                        <span class="input-title">Date</span>
                        <span class="input-text">Add dates</span>
                    </div>
            </div>        -->
            <div class="hh-button-item button-location form-group listing-subheader-location">
                <span class="input-title">
                    Location
                </span>
                <div class="form-control" data-plugin="mapbox-geocoder" data-value="{{ $address }}"
                    data-your-location="{{('Your Location')}}" data-current-location="0"
                    data-placeholder="{{('Enter a location ...')}}" data-lang="{{get_current_language()}}"></div>
                <div class="map d-none"></div>
                <input type="hidden" name="lat" value="{{ $lat }}">
                <input type="hidden" name="lng" value="{{ $lng }}">
                <input type="hidden" name="address" value="{{ $address }}">
            </div>
            @php
                $booking_type = request()->get('bookingType', 'per_night');
            @endphp
            @if($booking_type == 'per_night')

            <div class="hh-button-item button-date button-date-double form-group listing-subheader-location"
                    data-date-format="{{ hh_date_format_moment() }}">
                    <span class="input-title">
                        Location
                    </span>
                    <span>Add data</span>
                    @php
                        $checkIn = request()->get('checkIn', '');
                        $checkOut = request()->get('checkOut', '');
                        $checkInOut = request()->get('checkInOut', '');
                    @endphp
                    <input type="hidden" class="check-in-field" name="checkIn" value="{{ $checkIn }}">
                    <input type="hidden" class="check-out-field" name="checkOut" value="{{ $checkOut }}">
                    <input type="text" class="input-hidden check-in-out-field" name="checkInOut" value="{{ $checkInOut }}">
                </div>

            @endif
            <div class="alt-header-list listing-subheader-location">
                    <div class="listing-input" type="button" tabindex="0" aria-expanded="false">
                        <span class="input-title">Guests</span>
                        <span class="input-text">Add guests</span>
                    </div>
                    <div uk-drop="mode: click" class="info-block-dropdown uk-drop uk-drop-bottom-left" style="left: 0px; top: 40px;">
                        <div class="info-block-dropdown-block">
                            <h4>Room 1</h4>
                            <div class="info-input-block">
                                <div class="input-title">
                                    <h5>Adults</h5>
                                    <span>17 and above</span>
                                </div>
                                <div class="input-box">
                                    <span onclick="incrementValue()">+</span>
                                    <input type="number" name="adults" value="0" id="number9">
                                    <span onclick="incrementValueMinuse()">-</span>
                                </div>
                            </div>
                            <div class="info-input-block">
                                <div class="input-title">
                                    <h5>Children</h5>
                                    <span>Ages 2–17</span>
                                </div>
                                <div class="input-box">
                                    <span onclick="incrementValue8()">+</span>
                                    <input type="number" name="adults" value="0" id="number8">
                                    <span onclick="incrementValueMinuse8()">-</span>
                                </div>
                            </div>
                            <div class="info-input-block">
                                <div class="input-title">
                                    <h5>Infants</h5>
                                    <span>Under 2</span>
                                </div>
                                <div class="input-box">
                                    <span onclick="incrementValue7()">+</span>
                                    <input type="number" name="adults" value="0" id="number7">
                                    <span onclick="incrementValueMinuse7()">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-block-add-room">
                            <button>
                                <img src="image/Plus-room.png" alt="">
                                Add room
                            </button>
                        </div>
                    </div>
                </div>
            @if($booking_type == 'per_hour')
                <div class="hh-button-item button-date button-date-single button-same-date form-group"
                    data-date-format="{{ hh_date_format_moment() }}">
                    <span class="text"><?php echo __('Date'); ?></span>
                    @php
                        $checkIn = request()->get('checkInTime', date('Y-m-d'));
                        $checkOut = request()->get('checkOutTime', date('Y-m-d'));
                        $checkInOut = request()->get('checkInOutTime');
                    @endphp
                    <input type="hidden" class="check-in-field" name="checkInTime" value="{{ $checkIn }}">
                    <input type="hidden" class="check-out-field" name="checkOutTime" value="{{ $checkOut }}">
                    <input type="text" class="input-hidden check-in-out-field" name="checkInOutTime"
                        value="{{ $checkInOut }}">
                </div>
                @php
                    enqueue_script('flatpickr-js');
                    enqueue_style('flatpickr-css');
                    $startTime = request()->get('startTime','12:00 AM');
                    if(!$startTime){
                        $startTime = '12:00 AM';
                    }
                    $endTime = request()->get('endTime','11:30 PM');
                    if(!$endTime){
                        $endTime = '11:30 PM';
                    }
                @endphp
                <div class="dropdown dropdown-button dropdown-button-time">
                    <div class="hh-button-item button-time form-group" data-toggle="dropdown" aria-haspopup="true"
                        role="article"
                        aria-expanded="false">
                        <span class="text start">{{$startTime}}</span>
                        {!! get_icon('002_right_arrow', '', '15px') !!}
                        <span class="text end">{{$endTime}}</span>
                        <div class="dropdown-menu">
                            <div class="date-wrapper date-time">
                                <div class="date-render check-in-render"
                                    data-time-format="{{ hh_time_format() }}">
                                    <div class="render">{{__('Start Time')}}</div>
                                    <input type="hidden" name="startTime" value="{{ $startTime }}"
                                        class="input-checkin input-hidden flatpickr"/>
                                </div>
                                <span class="divider"></span>
                                <div class="date-render check-out-render"
                                    data-time-format="{{ hh_time_format() }}">
                                    <div class="render">{{__('End Time')}}</div>
                                    <input type="hidden" name="endTime" value="{{$endTime}}"
                                        class="input-checkout input-hidden flatpickr"/>
                                </div>
                            </div>
                            <a href="javascript:void(0)"
                            class="apply-time-filter btn btn-primary btn-xs right">{{__('Apply')}}</a>
                        </div>
                    </div>
                </div>
            @endif
            @php
                $minmax = \App\Controllers\Services\HomeController::get_inst()->getMinMaxPrice();
                $currencySymbol = current_currency( 'symbol' );
                $priceFilter = request()->get( 'price_filter' );
                $priceFilter = explode( ';', $priceFilter );
                if ( ! isset( $priceFilter[1] ) || $priceFilter[1] == 0 ) {
                    $priceFilter[1] = $minmax['max'];
                }
            $currencyPos = current_currency('position');
            @endphp
            <style media="screen">
            .irs--round {
                margin-top: 28px;
                margin-bottom:32px;
            }
            .irs--round .irs-handle.state_hover, .irs--round .irs-handle:hover {
                    background-color: #9D50FF;
                    border-color: #FFF;
            }
            .veyvey-main .irs--round .irs-handle{
                background-color: #9D50FF !important;
                border: 2px solid #ffffff;
            }
            .veyvey-main .irs--round .irs-line, .veyvey-main .irs--round .irs-bar{
                height: 5px;
            }
            </style>
            <div style="" class="dropdown dropdown-button dropdown-button-price">
                <div style="background: #FFFFFF;border: 1px solid #CDCED3;box-sizing: border-box;border-radius: 10px;" class="hh-button-item button-price form-group" data-toggle="dropdown" aria-haspopup="true"
                    role="article"
                    aria-expanded="false">
                    <span style="flex: none;order: 0;flex-grow: 0;margin: 0px 10px;" class="text">{{__('Price')}}<svg style="flex: none;order: 1;flex-grow: 0;margin: 0px 0px 0px 5px;" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6663 1.66666L5.99967 6.33332L1.33301 1.66666" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </span>
                    <div style="border-radius: 16px 16px 16px 16px; padding: 32px 24px 24px;" class="dropdown-menu">
                    <span style="font-weight: bold;font-size: 16px;" >The Average Price is 15$</span>
                        <input type="text" id="price-filter" name="price_filter" data-plugin="ion-range-slider"
                            data-prefix="{{ $currencyPos == 'left' ? $currencySymbol : ''}}"
                            data-postfix="{{ $currencyPos == 'right' ? $currencySymbol : ''}}"
                            data-min="{{ $minmax['min'] }}"
                            data-max="{{ $minmax['max'] }}"
                            data-from="{{ $priceFilter[0] }}"
                            data-to="{{ $priceFilter[1] }}"
                            data-skin="round">
                            <div class="multi-range-slider-input">
                                <div class="input-min">
                                    <label for="">max price</label>
                                    <div class="input-min-wrapper">
                                        <span>$</span>
                                        <input type="number" name="max-number" value="15">
                                    </div>
                                </div>
                                <div class="input-min">
                                    <label for="">min price</label>
                                    <div class="input-min-wrapper">
                                        <span>$</span>
                                        <input type="number" name="min-number" value="10">
                                    </div>
                                </div>
                            </div>
                            <div class="price-range-save-buttons">
                                <button class="price-range-clear">Clear</button>
                                <button class="price-range-save">Save</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="dropdown dropdown-button dropdown-button-price">
                <div style="background: #FFFFFF;border: 1px solid #CDCED3;box-sizing: border-box;border-radius: 10px;" class="hh-button-item button-price form-group" data-toggle="dropdown" aria-haspopup="false"
                    role="article"
                    aria-expanded="false">
                    <span style="flex: none;order: 0;flex-grow: 0;margin: 0px 10px;" class="text">{{__('Type')}}<svg style="flex: none;order: 1;flex-grow: 0;margin: 0px 0px 0px 5px;" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6663 1.66666L5.99967 6.33332L1.33301 1.66666" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </span>
                    <div style="padding:0;border: 1px solid #F0F1F3;box-sizing: border-box;border-radius: 16px;" class="dropdown-menu type-drop-down">
                    <ul>
                            <li>
                                <label class="listing-type-checkbox-block">
                                    <input type="checkbox">
                                    <span class="listing-type-checkbox"></span>
                                    <div class="input-title">
                                        <h5>Entire place</h5>
                                        <span>Have a place to yourself</span>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label class="listing-type-checkbox-block">
                                    <input type="checkbox">
                                    <span class="listing-type-checkbox"></span>
                                    <div class="input-title">
                                        <h5>Private room</h5>
                                        <span>Have your own room and share some
                                            common spaces</span>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label class="listing-type-checkbox-block">
                                    <input type="checkbox">
                                    <span class="listing-type-checkbox"></span>
                                    <div class="input-title">
                                        <h5>Hotel room</h5>
                                        <span>Have a private or shared room in a boutique
                                            hotel, hostel, and more</span>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label class="listing-type-checkbox-block">
                                    <input type="checkbox">
                                    <span class="listing-type-checkbox"></span>
                                    <div class="input-title">
                                        <h5>Shared room</h5>
                                        <span>Stay in a shared space, like a common room</span>
                                    </div>
                                </label>
                            </li>
                        </ul>
                        <div class="type-drop-down-button">
                            <button class="button-cancel">Cancel</button>
                            <button class="button-save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown dropdown-button dropdown-button-more-filter">
                <div style="background: #FFFFFF;border: 1px solid #CDCED3;box-sizing: border-box;border-radius: 10px; padding: 0;" class="hh-button-item button-more-filter form-group" data-toggle="dropdown" aria-haspopup="false"
                    role="article"
                    aria-expanded="true">

                    <span style="flex: none;order: 0;flex-grow: 0;margin: 0px 10px; padding: 6px 12px; display: block;" class="text" uk-toggle="target: #more-filters-modal"><?php echo __('More filters'); ?></span>
                    <div style="margin-top:32px;margin-bottom: 32px;border-radius: 16px; display: none;">
                        <div style="font-weight: bold;font-size: 22px;" class="morefiltersHeading">
                            More Filters
                        </div>
                        <svg width="840" height="1" viewBox="0 0 840 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.5" x2="840" y2="0.5" stroke="#040921" stroke-opacity="0.1"/>
                        </svg>

                        @php
                            $terms = get_home_terms_filter();
                        @endphp
                        @if (!empty($terms))
                            @foreach ($terms as $term_name => $term)
                                @php
                                    $tax = request()->get($term_name);
                                    $tax_arr = [];
                                    if (!empty($tax)) {
                                        $tax_arr = explode(',', $tax);
                                    }
                                @endphp

                                <div style="margin-top:12px;margin-left:32px;" class="item-filter-wrapper" data-type="{{ $term_name }}">

                                    <div style="font-weight:700;font-size:22px;" class="label">{{ $term['label'] }}</div>
                                    @if (!empty($term['items']))
                                        <div class="content">
                                            <div class="row">
                                                @foreach ($term['items'] as $term_id => $term_title)
                                                    @php
                                                        $checked = '';
                                                        if (in_array($term_id, $tax_arr)) {
                                                            $checked = 'checked';
                                                        }
                                                    @endphp
                                                    <div class="col-lg-4 mb-1">
                                                        <div class="item checkbox  checkbox-success ">
                                                            <input type="checkbox" value="{{ $term_id }}"
                                                                id="{{$term_name}}{{ $term_id }}" {{ $checked }}/>
                                                            <label
                                                                for="{{ $term_name }}{{ $term_id }}">{{ get_translate($term_title) }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    <input type="hidden" name="{{ $term_name }}" value="{{ $tax }}"/>
                                </div>
                            @endforeach
                        @endif
                        <a style="float:left;font-weight: bold;font-size: 14px;line-height: 22px;display: flex;align-items: center;text-decoration-line: underline;color: #040921;" href="javascript:void(0)"
                        class="">{{__('Clear All')}}</a>
                        <a style="background: linear-gradient(246.12deg, #9D50FF 11.55%, #583CF0 104.8%);border-radius: 12px;width: 160px;height: 48px;padding-top:13px;font-size:14px;" href="javascript:void(0)"
                        class="apply-more-filter btn btn-primary btn-xs right">{{__('View Results')}}</a>
                    </div>
                    <div id="more-filters-modal" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body more-filters">
                            <div class="more-filters-header-block">
                                <h3>More filters</h3>
                                <button class="uk-modal-close" type="button" uk-close></button>
                            </div>
                            <div class="more-filters-wrapper">
                                <div class="more-filters-block">
                                    <h4>Hotel Rating</h4>
                                    <ul>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                2 Stars
                                                <input type="radio" name="hotel-rating-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                3 Stars
                                                <input type="radio" name="hotel-rating-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                3 Stars
                                                <input type="radio" name="hotel-rating-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                4 Stars
                                                <input type="radio" name="hotel-rating-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="more-filters-block">
                                    <h4>Distance from center of Tbilisi</h4>
                                    <ul>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Less than 1 km
                                                <input type="radio" name="distance">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Less than 3 km
                                                <input type="radio" name="distance">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Less than 5 km
                                                <input type="radio" name="distance">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="more-filters-block more-filters-block-row">
                                    <h4>Property Type</h4>
                                    <ul id="more-filters-block-auto">
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Apartments
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Holiday Homes
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Hotels
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Homestays
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Homestays
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Homestays
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                    <span class="more-property-types">
                                        Show all property types
                                        <img src="image/stroke.png" alt="">
                                    </span>
                                </div>
                                <div class="more-filters-block more-filters-block-row">
                                    <h4>Land Marks</h4>
                                    <ul>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Apartments
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Holiday Homes
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Hotels
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Homestays
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Homestays
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="more-filters-chackbox-block">
                                                Homestays
                                                <input type="radio" name="property-Type">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more-filters-footer-block">
                                <span class="clear-all">
                                    Clear all
                                </span>
                                <button class="view-results">
                                    View 200+ results
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hh-button-item show-filter form-group" id="show-filter-mobile">
                <span class="text">{{__('Filters')}}</span>
            </div>
            <!--
            <div class="hh-button-item show-map form-group" id="show-map-mobile">
                <span class="text">{{__('Show map')}}</span>
            </div> -->
        </div>
    </div>
    <!-- <div class="hh-toggle-map-search">
        <label for="hh-map-toggle-search" class="mr-2">{{__('Show Map')}}</label>
        <input id="hh-map-toggle-search" checked type="checkbox" data-plugin="switchery" data-color="#1bb99a"
               name="toggle_map_search" value="1"/>
    </div> -->
    <div class="hh-search-bar-toggle"></div>
    <div id="filter-mobile-box" class="filter-mobile-box">
        <div class="render-box">
            <div class="popup-filter-header">
                <span>{{__('Filters')}}</span>
                <div
                    class="popup-filter-close">{!! balanceTags(get_icon('001_close', '#575757', '28px', '28px')) !!}</div>
            </div>
            <div class="popup-filter-content">
                {{--Location--}}
                <div class="filter-item">
                    <p class="filter-item-title">{{__('Location')}}</p>
                    <div class="hh-button-item button-location form-group">
                        <div class="form-control" data-plugin="mapbox-geocoder" data-value="{{ $address }}"
                             data-your-location="{{__('Your Location')}}"
                             data-placeholder="{{__('Enter a location ...')}}" data-lang="{{get_current_language()}}"></div>
                        <div class="map d-none"></div>
                        <input type="hidden" name="lat" value="{{ $lat }}">
                        <input type="hidden" name="lng" value="{{ $lng }}">
                        <input type="hidden" name="address" value="{{ $address }}">
                    </div>
                </div>

                {{--Date--}}
                @if($booking_type == 'per_night')
                    <div class="filter-item">
                        <p class="filter-item-title">{{__('Date')}}</p>
                        <div class="hh-button-item button-date button-date-single form-group"
                             data-date-format="{{ hh_date_format_moment() }}">
                            <span class="text"><?php echo __('Date'); ?></span>
                            <input type="hidden" class="check-in-field" name="checkIn" value="{{ $checkIn }}">
                            <input type="hidden" class="check-out-field" name="checkOut" value="{{ $checkOut }}">
                            <input type="text" class="io-date check-in-out-field" name="checkInOut"
                                   value="{{ $checkInOut }}">
                        </div>
                    </div>
                @endif
                @if($booking_type == 'per_hour')
                    <div class="filter-item">
                        <p class="filter-item-title">{{__('Date')}}</p>
                        <div class="hh-button-item button-date button-date-single form-group"
                             data-date-format="{{ hh_date_format_moment() }}">
                            <span class="text"><?php echo __('Date'); ?></span>
                            <input type="hidden" class="check-in-field" name="checkInTime" value="{{ $checkIn }}">
                            <input type="hidden" class="check-out-field" name="checkOutTime" value="{{ $checkOut }}">
                            <input type="text" class="io-date check-in-out-field" name="checkInOutTime"
                                   value="{{ $checkInOut }}">
                        </div>
                    </div>
                    <div class="filter-item">
                        <p class="filter-item-title">{{__('Time')}}</p>
                        @php
                            $listTime = list_hours(30);
                        @endphp
                        <div class="date-wrapper date-time">
                            <div class="date-render check-in-render"
                                 data-time-format="{{ hh_time_format() }}">
                                <div class="render">{{$startTime}}</div>
                                <div class="dropdown-time">
                                    @foreach($listTime as $key => $value)
                                        <div class="item @if($key == $startTime) active @endif" data-value="{{ $key }}">{{ $value }}</div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="startTime" value="{{ $startTime }}"
                                       class="input-checkin"/>
                            </div>
                            <span class="divider">{!! get_icon('002_right_arrow', '', '15px') !!}</span>
                            <div class="date-render check-out-render"
                                 data-time-format="{{ hh_time_format() }}">
                                <div class="render">{{$endTime}}</div>
                                <div class="dropdown-time">
                                    @foreach($listTime as $key => $value)
                                        <div class="item @if($key == $endTime) active @endif" data-value="{{ $key }}">{{ $value }}</div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="endTime" value="{{ $endTime }}"
                                       class="input-checkin"/>
                            </div>
                        </div>
                    </div>
                @endif

                {{--Price--}}
                <div class="filter-item">
                    <p class="filter-item-title">{{__('Price')}}</p>
                    <input type="text" id="price-filter-popup" name="price_filter" data-plugin="ion-range-slider"
                           data-prefix="{{ $currencyPos == 'left' ? $currencySymbol : ''}}"
                           data-postfix="{{ $currencyPos == 'right' ? $currencySymbol : ''}}"
                           data-min="{{ $minmax['min'] }}"
                           data-max="{{ $minmax['max'] }}"
                           data-from="{{ $priceFilter[0] }}"
                           data-to="{{ $priceFilter[1] }}"
                           data-skin="round">
                </div>

                {{--Taxonomy--}}
                @if (!empty($terms))
                    @foreach ($terms as $term_name => $term)
                        @php
                            $tax = request()->get($term_name);
                            $tax_arr = [];
                            if (!empty($tax)) {
                                $tax_arr = explode(',', $tax);
                            }
                        @endphp
                        <div class="filter-item item-filter-wrapper popup-tax-filter" data-type="{{ $term_name }}">
                            <p class="filter-item-title">{{ $term['label'] }}</p>
                            @if (!empty($term['items']))
                                <div class="content">
                                    <div class="row">
                                        @foreach ($term['items'] as $term_id => $term_title)
                                            @php
                                                $checked = '';
                                                if (in_array($term_id, $tax_arr)) {
                                                    $checked = 'checked';
                                                }
                                            @endphp
                                            <div class="col-sm-4 mb-1">
                                                <div class="item checkbox  checkbox-success ">
                                                    <input type="checkbox" value="{{ $term_id }}"
                                                           id="popup-{{$term_name}}{{ $term_id }}" {{ $checked }}/>
                                                    <label
                                                        for="popup-{{ $term_name }}{{ $term_id }}">{{ get_translate($term_title) }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" name="{{ $term_name }}" value="{{ $tax }}"/>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="popup-filter-footer">
            <div class="view-result">{{__('View filter result')}}</div>
        </div>
    </div>
</div>
<script>
     function incrementValueMinuse()
    {
        var value = parseInt(document.getElementById('number9').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number9').value = value;
    }
    function incrementValue()
    {
        var value = parseInt(document.getElementById('number9').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number9').value = value;
    }
    function incrementValueMinuse8()
    {
        var value = parseInt(document.getElementById('number8').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number8').value = value;
    }
    function incrementValue8()
    {
        var value = parseInt(document.getElementById('number8').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number8').value = value;
    }
    function incrementValueMinuse7()
    {
        var value = parseInt(document.getElementById('number7').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number7').value = value;
    }
    function incrementValue7()
    {
        var value = parseInt(document.getElementById('number7').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number7').value = value;
    }

    $(document).ready(function(){
        $(".more-property-types").click(function(){
          $("#more-filters-block-auto").toggleClass("toggleul");
        });
        $("#favourite-add-button").click(function(){
            $(".favourite-add-button").hide();
            $(".favourite-crate-block").show();
          });
          $(".favourite-crate-butto button").click(function(){
            $(".favourite-add-button").show();
            $(".favourite-crate-block").hide();
          });
          $(".favourite-crate-butto button").click(function(){
            $(".favourite-add-button").show();
            $(".favourite-crate-block").hide();
          });
      });

</script>
