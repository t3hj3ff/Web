<div style="border-top:none;" class="hh-service-item home list" data-lng="{{ $item->location_lng }}"
     data-lat="{{ $item->location_lat }}" data-id="{{ $item->post_id }}">

    <div class="item-inner">
        <div class="thumbnail-wrapper">
            @if($item->is_featured == 'on')
                <div class="is-featured">{{ get_option('featured_text', __('Featured')) }}</div>
            @endif

            @if(!empty($item->gallery))
                @php
                    $galleries = explode(',', $item->gallery);
                @endphp
                <div id="hh-item-carousel-{{ $item->post_id }}" class="hh-item-carousel carousel slide"
                     data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($galleries as $key => $imageID)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <a href="{{ get_the_permalink($item->post_id, $item->post_slug) }}"
                                   class="carousel-cell">


                                    <img style="border-radius: 12px;"  src="{{ get_attachment_url($imageID, [400, 300]) }}"
                                         alt="{{ get_translate($item->post_title) }}"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#hh-item-carousel-{{ $item->post_id }}" role="button"
                       data-slide="prev">
                        <i class="ti-angle-left"></i>
                        <span class="sr-only">{{__('Previous')}}</span>
                    </a>
                    <a class="carousel-control-next" href="#hh-item-carousel-{{ $item->post_id }}" role="button"
                       data-slide="next">
                        <i class="ti-angle-right"></i>
                        <span class="sr-only">{{__('Next')}}</span>
                    </a>
                </div>
            @else

                <a href="{{ get_the_permalink($item->post_id, $item->post_slug) }}" class="no-gallery">
                    <img style="border-radius: 12px;"  src="{{ placeholder_image([400, 300]) }}" alt="{{ get_translate($item->post_title)  }}"
                         class="img-fluid"/>
                </a>
            @endif
        </div>
        <div class="content">
            <div class="d-flex justify-content-between align-items-center">
                <div class="home-type">
                    @php
                        $type = get_term_by('id', $item->home_type);
                        $type_name = $type? get_translate($type->term_title): '';
                    @endphp
                    <h5>Hotel in {{$item->location_city}}</h5>
                    <div class="stars">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.52447 0.963525C3.67415 0.50287 4.32585 0.50287 4.47553 0.963525L5.01031 2.60942C5.07725 2.81543 5.26923 2.95492 5.48584 2.95492H7.21644C7.7008 2.95492 7.90219 3.57472 7.51033 3.85942L6.11025 4.87664C5.93501 5.00397 5.86168 5.22965 5.92861 5.43566L6.4634 7.08156C6.61307 7.54222 6.08583 7.92528 5.69398 7.64058L4.29389 6.62336C4.11865 6.49603 3.88135 6.49603 3.70611 6.62336L2.30602 7.64058C1.91417 7.92528 1.38693 7.54222 1.5366 7.08156L2.07139 5.43566C2.13832 5.22965 2.06499 5.00397 1.88975 4.87664L0.489666 3.85942C0.0978096 3.57472 0.299197 2.95492 0.783559 2.95492H2.51416C2.73077 2.95492 2.92275 2.81543 2.98969 2.60942L3.52447 0.963525Z" fill="#C4C4C4"/>
                        </svg>
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.52447 0.963525C3.67415 0.50287 4.32585 0.50287 4.47553 0.963525L5.01031 2.60942C5.07725 2.81543 5.26923 2.95492 5.48584 2.95492H7.21644C7.7008 2.95492 7.90219 3.57472 7.51033 3.85942L6.11025 4.87664C5.93501 5.00397 5.86168 5.22965 5.92861 5.43566L6.4634 7.08156C6.61307 7.54222 6.08583 7.92528 5.69398 7.64058L4.29389 6.62336C4.11865 6.49603 3.88135 6.49603 3.70611 6.62336L2.30602 7.64058C1.91417 7.92528 1.38693 7.54222 1.5366 7.08156L2.07139 5.43566C2.13832 5.22965 2.06499 5.00397 1.88975 4.87664L0.489666 3.85942C0.0978096 3.57472 0.299197 2.95492 0.783559 2.95492H2.51416C2.73077 2.95492 2.92275 2.81543 2.98969 2.60942L3.52447 0.963525Z" fill="#C4C4C4"/>
                        </svg>
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.52447 0.963525C3.67415 0.50287 4.32585 0.50287 4.47553 0.963525L5.01031 2.60942C5.07725 2.81543 5.26923 2.95492 5.48584 2.95492H7.21644C7.7008 2.95492 7.90219 3.57472 7.51033 3.85942L6.11025 4.87664C5.93501 5.00397 5.86168 5.22965 5.92861 5.43566L6.4634 7.08156C6.61307 7.54222 6.08583 7.92528 5.69398 7.64058L4.29389 6.62336C4.11865 6.49603 3.88135 6.49603 3.70611 6.62336L2.30602 7.64058C1.91417 7.92528 1.38693 7.54222 1.5366 7.08156L2.07139 5.43566C2.13832 5.22965 2.06499 5.00397 1.88975 4.87664L0.489666 3.85942C0.0978096 3.57472 0.299197 2.95492 0.783559 2.95492H2.51416C2.73077 2.95492 2.92275 2.81543 2.98969 2.60942L3.52447 0.963525Z" fill="#C4C4C4"/>
                        </svg>
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.52447 0.963525C3.67415 0.50287 4.32585 0.50287 4.47553 0.963525L5.01031 2.60942C5.07725 2.81543 5.26923 2.95492 5.48584 2.95492H7.21644C7.7008 2.95492 7.90219 3.57472 7.51033 3.85942L6.11025 4.87664C5.93501 5.00397 5.86168 5.22965 5.92861 5.43566L6.4634 7.08156C6.61307 7.54222 6.08583 7.92528 5.69398 7.64058L4.29389 6.62336C4.11865 6.49603 3.88135 6.49603 3.70611 6.62336L2.30602 7.64058C1.91417 7.92528 1.38693 7.54222 1.5366 7.08156L2.07139 5.43566C2.13832 5.22965 2.06499 5.00397 1.88975 4.87664L0.489666 3.85942C0.0978096 3.57472 0.299197 2.95492 0.783559 2.95492H2.51416C2.73077 2.95492 2.92275 2.81543 2.98969 2.60942L3.52447 0.963525Z" fill="#C4C4C4"/>
                        </svg>
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.52447 0.963525C3.67415 0.50287 4.32585 0.50287 4.47553 0.963525L5.01031 2.60942C5.07725 2.81543 5.26923 2.95492 5.48584 2.95492H7.21644C7.7008 2.95492 7.90219 3.57472 7.51033 3.85942L6.11025 4.87664C5.93501 5.00397 5.86168 5.22965 5.92861 5.43566L6.4634 7.08156C6.61307 7.54222 6.08583 7.92528 5.69398 7.64058L4.29389 6.62336C4.11865 6.49603 3.88135 6.49603 3.70611 6.62336L2.30602 7.64058C1.91417 7.92528 1.38693 7.54222 1.5366 7.08156L2.07139 5.43566C2.13832 5.22965 2.06499 5.00397 1.88975 4.87664L0.489666 3.85942C0.0978096 3.57472 0.299197 2.95492 0.783559 2.95492H2.51416C2.73077 2.95492 2.92275 2.81543 2.98969 2.60942L3.52447 0.963525Z" fill="#C4C4C4"/>
                        </svg>
                    </div>
                </div>
                @if(enable_review())
                    <div class="rating">
                      <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.261 18.8538C8.0904 17.5179 6.07111 15.9456 4.23929 14.1652C2.95144 12.8829 1.97101 11.3198 1.3731 9.59539C0.297144 6.25031 1.55393 2.42083 5.07112 1.28752C6.91961 0.692435 8.93845 1.03255 10.4961 2.20148C12.0543 1.03398 14.0725 0.693978 15.9211 1.28752C19.4383 2.42083 20.7041 6.25031 19.6281 9.59539C19.0302 11.3198 18.0498 12.8829 16.7619 14.1652C14.9301 15.9456 12.9108 17.5179 10.7402 18.8538L10.5051 19L10.261 18.8538Z" stroke="#040921" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                @endif
            </div>
            <h3 class="title">
                <a href="{{ get_the_permalink($item->post_id, $item->post_slug) }}">{{ get_translate($item->post_title) }}</a>
            </h3>

            <div class="facilities">
                <div class="item max-people">
                    {{ _n(__('%s guest'), __('%s guests'), (int)$item->number_of_guest) }}
                </div>
                <svg width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="1.5" cy="1.5" r="1.5" fill="#040921" fill-opacity="0.8"/>
                </svg>

                <div class="item max-bedrooms">
                    {{ _n(__('%s bedroom'), __('%s bedrooms'), (int)$item->number_of_bedrooms) }}
                </div>
                <svg width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="1.5" cy="1.5" r="1.5" fill="#040921" fill-opacity="0.8"/>
                </svg>

                <div class="item max-baths">
                    {{ _n(__('%s bathroom'), __('%s bathrooms'), (int)$item->number_of_bathrooms) }}
                </div>
                <svg width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="1.5" cy="1.5" r="1.5" fill="#040921" fill-opacity="0.8"/>
                </svg>

            </div>
            <ul class="search-result-benefit">
                <li>Breakfast included <div class="amenities-dot"></div></li>
                <li>Free cancelation <div class="amenities-dot"></div></li>
                <li>No Prepayment <div class="amenities-dot"></div></li>
            </ul>
            <div class="hot-offer">
                <img src="http://192.168.100.9/veyvey/images/fire.png" alt="">
                <span>2 Rooms left</span>
            </div>
            <div class="price-modal-sideb-rating">
                <span>4.9</span>
                <span class="room-voice">(143)</span>
            </div>
            <div class="meta-footer">
                <div class="price-wrapper">
                    <span style="color:#000; font-weight: 700;" class="price">{{ convert_price($item->base_price) }}</span><span
                            style="color:#000;" class="unit"> / {{get_home_unit($item)}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
