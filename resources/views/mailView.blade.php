@component('mail::message')
    Alert! Your Shortened Link: $url has expired!.

    @component('mail::panel')
        Alert!! Your Short link expires after 2 minutes.
    @endcomponent

    Regards
@endcomponent
