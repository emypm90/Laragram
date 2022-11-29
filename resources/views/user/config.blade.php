<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración de mi cuenta') }}
        </h2>
    </x-slot>

    <div class="formulario">
        @if(session('message'))
            <div class="max-w-lg overflow-hidden rounded-lg bg-green-100 text-green-700 shadow-md shadow-green-500/20">
                <div class="flex">
                    <div class="space-y-1 p-4">
                        <p class="font-bold capitalize">
                            {{ session('message') }}
                        </p>                       
                    </div>
                </div>
            </div>    
        @endif
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('user.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label :value="__('Nombre')" for="name">

                            </x-input-label>

                            <x-text-input :value="Auth::user()->name" autofocus="" class="block mt-1 w-full" id="name" name="name" required="" type="text">

                            </x-text-input>

                            <x-input-error :messages="$errors->get('name')" class="mt-2">
                            </x-input-error>
                        </div>

                        <!-- Surname -->
                        <div class="mt-4">
                            <x-input-label for="surname" :value="__('Apellidos')" />

                            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="Auth::user()->surname" required autofocus />

                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>

                        <!-- Nick -->
                        <div class="mt-4">
                            <x-input-label for="nick" :value="__('Nick')" />

                            <x-text-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="Auth::user()->nick" required autofocus />

                            <x-input-error :messages="$errors->get('nick')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Avatar -->
                        <div class="mt-4">
                            <x-input-label for="image_path" :value="__('Avatar')" />
                            @if(Auth::user()->image)
                                @include('includes/avatar')
                            @else
                                <img src="https://grandimageinc.com/wp-content/uploads/2015/09/icon-user-default.png" class="avatar">
                            @endif
                            <x-text-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" />


                            <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Guardar cambios') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>