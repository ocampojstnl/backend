@component('mail::message')

Dear {{$event->customer['name']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
