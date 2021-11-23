@component('mail::message')
# Welcome Admin !

{{$details['name']}} Filled For Kyc Form

<a href="{{url('admin/kyc-list')}}">click here to verify</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent