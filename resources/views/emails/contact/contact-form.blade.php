@component('mail::message')
{{-- # Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }} --}}
From : <strong>{{$data['email']}}</strong>
{{$data['message']}}
Thanks <strong>{{$data['name']}}</strong>
@endcomponent
