@component('mail::message')
# Welcome Admin !

{{$details['name']}} Requested  Change Offer For Loan

<a href="{{url('admin/request-list')}}">click here to verify</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent