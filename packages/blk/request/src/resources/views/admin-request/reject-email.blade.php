@component('mail::message')
# Welcome {{$details['name']}} !

Sorry!

Your Loan Request has been Rejected

please fill the Loan Request form again.

<a href="{{url('/login')}}">click here</a>


{{ config('app.name') }}
@endcomponent