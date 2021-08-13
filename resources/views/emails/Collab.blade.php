
@component('mail::message')
# {{__('Welcome To The Team'), $collab['collab_name']}}

{{__('You Have Been Added As Collaborator')}},
{{__('Click This Link To Set A Password And Start Collaborating')}} [{{__('link')}}](http://127.0.0.1:8000/create_pwd/collab/{{$collab['token']}})
{{-- @component('mail::button', ['url' => "127.0.0.1:8000/create_pwd/collab/{{$collab['token']}}"])
{{__('Create Password')}}
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
