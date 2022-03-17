<style media="screen">
  .form-group{
    margin-bottom: 0;
  }
</style>

                    <div style="margin-left: -13px;" class="nav-content">
                        <div style="height: 40px;" class="nav-form">
                            <form style="border:none;" action="{{ get_home_search_page() }}" class="form find-location">
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
                            <div class="form-group form-group-date additional-info">
                                <span style="width:325px;">

                                    <div style="display: inherit;border:none;width:320px;" class="date-wrapper date date-double" data-date-format="{{ hh_date_format_moment()  }}">
                                      <label for="">From</label>
                										<input type="text" class="input-hidden check-in-out-field" name="checkInOut">
                										<input type="text" class="input-hidden check-in-field" name="checkIn">

                										<span style="margin-left: -32px;padding:0;margin-top:26px;width:30%;" class="check-in-render"
                											  data-date-format="{{ hh_date_format_moment()  }}"></span>
                								</span>
						                        <img style="height: 25px;margin-top:10px;" src="http://test.gtrun.ge/home/images/icons/Arrow-Right.png" alt="">

              										<span>
              											<label for="">Until</label>
              											<input type="text" class="input-hidden check-out-field" name="checkOut">
              											<span style="width: 130px;margin:0;padding:0;" class="check-out-render"
              													  data-date-format="{{ hh_date_format_moment()  }}"></span>
              										</span>
								</div>
							</div>
							    <?php
								$minmax = \App\Controllers\Services\HomeController::get_inst()->getMinMaxPrice();
								$currencySymbol = current_currency('symbol');
								$currencyPos = current_currency('position');
								?>
							<div style="margin-bottom: 0;" class="form-group">
                                <span>
                                    <label for="">Guests</label>
                                    <div class="guest-group">
										<button style="padding:0;border:none;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
												data-text-guest="{{__('Guest')}}"
												data-text-guests="{{__('Guests')}}"
												data-text-infant="{{__('Infant')}}"
												data-text-infants="{{__('Infants')}}"
												aria-haspopup="true" aria-expanded="false">
											&nbsp;
										</button>
										<div style="width:352px;box-shadow: 0px 0px 60px rgba(0, 0, 0, 0.08);border-radius: 10px;" class="dropdown-menu dropdown-menu-right">
                      <span style="margin-bottom:15px; font-weight: bold;font-size: 16px;">Room 1</span>
                      <div class="group">

												<span style="font-size: 16px;" class="pull-left">{{__('Adults')}}</span>
												<div style="border: 1px solid rgba(4, 9, 33, 0.04);box-sizing: border-box;border-radius: 8px;" class="control-item">
													<i class="decrease ti-minus"><svg style="margin-top: -3px;" width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path opacity="0.25" d="M0.5 1.5H7.5V0.5H0.5V1.5Z" fill="#040921"/>
                          </svg>
                          </i>
													<input type="number" min="1" step="1" max="15" name="num_adults" value="1">
													<i class="increase ti-plus"><svg style="margin-top: -3px;" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path opacity="0.75" d="M3.36053 8H4.64053V4.56H7.85653V3.44H4.64053V0H3.36053V3.44H0.144531V4.56H3.36053V8Z" fill="#040921"/>
                          </svg></i>
												</div>
											</div>
											<div class="group">
												<span style="font-size: 16px;" class="pull-left">{{__('Children')}}</span>
												<div style="border: 1px solid rgba(4, 9, 33, 0.04);box-sizing: border-box;border-radius: 8px;" class="control-item">
													<i class="decrease ti-minus"><svg style="margin-top: -3px;" width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.25" d="M0.5 1.5H7.5V0.5H0.5V1.5Z" fill="#040921"/>
													</svg></i>
													<input type="number" min="0" step="1" max="15" name="num_children"
														   value="0">
													<i class="increase ti-plus"><svg style="margin-top: -3px;" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.75" d="M3.36053 8H4.64053V4.56H7.85653V3.44H4.64053V0H3.36053V3.44H0.144531V4.56H3.36053V8Z" fill="#040921"/>
													</svg>
													</i>
												</div>
											</div>
											<div class="group">
												<span style="font-size: 16px;" class="pull-left">{{__('Infants')}}</span>
												<div style="border: 1px solid rgba(4, 9, 33, 0.04);box-sizing: border-box;border-radius: 8px;" class="control-item">
													<i class="decrease ti-minus"><svg style="margin-top: -3px;" width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.25" d="M0.5 1.5H7.5V0.5H0.5V1.5Z" fill="#040921"/>
													</svg></i>
													<input type="number" min="0" step="1" max="10" name="num_infants" value="0">
													<i class="increase ti-plus"><svg style="margin-top: -3px;" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.75" d="M3.36053 8H4.64053V4.56H7.85653V3.44H4.64053V0H3.36053V3.44H0.144531V4.56H3.36053V8Z" fill="#040921"/>
													</svg>
													</i>
												</div>
											</div>
												<svg width="351" height="1" viewBox="0 0 351 1" fill="none" xmlns="http://www.w3.org/2000/svg">
												<line y1="0.5" x2="351" y2="0.5" stroke="#040921" stroke-opacity="0.04"/>
												</svg>
												<svg style="margin-left: 35%;margin-top: 15px;" width="90" height="22" viewBox="0 0 90 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g opacity="0.75">
												<path d="M10.0003 8.93945V15.0448" stroke="#9D50FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M13.0554 11.9922H6.94434" stroke="#9D50FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M13.9051 3.6665H6.09556C3.37334 3.6665 1.66699 5.59324 1.66699 8.3208V15.6789C1.66699 18.4064 3.3654 20.3332 6.09556 20.3332H13.9051C16.6352 20.3332 18.3337 18.4064 18.3337 15.6789V8.3208C18.3337 5.59324 16.6352 3.6665 13.9051 3.6665Z" stroke="#9D50FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M36.176 17H37.52L33.572 7.396H32.284L28.336 17H29.68L30.954 13.794H34.902L36.176 17ZM31.402 12.674L32.928 8.838L34.454 12.674H31.402ZM41.2729 17.14C42.2529 17.14 43.2749 16.608 43.8209 15.81V17H44.9409V7.396H43.8209V11.19C43.2749 10.392 42.2529 9.86 41.2729 9.86C39.1869 9.86 37.8009 11.316 37.8009 13.5C37.8009 15.684 39.1869 17.14 41.2729 17.14ZM41.3849 16.16C39.9009 16.16 38.9209 15.096 38.9209 13.5C38.9209 11.904 39.9009 10.84 41.3849 10.84C42.8409 10.84 43.8209 11.904 43.8209 13.5C43.8209 15.096 42.8409 16.16 41.3849 16.16ZM49.7631 17.14C50.7431 17.14 51.7651 16.608 52.3111 15.81V17H53.4311V7.396H52.3111V11.19C51.7651 10.392 50.7431 9.86 49.7631 9.86C47.6771 9.86 46.2911 11.316 46.2911 13.5C46.2911 15.684 47.6771 17.14 49.7631 17.14ZM49.8751 16.16C48.3911 16.16 47.4111 15.096 47.4111 13.5C47.4111 11.904 48.3911 10.84 49.8751 10.84C51.3311 10.84 52.3111 11.904 52.3111 13.5C52.3111 15.096 51.3311 16.16 49.8751 16.16ZM58.4533 17H59.5733V12.912C59.5733 11.666 60.4133 10.84 61.6733 10.84H62.1493V10C62.0093 9.916 61.7853 9.86 61.5753 9.86C60.7913 9.86 60.1473 10.21 59.5733 10.966V10H58.4533V17ZM65.8832 17.14C67.9972 17.14 69.3972 15.684 69.3972 13.5C69.3972 11.316 67.9972 9.86 65.8832 9.86C63.7692 9.86 62.3692 11.316 62.3692 13.5C62.3692 15.684 63.7692 17.14 65.8832 17.14ZM65.8832 16.16C64.4412 16.16 63.4892 15.096 63.4892 13.5C63.4892 11.904 64.4412 10.84 65.8832 10.84C67.3252 10.84 68.2772 11.904 68.2772 13.5C68.2772 15.096 67.3252 16.16 65.8832 16.16ZM73.9223 17.14C76.0363 17.14 77.4363 15.684 77.4363 13.5C77.4363 11.316 76.0363 9.86 73.9223 9.86C71.8083 9.86 70.4083 11.316 70.4083 13.5C70.4083 15.684 71.8083 17.14 73.9223 17.14ZM73.9223 16.16C72.4803 16.16 71.5283 15.096 71.5283 13.5C71.5283 11.904 72.4803 10.84 73.9223 10.84C75.3643 10.84 76.3163 11.904 76.3163 13.5C76.3163 15.096 75.3643 16.16 73.9223 16.16ZM78.6466 17H79.7666V12.282C79.7666 11.414 80.3826 10.84 81.3206 10.84C82.2586 10.84 82.8746 11.414 82.8746 12.282V17H83.9946V12.282C83.9946 11.414 84.6106 10.84 85.5486 10.84C86.4866 10.84 87.1026 11.414 87.1026 12.282V17H88.2226V12.17C88.2226 10.784 87.2006 9.86 85.6606 9.86C84.8486 9.86 83.9946 10.28 83.5466 10.924C83.0986 10.28 82.3006 9.86 81.5586 9.86C80.8726 9.86 80.1586 10.224 79.7666 10.784V10H78.6466V17Z" fill="#040921"/>
												</g>
												</svg>
										</div>
									</div>
                                </span>
							</div>
                        </div>
                        <div class="form-group nav-submit">
                            <button value="{{__('Search')}}" type="submit">Search</button>
                        </div>

                    </div>
					</form>
