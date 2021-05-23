@extends('backend.layouts.app')

@section('title', __('Entries'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Entries Management')
        </x-slot>

        <x-slot name="body">
            <table id="table-entries" class="table table-hover table-bordered nowrap">
            	<thead>
            		<tr>
            			<th>Full Name</th>
            			<th>Status</th>
                        <th>Time Schedule</th>
            			<th>Date Schedule</th>
                        <th>Date Created</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		
            	</tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
<script type="text/javascript">
    $('#table-entries').DataTable({
        ajax: "{{ url('admin/entries/get') }}",
        columns: [
            {
                data: 'last_name',
                render: function(data, type, row, meta)
                {
                    var html = row.last_name + ', ' + row.first_name + ' ' + row.middle_name;
                    return html;
                }
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
                data: 'name'
            },
            {
                data: 'schedule_date',
                render: function(data, type, row, meta)
                {
                    var date = moment(data).format('MMMM DD, YYYY');
                    return date;
                }
            },
            {
                data: 'created_at',
                render: function(data, type, row, meta)
                {
                    var date = moment(data).format('MMMM Do YYYY, h:mm:ss A');
                    return date;
                }
            },
            {
                data: 'id',
                render: function(data, type, row, meta)
                {
                    return '<a class="btn btn-sm btn-primary" href="{{ url('admin/entries') }}/' + row.entry_id + '/show/' + data +'"><i class="fa fa-eye"></i> Show</a>';
                }
            }
        ],
        rowCallback: function (row, data, cell ) {
            
            $(row).find('td:first-child').addClass('text-capitalize');
        },
        order: [4, 'desc']
    });
</script>
@endpush