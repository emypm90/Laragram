@if(Auth::user()->image)
        <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" class="avatar">
@endif  