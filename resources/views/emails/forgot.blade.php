@component('mail::message')
    Hello {{$user->name}}

    <p> we understand it happened. </p>

    @component('mail::button',['url' => ('reset/' . $user->remember_token)])
        reset tour password
    @endcomponent
    <p>in case you have any issues recovering your password, please contact us;</p>

    thank you,<br>
    {{config('app.name')}}
@endcomponent
