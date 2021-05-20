@extends('backend.layouts.app')

@section('title')
    {{ $entry->full_name }}
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            <span class="text-capitalize">@lang('Edit') {{ $entry->full_name }}</span>
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
@endpush