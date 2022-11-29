<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="card">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('includes.message')
            @foreach($images as $image)
                <div class="pub-image">
                    <div class="dashboard">
                        <div class="container-dashboard">
                            @if($image->user->image)
                                <img src="{{ url('/user/avatar/'.$image->user->image) }}" class="avatar-dashboard">
                            @else
                                <img src="https://grandimageinc.com/wp-content/uploads/2015/09/icon-user-default.png" class="avatar-dashboard">
                            @endif
                            
                            <a href="{{ route('profile', ['id' => $image->user->id]) }}"> 
                                {{ $image->user->name.' '.$image->user->surname }} 
                            
                                <span class="nickname">
                                    {{ '| @'.$image->user->nick }}
                                </span>
                            </a>
                            @if($image->user->id == Auth::user()->id)
                                <div class="dropdown">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                                        
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('image.edit', ['id' => $image->id])">
                                                {{ __('Editar') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('image.delete', ['id' => $image->id])">
                                                {{ __('Borrar') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-white border-b border-gray-200">
                       <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" class="image-dashboard">
                    </div>
                    <div class="like">
                        <?php $user_like = false; ?>
                        @foreach($image->likes as $like)
                            @if($like->user->id == Auth::user()->id)
                                <?php $user_like = true; ?>
                            @endif
                        @endforeach

                        @if($user_like)
                            <img src="{{ asset('storage/heart-red.png')}}" data-id="{{$image->id}}" class="btn-dislike">
                        @else
                            <img src="{{ asset('storage/heart-black.png')}}" data-id="{{$image->id}}" class="btn-like">
                        @endif
                        <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                            <img src="{{ asset('storage/comment.png')}}" class="like">
                        </a>
                        <img src="{{ asset('storage/share.png')}}" class="like">
                        
                    </div>
                    <div class="like-description">
                        Les gusta a {{ count($image->likes) }} personas más
                    </div>
                    <div class="description">
                        <span class="nick-description">{{ $image->user->nick }}</span> {{ $image->description }}
                    </div>
                    @if(count($image->comments) >= 1)
                        <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="btn-comentarios">Ver los {{count($image->comments)}} comentarios</a>
                    @endif
                    
                    <div class="form-comment-dashboard">
                        <form method="POST" action="{{ route('comment.save') }}">
                            @csrf

                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <p>
                                <textarea class="comment-dashboard" name="content"></textarea>
                                @if($errors->has('content'))
                                    <span role="alert">
                                        <strong class="error">{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <span class="date-public">{{\FormatTime::LongTimeFilter($image->created_at)}}</span>
                            <button class="btn-public">Publicar</button>
                        
                                    
                        </form>
                    </div>                
                   
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
