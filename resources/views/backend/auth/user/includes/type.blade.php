@if ($user->isSuperAdmin())
    @lang('Super Administrator')
@elseif ($user->isAdmin())
    @lang('Administrator')
@elseif ($user->isPersonnel())
    @lang('Personnel')
@elseif ($user->isUser())
    @lang('User')
@else
    @lang('N/A')
@endif
