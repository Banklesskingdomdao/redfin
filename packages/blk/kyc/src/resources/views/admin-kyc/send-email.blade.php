@component('mail::message')
# Welcome {{$details['name']}} !

Your KYC has been approved successfully

<a href="{{url('/login')}}">click here to access dashboard</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

