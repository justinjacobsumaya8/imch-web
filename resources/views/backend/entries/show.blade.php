@extends('backend.layouts.app')

@section('title')
    {{ $entry->full_name }}
@endsection

@section('content')
@include('backend.entries._schedule')
    <div class="mb-2">
        <div class="d-flex justify-content-between">
            <a href="{{ url('admin/entries') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="{{ url('admin/entries/' . $entry->id . '/print') }}" target="_blank" class="btn btn-outline-info"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
    <x-backend.card>
        <x-slot name="header">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <label>Preferred Date</label>
                    <h6>{{ date('F d, Y', strtotime($entry_schedule->schedule_date)) }}</h6>
                </div>
                <div class="col-md-3">
                    <label>Preferred Schedule</label>
                    <h6>
                        {{ $entry_schedule->name }} 
                        @if($schedule->schedule_availability == 1)
                            <small class="text-warning">Available Slot: {{ $schedule->schedule_availability }}</small>
                        @elseif($schedule->schedule_availability <= 0)
                            <small class="text-danger">Available Slot: {{ $schedule->schedule_availability }}</small>
                        @else
                            <small class="text-success">Available Slot: {{ $schedule->schedule_availability }}</small>
                        @endif
                    </h6>  
                </div>
                @if(!$entry_schedule->is_cancelled && !$entry_schedule->is_resched && !$entry_schedule->is_approved)
                <div class="col-md-6">
                    <form action="{{ url('admin/entries/' . $entry->id . '/update/' . $entry_schedule->id) }}" method="POST" id="form-update">
                        @csrf
                        @method('PATCH')
                        <div class="row float-right">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <select name="status" class="form-control" id="select-status">
                                        <option value="">-- Select Status --</option>
                                        @foreach($statuses as $status)
                                        <option value="{{ $status }}" 
                                        @if($entry_schedule->is_approved)
                                            selected
                                        @elseif($entry->is_cancelled)
                                            selected
                                        @elseif($entry->is_resched)
                                            selected
                                        @endif
                                        >{{ $status }}</option>

                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Update</button>  
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <x-utils.link
                        :text="__('Patient Profile')"
                        class="nav-link active"
                        id="profile-tab"
                        data-toggle="pill"
                        href="#profile"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="true" />

                    <x-utils.link
                        :text="__('Philippine Residence')"
                        class="nav-link"
                        id="residence-tab"
                        data-toggle="pill"
                        href="#residence"
                        role="tab"
                        aria-controls="residence"
                        aria-selected="false"/>

                    <x-utils.link
                        :text="__('Outside the Philippines')"
                        class="nav-link"
                        id="outside-tab"
                        data-toggle="pill"
                        href="#outside"
                        role="tab"
                        aria-controls="outside"
                        aria-selected="false"/>

                    <x-utils.link
                        :text="__('Travel History')"
                        class="nav-link"
                        id="travel-tab"
                        data-toggle="pill"
                        href="#travel"
                        role="tab"
                        aria-controls="travel"
                        aria-selected="false"/>
                </div>
            </nav>
            <div class="tab-content" id="profile-tabsContent">
                <div class="tab-pane fade pt-3 show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('backend.entries.edit-tabs.profile')
                </div>

                <div class="tab-pane fade pt-3" id="residence" role="tabpanel" aria-labelledby="residence-tab">
                    @include('backend.entries.edit-tabs.residence')
                </div>

                <div class="tab-pane fade pt-3" id="outside" role="tabpanel" aria-labelledby="outside-tab">
                    @include('backend.entries.edit-tabs.outside')
                </div>
                <div class="tab-pane fade pt-3" id="travel" role="tabpanel" aria-labelledby="travel-tab">
                    @include('backend.entries.edit-tabs.travel')
                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
<script type="text/javascript">
    $('#select-status').on('change', function(){
        var value = $(this).val();
        if (value == 'Resched') 
        {
            $('#schedule').modal('show');
        }
    });

    $('#schedule_date').on('change', function(){
        var value = $(this).val();
        getSchedule(value);
    });

    var schedule_date = $('#schedule_date').val();
    getSchedule(schedule_date);

    function getSchedule(value)
    {
        $.ajax({
            url: '{{ url('covid19-case-investigation-form/schedules') }}',
            data: {schedule_date: value},
            success: function(response)
            {
                $.each(response, function(i, data){

                    if (data.schedule_availability <= data.limit && data.schedule_availability != 1) 
                    {
                        $('.span-slot-' + data.name).addClass('text-success').text(data.schedule_availability);
                    }

                    if (data.schedule_availability == 1) 
                    {
                        $('.span-slot-' + data.name).addClass('text-warning').text(data.schedule_availability);
                    }

                    if (data.schedule_availability == 0) 
                    {
                        if ($('.radio-slot-' + data.name).is(':checked')) 
                        {
                            $('#form-update').find('button').prop('disabled', true);
                        }

                        $('.radio-slot-' + data.name).prop('disabled', true);
                        $('.span-slot-' + data.name).addClass('text-danger').text(data.schedule_availability);
                    }
                });
            }
        });
    }
</script>
@endpush