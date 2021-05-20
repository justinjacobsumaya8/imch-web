@extends('frontend.layouts.app')

@section('title', __('Covid-19 Case Investigation Form'))

@section('content')
    <div class="container py-4">
        <x-frontend.card>
            <x-slot name="header">
                @lang('Covid-19 Case Investigation Form')
            </x-slot>

            <x-slot name="body">
                <form action="{{ url('covid19-case-investigation-form/store') }}" method="post" novalidate="" id="register">
                    @csrf
                    <div>
                        <h2>Patient Profile</h2>
                        <section>
                            <div class="row">
                                <div class="col-sm-12 col-lg">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}" name="first_name" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" value="" name="last_name" value="{{ old('last_name') }}" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('middle_name') }}" name="middle_name" placeholder="Enter Middle Name" required="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>Birthday <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('birthday') }}" name="birthday" placeholder="Select Birthday" required="" id="input-birthday" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Age <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="" name="age" required="" id="input-age"/>
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Sex <span class="text-danger">*</span></label>
                                    <select class="form-control" name="sex" required="">
                                        <option value="" selected="">-- Select --</option>
                                        @foreach($genders as $gender)
                                        <option value="{{ $gender }}" {{ old('sex') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control" value="{{ old('occupation') }}" name="occupation" placeholder="Enter Occupation" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Civil Status</label>
                                    <select class="form-control" name="civil_status">
                                        <option value="" selected="">-- Select --</option>
                                        @foreach($civil_statuses as $civil_status)
                                        <option value="{{ $civil_status }}" {{ old('civil_status') == $civil_status ? 'selected' : '' }}>{{ $civil_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('nationality') }}" name="nationality"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>PhilHealth No.</label>
                                    <input type="text" class="form-control" value="{{ old('philhealth_number') }}" name="philhealth_number" placeholder="12 digit PhilHealth No." id="input-philhealth-no" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Passport No.</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('passport_number') }}" name="passport_number" />
                                </div>
                            </div>
                        </section>
                        <h2>Philippine Residence</h2>
                        <section>
                            <h5>Permanent Address</h5>
                            <div class="row">
                                <div class="col-sm-12 col-lg">
                                    <label>House No./Lot/Bldg <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_house_number') }}" name="permanent_house_number" id="permanent_house_number" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Street/Barangay <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_street_address') }}" name="permanent_street_address" id="permanent_street_address" required="" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Municipality/City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_municipality') }}" name="permanent_municipality" id="permanent_municipality" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Province <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_province') }}" name="permanent_province" id="permanent_province" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Region <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_region') }}" name="permanent_region" id="permanent_region" required="" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Home Phone No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_home_phone_number') }}" name="permanent_home_phone_number" id="permanent_home_phone_number" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Cellphone No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('permanent_cellphone_number') }}" name="permanent_cellphone_number" id="permanent_cellphone_number" required="" />
                                </div>
                                <div class="col-sm-12 col-lg m-t-2">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="" value="{{ old('permanent_email_address') }}" name="permanent_email_address" id="permanent_email_address" required="" />
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="row align-items-center">
                                    <div class="col-sm-3">
                                        <h5>Current Address</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-primary btn-sm-block" id="btn-current-address">Use Permanent Address</button>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-sm-12 col-lg">
                                        <label>House No./Lot/Bldg </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_house_number') }}" name="current_house_number" id="current_house_number" />
                                    </div>
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Street/Barangay </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_street_address') }}" name="current_street_address" id="current_street_address" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Municipality/City </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_municipality') }}" name="current_municipality" id="current_municipality" />
                                    </div>
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Province </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_province') }}" name="current_province" id="current_province" />
                                    </div>
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Region </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_region') }}" name="current_region" id="current_region" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Home Phone No. </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_home_phone_number') }}" name="current_home_phone_number" id="current_home_phone_number" />
                                    </div>
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Cellphone No. </label>
                                        <input type="text" class="form-control" placeholder="" value="{{ old('current_cellphone_number') }}" name="current_cellphone_number" id="current_cellphone_number" />
                                    </div>
                                    <div class="col-sm-12 col-lg m-t-2">
                                        <label>Other Email address </label>
                                        <input type="email" class="form-control" placeholder="" value="{{ old('current_email_address') }}" name="current_other_email_address" id="current_other_email_address" />
                                    </div>
                                </div>      
                            </div>
                        </section>
                        <h2>Outside the Philippines</h2>
                        <section>
                            <h5>Address Outside the Philippines (for Overseas Filipino Workers and Individuals with Residence Outside the Philippines)</h5>
                            <div class="row">
                                <div class="col-sm-12 col-lg">
                                    <label>Employer's Name</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_employer_name') }}" name="overseas_employer_name"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_occupation') }}" name="overseas_occupation"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Place of Work</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_place_of_work') }}" name="overseas_place_of_work"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>House No./Bldg. Name</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_house_number') }}" name="overseas_house_number"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Street</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_street_address') }}" name="overseas_street_address"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>City/Municipality</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_city') }}" name="overseas_city"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Province</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_province') }}" name="overseas_province"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>Country</label>
                                    <select name="overseas_country" class="form-control">
                                        <option selected="" value="">-- Select --</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country['name'] }}" @if (old('overseas_country') == $country['name']) {{ 'selected' }} @endif>{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Office Phone No.</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_office_phone_number') }}" name="overseas_office_phone_number"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Cellphone No.</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('overseas_cellphone_number') }}" name="overseas_cellphone_number"/>
                                </div>
                            </div>
                        </section>
                        <h2>Travel History</h2>
                        <section>
                            <div class="row">
                                <div class="col-sm-12 col-lg">
                                    <label>History of travel/visit/work in other countries with a known COVID-19 transmission 14 days before the onset of your signs and symptoms</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="is_history_of_travel_symptom" value="1" {{ old('is_history_of_travel_symptom') == 1 ? 'checked' : '' }} id="history_of_travel1">
                                      <label class="form-check-label" for="history_of_travel1">
                                        Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="is_history_of_travel_symptom" value="0" {{ old('is_history_of_travel_symptom') == 0 ? 'checked' : '' }} id="history_of_travel2">
                                      <label class="form-check-label" for="history_of_travel2">
                                        No
                                      </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Port (Country ) of exit</label>
                                    <select name="port_of_exit" class="form-control">
                                        <option selected="" value="">-- Select --</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country['name'] }}" @if (old('port_of_exit') == $country['name']) {{ 'selected' }} @endif>{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>Airline/Sea vessel</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('airline_sea_vessel') }}" name="airline_sea_vessel"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Flight/Vessel Number</label>
                                    <input type="text" class="form-control" placeholder="" value="{{ old('flight_vessel_number') }}" name="flight_vessel_number"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Date of Departure</label>
                                    <input type="date" class="form-control" placeholder="" value="{{ old('departure_date') }}" name="departure_date"/>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Date of Arrival in Philippines</label>
                                    <input type="date" class="form-control" placeholder="" value="{{ old('philippine_arrival_date') }}" name="philippine_arrival_date"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-lg">
                                    <label>Returning Overseas Filipino Worker (0FW)</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="is_returning_ofw" {{ old('is_returning_ofw') == 1 ? 'checked' : '' }} id="is_returning_ofw1">
                                      <label class="form-check-label" for="is_returning_ofw1">
                                        Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="is_returning_ofw" {{ old('is_returning_ofw') == 0 ? 'checked' : '' }} id="is_returning_ofw2">
                                      <label class="form-check-label" for="is_returning_ofw2">
                                        No
                                      </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg">
                                    <label>Locally Stranded Individual (LSI)</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="is_locally_stranded_lsi" {{ old('is_locally_stranded_lsi') == 1 ? 'checked' : '' }} id="is_locally_stranded_lsi1">
                                      <label class="form-check-label" for="is_locally_stranded_lsi1">
                                        Yes
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="is_locally_stranded_lsi" {{ old('is_locally_stranded_lsi') == 0 ? 'checked' : '' }} id="is_locally_stranded_lsi2">
                                      <label class="form-check-label" for="is_locally_stranded_lsi2">
                                        No
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </x-slot>
        </x-frontend.card>
    </div><!--container-->
