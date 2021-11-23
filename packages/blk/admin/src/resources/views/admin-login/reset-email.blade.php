@component('mail::message')

Reset Password

<a href="{{url('admin/reset-password/'.$details->id)}}"><button class="button button-primary">Change Password</button></a>


Thanks,<br>
{{ config('app.name') }}
@endcomponent