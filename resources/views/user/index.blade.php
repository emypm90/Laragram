<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="card">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach($users as $user)
                    <div class="users">
                        @if($user->image)
                            <img src="{{ url('/user/avatar/'.$user->image) }}" class="user-img">
                        @else
                            <img src="https://grandimageinc.com/wp-content/uploads/2015/09/icon-user-default.png">
                        @endif
                    </div>
                    <div class="profile">
                        <a href="{{ route('profile', ['id' => $user->id]) }}">
                            <span class="nick-profile">{{$user->nick}}</span>
                        </a>
                        <span class="name-profile">{{$user->name.' '.$user->surname}}</span>
                        <span class="description-user">Se unió {{\FormatTime::LongTimeFilter($user->created_at)}}</span>
                        <hr class="hr">
                    </div>
                @endforeach
        </div>
    </div>
</x-app-layout>
    