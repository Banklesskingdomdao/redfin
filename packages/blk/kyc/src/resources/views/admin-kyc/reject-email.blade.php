@component('mail::message')
# Welcome {{$details['name']}} !

Sorry!

Your KYC has been Rejected

please fill the kyc-form again.

<a href="{{url('/login')}}">click here</a>


{{ config('app.name') }}
@endcomponent