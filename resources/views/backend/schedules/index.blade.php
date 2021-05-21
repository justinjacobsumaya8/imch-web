@extends('backend.layouts.app')

@section('title', __('Schedules'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Schedules Management')
        </x-slot>

        <x-slot name="body">
            <table id="table-entries" class="table table-hover table-bordered nowrap">
            	<thead>
            		<tr>
            			<th>Name</th>
            			<th>Limit</th>
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
        ajax: "{{ url('admin/schedules') }}",
        columns: [
            {
                data: 'name'
            },
            {
                data: 'limit'
            }
        ]
    });
</script>
@endpush