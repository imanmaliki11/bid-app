@component('mail::message')
# Confirm Your Email

One step closer to join biggest bidding app on earth.

@component('mail::button', ['url' => route('email.validation', ['code' => $code])])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
