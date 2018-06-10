@component('mail::message')
# New Contact
### From {{$name}}

Email: {{$email}}

"{{$message}}"

@component('mail::button', ['url' => 'mailto:' . $email])
Reply to {{$email}}
@endcomponent

@endcomponent