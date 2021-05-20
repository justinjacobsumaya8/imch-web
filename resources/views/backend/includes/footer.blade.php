<footer class="c-footer">
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link href="javascript:void(0)" :text="__(appName())" />
        </strong>

        @lang('All Rights Reserved')
    </div>

    @if(null)
    <div class="mfs-auto">
        @lang('Powered by')
        <x-utils.link href="http://laravel-boilerplate.com" target="_blank" :text="__(appName())" /> &
        <x-utils.link href="https://coreui.io" target="_blank" text="CoreUI" />
    </div>
    @endif
</footer>
