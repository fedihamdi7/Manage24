
@component('mail::message')
# {{__('Welcome To The Team')}} **{{$collab['collab_name']}}**

{{__('You Have Been Added As Collaborator')}}, <br>
{{__('Your Email : ')}} {{$collab['collab_mail']}}<br>
{{__('Your Password : ')}} {{$collab['collab_pwd']}}<br>

{{__('Click This Link To Login')}} [{{__('Log in')}}](http://127.0.0.1:8000)
{{-- @component('mail::button', ['url' => "127.0.0.1:8000/create_pwd/collab/{{$collab['token']}}"])
{{__('Create Password')}}
@endcomponent --}}

{{__('Thanks,')}}<br>
{{ config('app.name') }}
@endcomponent
