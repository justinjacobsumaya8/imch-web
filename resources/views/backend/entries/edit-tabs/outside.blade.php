<h5 class="my-2">Address Outside the Philippines (for Overseas Filipino Workers and Individuals with Residence Outside the Philippines)</h5>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0 text-capitalize">
        <tr>
            <th width="30%">@lang("Employer's Name")</th>
            <td>{{ $entry->overseas_employer_name }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('Occupation')</th>
            <td>{{ $entry->overseas_occupation }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('Place of Work')</th>
            <td>{{ $entry->overseas_place_of_work }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('House No./Bldg. Name')</th>
            <td>{{ $entry->overseas_house_number }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('City/Municipality')</th>
            <td>{{ $entry->overseas_city }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('Province')</th>
            <td>{{ $entry->overseas_province }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('Country')</th>
            <td>{{ $entry->overseas_country }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('Office Phone No.')</th>
            <td>{{ $entry->overseas_office_phone_number }}</td>
        </tr>

        <tr>
            <th width="30%">@lang('Cellphone No.')</th>
            <td>{{ $entry->overseas_cellphone_number }}</td>
        </tr>
    </table>
</div>