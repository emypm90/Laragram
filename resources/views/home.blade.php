<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laragram</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/css/style.css'])
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-100"></div>
		<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
		    <!-- Primary Navigation Menu -->
		    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		        <div class="flex justify-between h-16">
		            <div class="flex">
		                <!-- Logo -->
		                <div class="shrink-0 flex items-center" id="logo">
		                    <a href="{{ route('home') }}" class="logo">
		                        <img src="{{asset('storage/logo.png')}}" class="logo">		          
		                    </a>
		                </div>

		                <!-- Navigation Links -->
		                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">                   
		                   
		                </div>
		            </div>

		            <!-- Settings Dropdown -->
		            <div class="hidden sm:flex sm:items-center sm:ml-6">
						<x-primary-button class="ml-4">
							<a href="{{ route('login') }}">Inicia Sesión</a>
						</x-primary-button>
					</div>
		        </div>
		    </div>
		</nav>
		<x-guest-layout>
    		<x-auth-card>
		        <x-slot name="logo">
		        </x-slot>

		        <form method="POST" action="{{ route('register') }}">
		            @csrf

		            <!-- Name -->
		            <div>
		                <x-input-label for="name" :value="__('Nombre')" />

		                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

		                <x-input-error :messages="$errors->get('name')" class="mt-2" />
		            </div>

		            <!-- Surname -->
		            <div class="mt-4">
		                <x-input-label for="surname" :value="__('Apellidos')" />

		                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />

		                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
		            </div>

		            <!-- Nick -->
		            <div class="mt-4">
		                <x-input-label for="nick" :value="__('Nick')" />

		                <x-text-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="old('nick')" required autofocus />

		                <x-input-error :messages="$errors->get('nick')" class="mt-2" />
		            </div>

		            <!-- Email Address -->
		            <div class="mt-4">
		                <x-input-label for="email" :value="__('Email')" />

		                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

		                <x-input-error :messages="$errors->get('email')" class="mt-2" />
		            </div>

		            <!-- Password -->
		            <div class="mt-4">
		                <x-input-label for="password" :value="__('Password')" />

		                <x-text-input id="password" class="block mt-1 w-full"
		                                type="password"
		                                name="password"
		                                required autocomplete="new-password" />

		                <x-input-error :messages="$errors->get('password')" class="mt-2" />
		            </div>

		            <!-- Confirm Password -->
		            <div class="mt-4">
		                <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />

		                <x-text-input id="password_confirmation" class="block mt-1 w-full"
		                                type="password"
		                                name="password_confirmation" required />

		                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
		            </div>

		            <div class="flex items-center justify-end mt-4">
		                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
		                    {{ __('Ya estas registrado?') }}
		                </a>

		                <x-primary-button class="ml-4">
		                    {{ __('Registrarse') }}
		                </x-primary-button>
		            </div>
		        </form>
    		</x-auth-card>
		</x-guest-layout>
		<footer class="footer">Desarrollado por Emiliano Pérez Méndez &copy; <?= date('Y') ?></footer>
   </body>
</html>