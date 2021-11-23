@component('mail::message')
# Welcome Admin !

{{$details['name']}} Filled For Loan Request Form

<a href="{{url('admin/request-list')}}">click here to verify</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent