@component('mail::message')
# Welcome {{$details['name']}} !

Admin Offered Change Offers

<a href="{{url('/loan')}}">click here</a>

to view change offer

Thanks,<br>
{{ config('app.name') }}
@endcomponent