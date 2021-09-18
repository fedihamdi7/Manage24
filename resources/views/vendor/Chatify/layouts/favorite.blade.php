<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}'), url('storage/images/profileImg/default_profile_image.jpg') ;">
    </div>
    <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
</div>
