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
            			<th>Date Created</th>
            			<th>Date Updated</th>
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
                data: 'full_name'
            },
            {
                data: 'status',
                render: function(data, type, row, meta)
                {
                    var html = '<span class="badge badge-warning">Pending</span>';
                    if (data == 'Negative') 
                    {
                        html = '<span class="badge badge-success">Negative</span>';
                    }

                    if (data == 'Positive') 
                    {
                        html = '<span class="badge badge-danger">Positive</span>';
                    }

                    return html;
                }
            },
            {
                data: 'created_at',
                render: function(data, type, row, meta)
                {
                    var date = moment(data).format('MMMM Do YYYY, h:mm:ss a');
                    return date;
                }
            },
            {
                data: 'updated_at',
                render: function(data, type, row, meta)
                {
                    var date = moment(data).format('MMMM Do YYYY, h:mm:ss a');
                    return date;
                }
            },
            {
                data: 'id',
                render: function(data, type, row, meta)
                {
                    return '<a class="btn btn-sm btn-primary" href="{{ url('admin/entries') }}/' + data + '/edit"><i class="fa fa-edit"></i> Edit</a>';
                }
            }
        ],
        rowCallback: function (row, data, cell ) {
            
            $(row).find('td:first-child').addClass('text-capitalize');
        },
        order: [2, 'desc']
    });
</script>
@endpush