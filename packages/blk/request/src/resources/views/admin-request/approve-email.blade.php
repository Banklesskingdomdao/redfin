@component('mail::message')
# Welcome {{$details['name']}} !

Your Loan Request has been approved successfully

<a href="{{url('/login')}}">click here to access our dashboard</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent