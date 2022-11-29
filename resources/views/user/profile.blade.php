<x-app-layout>
    <x-slot name="header">
        <h2 class="header-profile">
            <div class="avatar-profile">
                @if($user->image)
                    <img src="{{ url('/user/avatar/'.$user->image) }}">
                @else
                    <img src="https://grandimageinc.com/wp-content/uploads/2015/09/icon-user-default.png">
                @endif
            </div>
            <div class="profile">
                <span class="nick-profile">{{$user->nick}}</span>
                <span class="name-profile">{{$user->name.' '.$user->surname}}</span>
                <span class="description-profile">Se unió {{\FormatTime::LongTimeFilter($user->created_at)}}</span>
            </div>
        </h2>
    </x-slot>
    @foreach($user->images as $image)
        @include('includes.image', ['image' => $image])
    @endforeach
</x-app-layout>
    