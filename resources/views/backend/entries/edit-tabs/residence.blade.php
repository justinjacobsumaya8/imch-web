<div class="row">
    <div class="col-md-6 my-2">
        <h5>Permanent Address</h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0 text-capitalize">
                <tr>
                    <th>@lang('House No./Lot/Bldg')</th>
                    <td>{{ $entry->permanent_house_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Street/Barangay')</th>
                    <td>{{ $entry->permanent_street_address }}</td>
                </tr>

                <tr>
                    <th>@lang('Municipality/City')</th>
                    <td>{{ $entry->permanent_municipality }}</td>
                </tr>

                <tr>
                    <th>@lang('Province')</th>
                    <td>{{ $entry->permanent_province }}</td>
                </tr>

                <tr>
                    <th>@lang('Region')</th>
                    <td>{{ $entry->permanent_region }}</td>
                </tr>

                <tr>
                    <th>@lang('Home Phone No.')</th>
                    <td>{{ $entry->permanent_home_phone_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Cellphone No.')</th>
                    <td>{{ $entry->permanent_cellphone_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Email Address')</th>
                    <td>{{ $entry->permanent_email_address }}</td>
                </tr>
            </table>
        </div>  
    </div>
    <div class="col-md-6 my-2">
        <h5>Current Address</h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0 text-capitalize">
                <tr>
                    <th>@lang('House No./Lot/Bldg')</th>
                    <td>{{ $entry->current_house_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Street/Barangay')</th>
                    <td>{{ $entry->current_street_address }}</td>
                </tr>

                <tr>
                    <th>@lang('Municipality/City')</th>
                    <td>{{ $entry->current_municipality }}</td>
                </tr>

                <tr>
                    <th>@lang('Province')</th>
                    <td>{{ $entry->current_province }}</td>
                </tr>

                <tr>
                    <th>@lang('Region')</th>
                    <td>{{ $entry->current_region }}</td>
                </tr>

                <tr>
                    <th>@lang('Home Phone No.')</th>
                    <td>{{ $entry->current_home_phone_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Cellphone No.')</th>
                    <td>{{ $entry->current_cellphone_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Email Address')</th>
                    <td>{{ $entry->current_other_email_address }}</td>
                </tr>
            </table>
        </div>  
    </div>
</div>
