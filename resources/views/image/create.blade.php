<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir nueva imagen') }}
        </h2>
    </x-slot>

    <div class="formulario">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="A" class="bg-white border-b border-gray-200">
                   <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                       @csrf

                       <div class="mt-4">
                            <label for="image_path">Imagen</label>
                            <x-text-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" required autofocus />
                            <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <label for="description">Descripción</label>
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" autofocus />
                            <x-input-error :messages="$errors->get('descritcion')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Subir imagen') }}
                            </x-primary-button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>