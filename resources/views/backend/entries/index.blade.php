@extends('backend.layouts.app')

@section('title', __('Entries'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                @lang('Entries Management')
                <form action="{{ url('admin/entries/get') }}" id="form-filter">
                    <div class="row float-right">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="date" name="date_schedule" value="{{ $request->date_schedule }}" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Filter</button>  
                                </div>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>

        <x-slot name="body">
            <form action="" method="POST" id="form-update">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="Approved" id="input-status">
            </form>
            <table id="table-entries" class="table table-hover table-bordered nowrap">
            	<thead>
            		<tr>
                        <th>Date Schedule</th>
                        <th>Time Schedule</th>
            			<th>Full Name</th>
                        <th>Cell #</th>
                        <th>Status</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>

            	</tbody>
            </table>
        </x-slot>
    </x-backend.card>

    <div id="append-modal"></div>
@endsection

@push('after-scripts')
<script type="text/javascript">
    var table_entries;
    
    $(document).ready(function(){
        load_entries();

        $('#form-filter').on('submit', function(e){
            var form = $(this);

            var url = '{{ url('admin/entries') }}?' + form.serialize();
            window.location.href = url;
        });

        $('#table-entries').on('click', '.select-status', function(e){
            var btn = $(this);
            var value = btn.data('value');
            var url = btn.data('url');
            var form = $('#form-update');

            if (value == 'Resched') 
            {
                $.ajax({
                    url: url,
                    success: function (data) 
                    { 
                        $('#append-modal').html(data);
                        $('#schedule').modal('show');

                        var schedule_date = $('#append-modal').find('#input-schedule-date').val();
                        getSchedule(schedule_date);
                    },
                    dataType: 'html'
                });
            }
            else if (value == 'Cancel')
            {
                var text = 'Are you sure you want to cancel?';
                showAlert(text, value, url, form);
            }
            else if (value == 'Approved')
            {
                var text = 'Are you sure you want to approve?';
                showAlert(text, value, url, form);
            }
        });

        $(document).on('change', '#form-schedule', function(e){
            var form = $(this);
            form.find('button[type="submit"]').prop('disabled', true);
        });

        $(document).on('change', '#input-schedule-date', function(e){
            var value = $(this).val();
            getSchedule(value);
        });
    });

    function showAlert(text, value, url, form)
    {
        swal({
            text: text,
            icon: "info",
            buttons: true
        })
        .then((willDelete) => {
            if (willDelete) {
                $("#input-status").val(value);
                form.attr('action', url);
                form.submit();
            } 
        });
    }

    function load_entries()
    {
        if (!$.fn.DataTable.isDataTable('#table-entries'))
        {
            table_entries = $('#table-entries').DataTable({
                ajax: "{{ url('admin/entries/get') }}{{ $request->date_schedule ? '?date_schedule=' . $request->date_schedule : '' }}",
                columns: [
                    {
                        data: 'schedule_date',
                        render: function(data, type, row, meta)
                        {
                            var date = moment(data).format('MMMM DD, YYYY');
                            return date;
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'last_name',
                        render: function(data, type, row, meta)
                        {
                            var html = row.last_name + ', ' + row.first_name + ' ' + row.middle_name;
                            return html;
                        }
                    },
                    {
                        data: 'permanent_cellphone_number'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row, meta)
                        {
                            var html = '<span class="badge badge-warning">Pending</span>';

                            if (row.is_approved) 
                            {
                                html = '<span class="badge badge-success">Approved</span>';
                            }

                            if (row.is_cancelled) 
                            {
                                html = '<span class="badge badge-danger">Cancelled</span>';
                            }

                            if (row.is_resched) 
                            {
                                html = '<span class="badge badge-info">Rescheduled</span>';
                            }

                            return html;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row, meta)
                        {
                            var url = '{{ url('admin/entries/') }}/' + row.entry_id + '/update/' + data;
                            var resched_url = '{{ url('admin/entries/schedule') }}' + '/' + data;

                            var html = '<div class="dropdown">'+
                                        '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu'+
                                        '</button>'+
                                        '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                                            if(!row.is_cancelled && !row.is_resched && !row.is_approved)
                                            {
                                                html += '@if($logged_in_user->hasAnyRole(['Super Administrator', 'Personnel']))'+
                                                    '<a href="javascript:void(0)" form="form-update" class="dropdown-item select-status btn-approve" data-url="'+url+'" data-value="Approved"><i class="fa fa-check"></i>&nbsp; Approve</a>'+
                                                    '<a class="dropdown-item select-status" href="javascript:void(0)" data-url="'+resched_url+'" data-value="Resched"><i class="fa fa-history"></i>&nbsp; Resched</a>'+
                                                    '<a href="javascript:void(0)" form="form-update" class="dropdown-item select-status btn-cancel" data-url="'+url+'" data-value="Cancel"><i class="fa fa-times"></i>&nbsp; Cancel</a>'+
                                                    '<div class="dropdown-divider"></div>'+
                                                '@endif';
                                            }
                                    html += '@if($logged_in_user->hasAnyRole(['Super Administrator', 'Administrator']))'+
                                            '<a class="dropdown-item" href="{{ url('admin/entries') }}/' + row.entry_id + '/print" target="_blank"><i class="fa fa-print"></i>&nbsp; Print</a>'+
                                            '@endif'+
                                            '<a class="dropdown-item" href="{{ url('admin/entries') }}/' + row.entry_id + '/show/' + data +'"><i class="fa fa-eye"></i>&nbsp; Show</a>'+
                                        '</div>'+
                                    '</div>';

                            return html;
                        }
                    }
                ],
                rowCallback: function (row, data, cell ) {
                    
                    $(row).find('td:first-child').addClass('text-capitalize');
                },
                order: [0, 'desc']
            });
        }
        else
        {
            table_entries.ajax.reload();
        }
    }

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
                        $('#append-modal').find('.span-slot-' + data.name).addClass('text-success').text(data.schedule_availability);
                    }

                    if (data.schedule_availability == 1) 
                    {
                        $('#append-modal').find('.span-slot-' + data.name).addClass('text-warning').text(data.schedule_availability);
                    }

                    if (data.schedule_availability == 0) 
                    {
                        if ($('#append-modal').find('.radio-slot-' + data.name).is(':checked')) 
                        {
                            $('#append-modal').find('button[type="submit"]').prop('disabled', true);
                        }

                        $('#append-modal').find('.radio-slot-' + data.name).prop('disabled', true);
                        $('#append-modal').find('.span-slot-' + data.name).addClass('text-danger').text(data.schedule_availability);
                    }
                });
            }
        });
    }
</script>
@endpush