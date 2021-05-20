<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0 text-capitalize">
                <tr>
                    <th width="50%">@lang('History of travel/visit/work in other countries with a known COVID-19 transmission 14 days before the onset of your signs and symptoms')</th>
                    <td>{!! $entry->is_history_of_travel_symptom ? '<span class="badge badge-warning">Yes</span>' : '<span class="badge badge-success">No</span>' !!}</td>
                </tr>

                <tr>
                    <th width="">@lang('Port (Country ) of exit')</th>
                    <td>{{ $entry->port_of_exit }}</td>
                </tr>

                <tr>
                    <th width="">@lang('Airline/Sea vessel')</th>
                    <td>{{ $entry->airline_sea_vessel }}</td>
                </tr>

                <tr>
                    <th width="">@lang('Flight/Vessel Number')</th>
                    <td>{{ $entry->flight_vessel_number }}</td>
                </tr>

                <tr>
                    <th width="">@lang('Date of Departure')</th>
                    <td>{{ $entry->departure_date }}</td>
                </tr>

                <tr>
                    <th width="">@lang('Date of Arrival in Philippines')</th>
                    <td>{{ $entry->philippine_arrival_date }}</td>
                </tr>

                <tr>
                    <th width="">@lang('Returning Overseas Filipino Worker (0FW)')</th>
                    <td>{!! $entry->is_returning_ofw ? '<span class="badge badge-warning">Yes</span>' : '<span class="badge badge-success">No</span>' !!}</td>
                </tr>

                <tr>
                    <th width="">@lang('Locally Stranded Individual (LSI)')</th>
                    <td>{!! $entry->is_locally_stranded_lsi ? '<span class="badge badge-warning">Yes</span>' : '<span class="badge badge-success">No</span>' !!}</td>
                </tr>
            </table>
        </div>  
    </div>
</div>
