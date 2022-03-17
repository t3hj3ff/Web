@php
    if (empty($bookingObject)) {
        return;
    }
    $status = booking_status_info($bookingObject->status);
    $bookingID = $bookingObject->ID;
    $paymentID = $bookingObject->payment_type;
    $paymentObject = get_payments($paymentID);
    $serviceObject = get_booking_data($bookingID, 'serviceObject');
    $bookingData = get_booking_data($bookingID);
    $booking_type = isset($bookingData['cartData']['bookingType']) ? $bookingData['cartData']['bookingType'] : 'day';
@endphp
<ul class="nav nav-tabs nav-bordered">
    <li class="nav-item">
        <a href="#tab-invoice-payment-info" data-toggle="tab" aria-expanded="false" class="nav-link active">
            {{__('Booking Information')}}
        </a>
    </li>
    <li class="nav-item">
        <a href="#tab-invoice-customer" data-toggle="tab" aria-expanded="true" class="nav-link">
            {{__('Customer Information')}}
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab-invoice-payment-info">
        <div class="payment-item">
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Booking ID')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingObject->booking_id }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Service Name')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ get_translate($serviceObject->post_title) }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Number')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingData['cartData']['number'] }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('From')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ date(hh_date_format(true), $bookingObject->start_time) }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('To')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ date(hh_date_format(true), $bookingObject->end_time) }}</span>
                </div>
            </div>

            @php
                $number_hour = isset($bookingData['cartData']['numberHour']) ? $bookingData['cartData']['numberHour'] : 0;
                $number_day = isset($bookingData['cartData']['numberDay']) ? $bookingData['cartData']['numberDay'] : 0;
            @endphp
            @if(($booking_type == 'hour' && $number_hour > 0) || ($booking_type == 'day' && $number_day > 0))
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Duration')}}</h5>
                </div>
                <div class="col-8">
                    <span>
                        @if($booking_type == 'hour')
                            {{_n(__('%s hour'), __('%s hours'), $number_hour)}}
                        @elseif($booking_type == 'day')
                            {{_n(__('%s day'), __('%s days'),  $number_day)}}
                        @endif
                    </span>
                </div>
            </div>
            @endif

            @if(!empty($bookingData['cartData']['equipmentData']))
                <div class="item row align-items-center">
                    <div class="col-4">
                        <h5 class="title">{{__('Equipments')}}</h5>
                    </div>
                    <div class="col-8">
                        <ul class="mb-0 pl-2">
                            @foreach($bookingData['cartData']['equipmentData'] as $eq)
                                <li>
                                    {{get_translate($eq->term_title)}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(isset($bookingData['cartData']['insuranceData'] ) && !empty($bookingData['cartData']['insuranceData']))
                <br />
                <div class="item row align-items-center">
                    <div class="col-4">
                        <h5 class="title">{{__('Insurance Plan')}}</h5>
                    </div>
                    <div class="col-8">
                        <ul class="mb-0 pl-2">
                            @foreach($bookingData['cartData']['insuranceData'] as $ip)
                                <li>
                                    {{get_translate($ip['name'])}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Status')}}</h5>
                </div>
                <div class="col-8">
                    <span class="booking-status {{ $bookingObject->status }}">{{ __($status['label']) }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Payment Method')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $paymentObject::getName() }}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Base Price')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ convert_price($bookingData['basePrice']) }}</span>
                </div>
            </div>
            @php
                $equipmentPrice = $bookingData['equipmentPrice'];
            @endphp
            @if ($equipmentPrice > 0)
                <div class="item row align-items-center">
                    <div class="col-4">
                        <h5 class="title">{{__('Equipment Price')}}</h5>
                    </div>
                    <div class="col-8">
                        <span>{{ convert_price($equipmentPrice) }}</span>
                    </div>
                </div>
            @endif

            @php
                $insurancePrice = isset($bookingData['insurancePrice']) ? $bookingData['insurancePrice'] : 0;
            @endphp
            @if ($insurancePrice > 0)
                <div class="item row align-items-center">
                    <div class="col-4">
                        <h5 class="title">{{__('Insurance Price')}}</h5>
                    </div>
                    <div class="col-8">
                        <span>{{ convert_price($insurancePrice) }}</span>
                    </div>
                </div>
            @endif

            @php
                $coupon = isset($bookingData['cartData']['coupon']) ? $bookingData['cartData']['coupon'] : [];
            @endphp
            @if ($coupon)
                <div class="item row align-items-center">
                    <div class="col-4">
                        <h5 class="title">{{__('Coupon')}}</h5>
                    </div>
                    <div class="col-8">
                        <span>- {{ $coupon->couponPriceHtml }} ({{ $coupon->coupon_code }})</span>
                    </div>
                </div>
            @endif
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Sub Total')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ convert_price($bookingData['subTotal']) }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Tax')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingData['tax']['tax'] }}%</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Amount')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ convert_price($bookingObject->total) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab-invoice-customer">
        <div class="payment-item">
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('First Name')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingObject->first_name }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Last Name')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingObject->last_name }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Email')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingObject->email }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Phone')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingObject->phone }}</span>
                </div>
            </div>
            <div class="item row align-items-center">
                <div class="col-4">
                    <h5 class="title">{{__('Address')}}</h5>
                </div>
                <div class="col-8">
                    <span>{{ $bookingObject->address }}</span>
                </div>
            </div>
            @if(!empty($bookingObject->note))
                <div class="item row align-items-center">
                    <div class="col-4">
                        <h5 class="title">{{__('Note')}}</h5>
                    </div>
                    <div class="col-8">
                        <span>{{ $bookingObject->note }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