@endsection

@push('after-scripts')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ url('packages/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            var form = $("#register");

            form.validate({
                errorPlacement: function errorPlacement(error, element) { 
                    element.before(error); 
                }
            });

            form.children("div").steps({
                headerTag: "h2",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                autoFocus: true,
                saveState: true,
                // stepsOrientation: "vertical",
                labels: {
                    finish: "Submit"
                },
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    if (currentIndex < newIndex) {
                        // remove error styles
                        $("label.error", form).remove();
                        $(".error", form).removeClass("error");
                    }

                    form.validate().settings.ignore = ":disabled,:hidden";
                    if (!form.valid()) {
                        return form.valid(); 
                    }  
                    else
                    {
                        var dataString = form.serialize();
                        Cookies.set('formCookie', dataString);
                        return true;
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    form.submit();
                    event.preventDefault();
                    $('.form-preloader').addClass('active');
                }
            }).ready(function(){
                getCookieFormValues();
            });

            $('#input-birthday').datepicker({

                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0"

            }).on('change', function(){
                var value = $(this).val();
                var dob = new Date(value);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                
                $('#input-age').val(age);
            });

            $("#input-philhealth-no").mask("99-999999999-9");

            $('#btn-current-address').on('click', function(){
                $('#current_house_number').val($('#permanent_house_number').val());
                $('#current_street_address').val($('#permanent_street_address').val());
                $('#current_municipality').val($('#permanent_municipality').val());
                $('#current_province').val($('#permanent_province').val());
                $('#current_region').val($('#permanent_region').val());
                $('#current_home_phone_number').val($('#permanent_home_phone_number').val());
                $('#current_cellphone_number').val($('#permanent_cellphone_number').val());
                $('#current_other_email_address').val($('#permanent_email_address').val());
            })
        });

        function getCookieFormValues()
        {
            // get serialized string from cookie    
            cookieData = Cookies.get('formCookie');
            remove_token = cookieData.split('&').slice(1);
            string = JSON.stringify(remove_token);
            console.log(JSON.parse(string));
            // if cookie exists continue
            if (cookieData != null) {
                // split cookieData string into an array of fields and their values
                cookieArray = cookieData.split('&');

                // go through each field and split it too to get field name and it's value
                // $.each(cookieArray, function(k, v) {
                //     field = v.split('=');
                //     // populate field with data
                //     $('#register [name="'+field[0]+'"]').val(field[1]);
                // });
            }
        }
    </script>
@endpush
