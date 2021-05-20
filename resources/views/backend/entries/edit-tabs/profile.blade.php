<div class="row">
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0 text-capitalize">
                <tr>
                    <th width="30%">@lang('First Name')</th>
                    <td>{{ $entry->first_name }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Middle Name')</th>
                    <td>{{ $entry->middle_name }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Last Name')</th>
                    <td>{{ $entry->last_name }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Birthday')</th>
                    <td>{{ $entry->birthday }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Age')</th>
                    <td>{{ $entry->age }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Sex')</th>
                    <td>{{ $entry->sex }}</td>
                </tr>
            </table>
        </div>  
    </div>
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0 text-capitalize">
                <tr>
                    <th width="30%">@lang('Occupation')</th>
                    <td>{{ $entry->occupation }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Civil Status')</th>
                    <td>{{ $entry->civil_status }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Nationality')</th>
                    <td>{{ $entry->nationality }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Philhealth No.')</th>
                    <td>{{ $entry->philhealth_number }}</td>
                </tr>

                <tr>
                    <th width="30%">@lang('Passport No.')</th>
                    <td>{{ $entry->passport_number }}</td>
                </tr>
            </table>
        </div>  
    </div>
</div>
