@extends('backend.layouts.app')

@section('title', __('Entries'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Entries Management')
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover table-bordered nowrap">
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
            		@forelse($entries as $entry)
            		<tr>
            			<td>{{ $entry->full_name }}</td>
            			<td>
            				@if($entry->status == 'Pending')
            				<span class="badge badge-warning">{{ $entry->status }}</span>
            				@endif
            			</td>
            			<td>{{ date('M d, Y', strtotime($entry->created_at)) }}</td>
            			<td>{{ date('M d, Y', strtotime($entry->updated_at)) }}</td>
            			<td>
            				<a href="#" class="btn btn-primary">Edit</a>
            			</td>
            		</tr>
            		@empty
            		<tr>
            			<td class="text-center" colspan="5">No data available.</td>
            		</tr>
            		@endforelse
            	</tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection